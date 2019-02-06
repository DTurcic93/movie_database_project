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


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/show', 'ApplicationController@showAll');
Route::get('/details/{id}', 'ApplicationController@details');
Route::get('/delete/{id}', 'ApplicationController@delete');
Route::get('/insert', 'ApplicationController@showInsertForm');
Route::post('insert', 'ApplicationController@insert');
Route::get('/update/{id}', 'ApplicationController@update');
Route::post('/update', 'ApplicationController@updateDetails');
