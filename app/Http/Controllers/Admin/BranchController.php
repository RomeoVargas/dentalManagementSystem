<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    public function getAll()
    {
        $branches = Branch::all();

        return view('admin.branches')->with([
            'branches' => $branches
        ]);
    }

    public function save(Request $request)
    {
        $rules = array(
            'address'   => 'required',
            'name'      => 'required|max:255|unique:branch'
        );
        if ($branchId = $request->get('id')) {
            $rules['name'] = 'required|max:255|unique:branch,name,'.$branchId;
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('admin/branches')
                ->with(['branchId' => $branchId])
                ->withErrors($validator);
        }

        $branch = $branchId ? Branch::find($branchId) : new Branch();
        if (!$branch) {
            throw new ModelNotFoundException('Branch does not exist');
        }
        $branch->fill([
            'name'      => $request->get('name'),
            'address'   => $request->get('address')
        ])->save();
        $successMessage = $branchId
            ? 'Changes to branch '.$branch->name.' has been saved'
            : 'A new branch has now been added';

        return redirect('admin/branches')->with('success', $successMessage);
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