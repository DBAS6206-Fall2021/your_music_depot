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
Route::get('/student/create', 'StudentsController@create');
Route::post('/student/create', 'StudentsController@store');
Route::get('/student/edit/{student}', 'StudentsController@edit');
Route::post('/student/edit/{student}', 'StudentsController@update');
Route::get('/student/remove/{student}', 'StudentsController@destroy');

// Instructor Routes
Route::get('/users/{user}/availability', 'InstructorAvailabilityController@show');
Route::get('/users/{user}/availability/edit', 'InstructorAvailabilityController@edit');
Route::post('/users/{user}/availability', 'InstructorAvailabilityController@update');

// Lesson Routes
Route::get('/lessons', 'LessonsController@index')->middleware('role:M');
Route::get('/student/{user}', 'LessonsController@select');
Route::get('/student/{student}/lesson/create', 'LessonsController@create');
Route::post('/student/{student}/lesson/detailsA', 'LessonsController@detailsA');
Route::post('/student/{student}/lesson/detailsB', 'LessonsController@detailsB');
Route::post('/student/{student}/lesson/detailsC', 'LessonsController@detailsC');


// Lesson Notes
Route::get('/lesson/{lesson}/destroy', 'LessonsController@destroy');


// Instrument Skills


// Music Pieces


//