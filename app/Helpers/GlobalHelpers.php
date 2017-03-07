<?php
use Illuminate\Support\Facades\Route;

function get_route_name()
{
    return $currentPath = Route::getFacadeRoot()->current()->uri();
}

function to_time_format($datetime, $format = 'h:i A')
{
    return date($format, strtotime($datetime));
}