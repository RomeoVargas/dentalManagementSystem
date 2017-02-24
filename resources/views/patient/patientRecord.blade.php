@extends('layout.main')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">Patient Information Features</div>
        <div class="panel-body">
            <ul>
                <li>Show current Patient Information (initially set upon registration)</li>
                <li>Patient updates this if neccessary (eg.: If a medical history has been added)</li>
                <li>Fields are disabled initially (Needs an edit button to be editable)</li>
            </ul>
        </div>
    </div>
@endsection