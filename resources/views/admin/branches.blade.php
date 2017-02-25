@extends('layout.main')
@section('content')
    @if($branches->count() == 0)
        <div class="alert alert-warning">
            <strong>There are no branches added yet</strong>
        </div>
    @else
        <table class="table table-striped">
            <thead>
            <th>Name</th>
            <th>Adress</th>
            <th>Actions</th>
            </thead>
            @foreach($branches as $branch)
                <tr>
                    <td>{{ $branch->name }}</td>
                    <td>{{ $branch->address }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    <a href="#" class="fixed-fab" data-toggle="modal" data-target="#addBranchModal"><i class="glyphicon glyphicon-plus-sign"></i></a>
@endsection

@section('modal')
    @include('admin.modal.addBranch')
@endsection