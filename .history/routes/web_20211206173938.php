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

Route::get('/', 'HomeController@index');


// User Routes
Route::get('/users', 'UserController@index');
Route::get('/users/{user}', 'UserController@show');
Route::get('/users/edit/{user}', 'UserController@edit');
Route::post('/users/update/{user}', 'UserController@update');
Route::get('/users/update/{user}', 'HomeController@index');

// Management Routes


// Student Routes


// Instructor Routes


// Lesson Routes


// Lesson Notes


// Instrument Skills


// Music Pieces


//