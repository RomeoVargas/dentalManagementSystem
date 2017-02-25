<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

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
}