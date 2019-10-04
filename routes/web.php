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
    return view('index');
});

Route::get('/create.user','UserController@create')->name(   'created');
Route::post('/create.user','UserController@store');

Route::get('/f','UserController@index');
Route::get('/fl/{user}','UserController@show')->name('show');

Route::post('/login','AuthController@LoginProcess');
Route::get('login','AuthController@ShowLogin');

Route::get('/logout','AuthController@logout')->name('log');


Route::prefix('company')->name('company.')->group(function (){
    Route::get('','CompanyController@index')->name('index');
    Route::get('/create','CompanyController@create')->name('create');
    Route::post('/store','CompanyController@store')->name('store');
    Route::get('/show/{id}','CompanyController@show')->name('show');
    Route::get('/edit/{id}','CompanyController@edit')->name('edit');
    Route::post('/update/{id}','CompanyController@update')->name('update');
});

Route::prefix('branch')->name('branch.')->group(function (){
    Route::get('','BranchController@index')->name('index');
    Route::get('/create','BranchController@create')->name('create');
    Route::post('/store','BranchController@store')->name('store');
    Route::get('/show/{id}','BranchController@show')->name('show');
    Route::get('/edit/{id}','BranchController@edit')->name('edit');
    Route::post('/update/{id}','BranchController@update')->name('update');
});


Route::prefix('department')->name('department.')->group(function (){
    Route::get('','DepartmentController@index')->name('index');
    Route::get('/create','DepartmentController@create')->name('create');
    Route::post('/store','DepartmentController@store')->name('store');
    Route::get('/show/{id}','DepartmentController@show')->name('show');
    Route::get('/edit/{id}','DepartmentController@edit')->name('edit');
    Route::post('/update/{id}','DepartmentController@update')->name('update');


    Route::post('get-branch','DepartmentController@getBranch')->name('get-branch');
});


