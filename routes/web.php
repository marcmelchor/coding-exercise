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

Route::get('/', 'JobController@index');
// Route::get('/', 'JobController@create');
Route::get('/job/{job}', 'JobController@show');
Route::patch('/job/{job}/apply', 'JobController@apply');
Route::post('/job/create', 'JobController@store');

// Route::get('/jobs/liveSearch', 'JobController@liveSearch')->name('jobs.liveSearch');
