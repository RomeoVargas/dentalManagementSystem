<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Dentist;
use App\Models\DentistSchedule;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Services\UserService;

class DentistController extends Controller
{
    public function getAll()
    {
        $branches = Branch::all();

        return view('admin.dentists')->with([
            'branches' => $branches
        ]);
    }

    public function save(Request $request)
    {
        DB::beginTransaction();
        try {
            $rules = array(
                'name'                  => 'required|min:1|max:255',
                'branch'                => 'required|unique:branch,id,'.$request->get('branch'),
                'introduction'          => 'required|min:1|max:255',
            );
            $additionalRules = array();
            if ($dentistId = $request->get('id')) {
                $additionalRules['email'] = 'required|max:255|email|unique:user,email,'.$dentistId;
                if ($request->files->has('avatar')) {
                    $additionalRules['avatar'] = 'required|mimes:jpeg,jpg,png|max:2048';
                }
            } else {
                $additionalRules = array(
                    'email'                 => 'required|max:255|email|unique:user',
                    'password'              => 'required|min:8|max:16|confirmed',
                    'password_confirmation' => 'required|min:8|max:16',
                    'avatar'                => 'required|mimes:jpeg,jpg,png|max:2048'
                );
            }

            $rules = array_merge($rules, $additionalRules);

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect('admin/dentists')
                    ->with(['dentistId' => $dentistId])
                    ->withErrors($validator)
                    ->withInput();
            }

            $dentist = UserService::save($request, User::AUTH_TYPE_DENTIST);
            $successMessage = $dentistId
                ? 'All changes made to '.$dentist->getUser()->name.' has been successfully saved'
                : 'A new staff has been added to '.$dentist->getBranch()->name.' branch';

            $message = array('success' => $successMessage);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $message = array(
                'error' => $e->getMessage()
            );
        }

        return redirect('admin/dentists')->with($message);
    }

    public function saveSchedule(Request $request)
    {
        DB::beginTransaction();
        try {
            $dentistId = $request->get('id');
            if (!$dentist = Dentist::find($dentistId)) {
                throw new ModelNotFoundException('Dentist does not exist');
            }

            // Remove all schedules first
            foreach ($dentist->getSchedule() as $schedule) {
                $schedule->delete();
            }

            $schedules = array();
            foreach (DentistSchedule::DAYS as $day) {
                if (($dayFrom = $request->get($day.'From')) && ($dayTo = $request->get($day.'To'))) {
                    if (strtotime($dayTo) > strtotime($dayFrom)) {
                        throw new \InvalidArgumentException('Schedule time(s) must have a valid value');
                    }

                    $schedule = $dayFrom.' - '.$dayTo;
                    if (isset($schedules[$schedule])) {
                        $schedules[$schedule]->days .= ','.$day;
                        $schedules[$schedule]->save();
                    } else {
                        $schedules[$schedule] = new DentistSchedule();
                        $schedules[$schedule]->fill([
                            'dentist_id' => $dentistId,
                            'days' => $day,
                            'time_start' => $dayFrom,
                            'time_end' => $dayTo,
                        ])->save();
                    }
                }
            }

            $message = array('success' => 'The schedule of '.$dentist->getUser()->name.' has been successfully updated');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $message = array(
                'error' => $e->getMessage()
            );
        }

        return redirect('admin/dentists')->with($message);
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $dentist = Dentist::find($id);
            if (!$dentist) {
                throw new ModelNotFoundException('Staff does not exist');
            }
            $user = $dentist->getUser();
            $message = array(
                'success' => 'Dentist "'.$user->name.'" has been successfully deleted'
            );

            $dentist->delete();
            $user->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $message = array(
                'error' => $e->getMessage()
            );
        }

        return redirect('admin/dentists')->with($message);
    }
}