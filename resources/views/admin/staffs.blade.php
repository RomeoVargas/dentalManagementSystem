@extends('layout.main')
@section('content')
    @if($branches->count() == 0)
        <div class="alert alert-warning">
            <strong>There are no branches to add staffs with. Click
                <a href="#" data-toggle="modal" data-target="#addBranchModal">here</a>
                to add one now!</strong>
        </div>
    @else
        @foreach($branches as $branch)
            <div class="well">
                <h3>{{ $branch->name }}</h3>
                @php($staffs = $branch->getStaffs())
                @if($staffs->count() == 0)
                    <div class="alert alert-warning">
                        <strong>There are no staff added to this branch yet</strong>
                    </div>
                @else
                    <table class="table table-striped">
                        <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                        </thead>
                        @foreach($staffs as $staff)
                            @php($user = $staff->getUser())
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        @endforeach
        <a href="#" class="fixed-fab" data-toggle="modal" data-target="#addStaffModal"><i class="glyphicon glyphicon-plus-sign"></i></a>
    @endif

@endsection

@section('modal')
    @include('admin.modal.addBranch')
    @include('admin.modal.addStaff')
@endsection