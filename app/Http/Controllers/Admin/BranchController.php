<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use DB;

class BranchController extends Controller
{
    public function getAll()
    {
        $branches = Branch::all();

        return view('admin.branches')->with([
            'branches' => $branches
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|unique:branch|max:255',
            'address'   => 'required'
        ]);

        $branch = new Branch();
        $branch->fill([
            'name'      => $request->get('name'),
            'address'   => $request->get('address')
        ])->save();

        return redirect('admin/branches')->with('success', 'A new branch has now been added');
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $branch = Branch::find($id);
            if (!$branch) {
                throw new ModelNotFoundException('Branch does not exist');
            }
            $staffs = $branch->getStaffs();
            $dentists = $branch->getDentists();
            if ($staffs->count() || $dentists->count()) {
                throw new AuthorizationException('Cannot delete branch with staffs/dentists assigned to it');
            }

            $message = array(
                'success' => 'Branch "'.$branch->name.'" has been successfully deleted'
            );

            $branch->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $message = array(
                'error' => $e->getMessage()
            );
        }

        return redirect('admin/branches')->with($message);
    }
}