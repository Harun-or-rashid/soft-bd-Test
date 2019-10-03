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
    return view('admin.index');
});

Route::get('/create.user','UserController@create')->name('created');
Route::post('/create.user','UserController@store');

Route::get('/f','UserController@index');
Route::get('/fl/{user}','UserController@show')->name('show');

Route::post('/login','AuthController@LoginProcess');
Route::get('login','AuthController@ShowLogin');

Route::get('/logout','AuthController@logout')->name('log');