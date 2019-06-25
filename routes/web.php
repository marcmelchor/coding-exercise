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
Route::get('/live_search/action', 'JobController@liveSearch')->name('live_search.action');
Route::post('/', 'JobController@store');
Route::get('/job/{job}', 'JobController@show');
Route::patch('/job/{job}/apply', 'JobController@apply');
Route::get('/create', 'JobController@create');
