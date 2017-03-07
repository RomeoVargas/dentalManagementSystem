<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// PATIENT RELATED PAGES
Route::get('/', function () {
    return redirect('home');
});
Route::get('/home', function () {
    return view('patient.home');
});
Route::get('/appointments', function () {
    return view('patient.appointments');
});
Route::get('/schedules', function () {
    return view('patient.dentistSchedule');
});
Route::get('/my-info', function () {
    return view('patient.patientRecord');
});

// ADMIN RELATED PAGES
Route::get('admin', function () {
    return redirect('admin/dashboard');
});
Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('admin/dentists', 'Admin\DentistController@getAll');
Route::post('admin/dentists/save', 'Admin\DentistController@save');
Route::post('admin/dentists/schedule/save', 'Admin\DentistController@saveSchedule');
Route::get('admin/dentists/delete/{id}', 'Admin\DentistController@delete');

Route::get('admin/staffs', 'Admin\StaffController@getAll');
Route::post('admin/staffs/save', 'Admin\StaffController@save');
Route::get('admin/staffs/delete/{id}', 'Admin\StaffController@delete');

Route::get('admin/branches', 'Admin\BranchController@getAll');
Route::post('admin/branches/save', 'Admin\BranchController@save');
Route::get('admin/branches/delete/{id}', 'Admin\BranchController@delete');


Route::get('/dentist', function () {
    return view('admin.dashboard');
});
Route::get('/staff', function () {
    return view('admin.dashboard');
});
