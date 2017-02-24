@extends('layout.main')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">Dentist Schedules</div>
        <div class="panel-body">
            <ul>
                <li>Calendar like div for each doctor schedule</li>
                <li>Highlight div of current date(blue)</li>
                <li>Show doctor's name and time for each schedule</li>
                <li>Highlight entry red if that schedule is already booked for someone else</li>
                <li>Highlight entry green if that schedule is already booked for the logged in patient</li>
            </ul>
        </div>
    </div>
@endsection