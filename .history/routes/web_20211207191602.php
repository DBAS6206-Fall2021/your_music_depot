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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


// User Routes
Route::get('/users', 'UserController@index');
Route::get('/users/{user}', 'UserController@show');
Route::get('/users/edit/{user}', 'UserController@edit');
Route::post('/users/edit/{user}', 'UserController@update');

// Management Routes


// Student Routes
Route::get('/student/create', function () {
    return view('students.create');
});
Route::get('/student/edit', function () {
    return view('students.edit');
});

// Instructor Routes
Route::get('/users/{user}/availability', 'InstructorAvailabilityController@show');
Route::get('/users/{user}/availability/edit', 'InstructorAvailabilityController@edit');
Route::post('/users/{user}/availability', 'InstructorAvailabilityController@update');

// Lesson Routes
Route::get('/lessons/create', 'LessonsController@create');


// Lesson Notes

// Instrument Skills


// Music Pieces


//