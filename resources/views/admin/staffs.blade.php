@extends('layout.main')
@section('content')
    <h1>Staffs</h1>
    <div class="col-md-12">
        @if($branches->count() == 0)
            <div class="alert alert-warning">
                <strong>
                    There are no branches to add staffs with. Click
                    <a href="#" data-toggle="modal" data-target="#addBranchModal">here</a>
                    to add one now!
                </strong>
            </div>
        @else
            <div class="col-md-8">
                @php($numBranchesDisplayed = 0)
                @foreach($branches as $branch)
                    @php
                        if ($numBranchesDisplayed) {
                            echo '<hr/>';
                        }
                        $numBranchesDisplayed++;
                        $staffs = $branch->getStaffs();
                    @endphp
                    <h4>{{ $branch->name }}</h4>
                    @if($staffs->count() == 0)
                        <div class="alert alert-warning">
                            <strong>There are no staff added to this branch yet</strong>
                        </div>
                    @else
                        <table class="table table-striped table-responsive">
                            @foreach($staffs as $staff)
                                @php($user = $staff->getUser())
                                <tr>
                                    <td class="col-sm-2">
                                        <img src="{{ $staff->getImage() }}" style="width: 100%">
                                    </td>
                                    <td class="col-sm-10">
                                        <div class="col-sm-12">
                                            <strong>Name:</strong> {{ $user->name }}
                                        </div>
                                        <div class="col-sm-12">
                                            <strong>Email:</strong> {{ $user->email }}
                                        </div>
                                        <div class="col-sm-12">
                                            <a href="#" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                            <a data-href="{{ url('admin/staffs/delete', ['id' => $user->id]) }}" data-toggle="modal"
                                               data-item-type="staff" data-item-name="{{ $user->name }}"
                                               data-target="#confirm-delete" class="btn btn-sm btn-danger"
                                            >
                                                <i class="glyphicon glyphicon-remove"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                @endforeach
            </div>
            <a href="#" class="fixed-fab" data-toggle="modal" data-target="#addStaffModal"><i class="glyphicon glyphicon-plus-sign"></i></a>
        @endif
    </div>
@endsection

@section('modal')
    @if($branches->count() == 0)
        @include('admin.modal.addBranch')
    @else
        @include('admin.modal.addStaff')
    @endif
@endsection