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
        $this->validate($request, [
            'name'                  => 'required|min:1|max:255',
            'email'                 => 'required|unique:user|max:255',
            'password'              => 'required|min:8|max:16|confirmed',
            'password_confirmation' => 'required|min:8|max:16',
            'branch'                => 'required|unique:branch,id,'.$request->get('branch'),
            'avatar'                => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        $staff = UserService::register($request, User::AUTH_TYPE_STAFF);

        return redirect('admin/staffs')->with(
            'success',
            'A new staff has been added to '.$staff->getBranch()->name.' branch'
        );
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