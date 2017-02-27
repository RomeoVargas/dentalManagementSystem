<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Staff;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use DB;

class StaffController extends Controller
{
    public function getAll()
    {
        $branches = Branch::all();

        return view('admin.staffs')->with([
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
            );
            $additionalRules = array();
            if ($isExisting = (bool) $request->get('id')) {
                if ($request->files->has('avatar')) {
                    $additionalRules['avatar'] = 'required|mimes:jpeg,jpg,png|max:2048';
                }
            } else {
                $additionalRules = array(
                    'email'                 => 'required|unique:user|max:255',
                    'password'              => 'required|min:8|max:16|confirmed',
                    'password_confirmation' => 'required|min:8|max:16',
                    'avatar'                => 'required|mimes:jpeg,jpg,png|max:2048'
                );
            }

            $rules = array_merge($rules, $additionalRules);
            $this->validate($request, $rules);

            $staff = UserService::save($request, User::AUTH_TYPE_STAFF);
            $successMessage = $isExisting
                ? 'All changes made to '.$staff->getUser()->name.' has been successfully saved'
                : 'A new staff has been added to '.$staff->getBranch()->name.' branch';

            $message = array('success' => $successMessage);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $message = array(
                'error' => $e->getMessage()
            );
        }

        return redirect('admin/staffs')->with($message);
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $staff = Staff::find($id);
            if (!$staff) {
                throw new ModelNotFoundException('Staff does not exist');
            }
            $user = $staff->getUser();
            $message = array(
                'success' => 'Staff "'.$user->name.'" has been successfully deleted'
            );

            $staff->delete();
            $user->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $message = array(
                'error' => $e->getMessage()
            );
        }

        return redirect('admin/staffs')->with($message);
    }
}