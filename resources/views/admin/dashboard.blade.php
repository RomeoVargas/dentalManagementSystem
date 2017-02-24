@extends('layout.main')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">Overall Summary</div>
        <div class="panel-body">
            <ul>
                <li>Total invoice collected today</li>
                <li>Total Count of Patients accomodated today</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">Branch Summary</div>
        <div class="panel-body">
            <ul>
                <li>Total Count of Appointments for each branch of this day</li>
                <li>Total Count of Upcoming Appointments Today (Patient has not come to clinic yet)</li>
                <li>Total Count of registered/assigned Dentists</li>
                <li>Total Count of registered/assigned Staff</li>
            </ul>
        </div>
    </div>
@endsection