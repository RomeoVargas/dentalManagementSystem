@extends('layout.main')
@section('content')
    <h1>Dentists</h1>
    <div class="col-md-12">
        @if($branches->count() == 0)
            <div class="alert alert-warning">
                <strong>
                    There are no branches to add dentists with. Click
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
                        $dentists = $branch->getDentists();
                    @endphp
                    <h4>{{ $branch->name }}</h4>
                    @if($dentists->count() == 0)
                        <div class="alert alert-warning">
                            <strong>There are no dentists added to this branch yet</strong>
                        </div>
                    @else
                        <table class="table table-striped table-responsive">
                            @foreach($dentists as $dentist)
                                @php($user = $dentist->getUser())
                                <tr>
                                    <td class="col-sm-4">
                                        <img src="{{ $dentist->getImage() }}" style="width: 100%">
                                    </td>
                                    <td class="col-sm-8">
                                        <div class="col-sm-12">
                                            <strong>Name:</strong> {{ $user->name }}
                                        </div>
                                        <div class="col-sm-12">
                                            <strong>Email:</strong> {{ $user->email }}
                                        </div>
                                        <div class="col-sm-12">
                                            <strong>Introduction:</strong> {{ $dentist->introduction }}
                                        </div>
                                        <div class="col-sm-12">
                                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addDentistModal{{$user->id}}">
                                                <i class="glyphicon glyphicon-edit"></i> Edit
                                            </a>
                                            <a data-href="{{ url('admin/dentists/delete', ['id' => $user->id]) }}" data-toggle="modal"
                                               data-item-type="dentist" data-item-name="{{ $user->name }}"
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
            <a href="#" class="fixed-fab" data-toggle="modal" data-target="#addDentistModal"><i class="glyphicon glyphicon-plus-sign"></i></a>
        @endif
    </div>
@endsection

@section('modal')
    @if($branches->count() == 0)
        @include('admin.modal.addBranch')
    @else
        @php
            $id = null;
            $name = null;
            $email = null;
            $avatar = null;
            $branch = null;
            $introduction = null;
        @endphp
        @include('admin.modal.addDentist')
        @foreach($branches as $branch)
            @foreach($branch->getDentists() as $dentist)
                @php
                    $user = $dentist->getUser();
                    $id = $user->id;
                    $name = $user->name;
                    $email = $user->email;
                    $avatar = $dentist->getImage();
                    $branch = $dentist->branch_id;
                    $introduction = $dentist->introduction;
                @endphp
                @include('admin.modal.addDentist')
            @endforeach
        @endforeach
    @endif
@endsection

@section('specificCustomJs')
    @if(count($errors) > 0)
        @php
            $modalId = session()->has('branchId')
                ? 'addBranchModal'.session('branchId')
                : 'addDentistModal'.session('dentistId')
        @endphp
        <script>
            $(window).load(function(){
                $('#{{ $modalId }}').modal('show');
            });
        </script>
    @endif
@endsection