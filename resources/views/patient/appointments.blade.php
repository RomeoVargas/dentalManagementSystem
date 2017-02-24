@extends('layout.main')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">Appointments Tabs</div>
        <div class="panel-body">
            <ul>
                <li>Upcoming</li>
                <li>Completed/Paid</li>
                <li>Cancelled</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">Appointments Filters</div>
        <div class="panel-body">
            <ul>
                <li>Date Range</li>
                <li>Branch</li>
                <li>Doctor</li>
            </ul>
        </div>
    </div>
    <div class="panel panel-warning">
        <div class="panel-heading">Additional Features</div>
        <div class="panel-body">
            <ul>
                <li>View each appointment details(use accordion)</li>
                <li>Print receipt for each appointment</li>
            </ul>
        </div>
    </div>
@endsection