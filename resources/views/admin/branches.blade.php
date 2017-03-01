@extends('layout.main')
@section('content')
    <h1>Branches</h1>
    <div class="col-md-12">
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
                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addBranchModal{{$branch->id}}">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                            <a data-href="{{ url('admin/branches/delete', ['id' => $branch->id]) }}" data-toggle="modal"
                               data-item-type="branch" data-item-name="{{ $branch->name }}"
                               data-target="#confirm-delete" class="btn btn-sm btn-danger"
                            >
                                <i class="glyphicon glyphicon-remove"></i> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif

        <a href="#" class="fixed-fab" data-toggle="modal" data-target="#addBranchModal"><i class="glyphicon glyphicon-plus-sign"></i></a>
    </div>
@endsection

@section('modal')
    @php
        $id = null;
        $name = null;
        $address = null;
    @endphp
    @include('admin.modal.addBranch')
    @foreach($branches as $branch)
        @php
            $id = $branch->id;
            $name = $branch->name;
            $address = $branch->address;
        @endphp
        @include('admin.modal.addBranch')
    @endforeach
@endsection

@section('specificCustomJs')
    @if(count($errors) > 0)
        <script>
            $(window).load(function(){
                $('#addBranchModal{{ session('branchId') }}').modal('show');
            });
        </script>
    @endif
@endsection