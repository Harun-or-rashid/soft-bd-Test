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
})->name('index');


Route::prefix('company')->name('company.')->group(function (){
    Route::get('','CompanyController@index')->name('index');
    Route::get('/create','CompanyController@create')->name('create');
    Route::post('/store','CompanyController@store')->name('store');
    Route::get('/show/{id}','CompanyController@show')->name('show');
    Route::get('/edit/{id}','CompanyController@edit')->name('edit');
    Route::post('/update/{id}','CompanyController@update')->name('update');
    Route::get('/destroy/{id}','CompanyController@destroy')->name('destroy');
});

Route::prefix('branch')->name('branch.')->group(function (){
    Route::get('','BranchController@index')->name('index');
    Route::get('/create','BranchController@create')->name('create');
    Route::post('/store','BranchController@store')->name('store');
    Route::get('/show/{id}','BranchController@show')->name('show');
    Route::get('/edit/{id}','BranchController@edit')->name('edit');
    Route::post('/update/{id}','BranchController@update')->name('update');
    Route::get('/destroy/{id}','BranchController@destroy')->name('destroy');
});


Route::prefix('department')->name('department.')->group(function (){
    Route::get('','DepartmentController@index')->name('index');
    Route::get('/create','DepartmentController@create')->name('create');
    Route::post('/store','DepartmentController@store')->name('store');
    Route::get('/show/{id}','DepartmentController@show')->name('show');
    Route::get('/edit/{id}','DepartmentController@edit')->name('edit');
    Route::post('/update/{id}','DepartmentController@update')->name('update');
    Route::get('/destroy/{id}','DepartmentController@destroy')->name('destroy');


    Route::post('get-branch','DepartmentController@getBranch')->name('get-branch');
});

Route::prefix('designation')->name('designation.')->group(function (){
    Route::get('','DesignationController@index')->name('index');
    Route::get('/create','DesignationController@create')->name('create');
    Route::post('/store','DesignationController@store')->name('store');
    Route::get('/show/{id}','DesignationController@show')->name('show');
    Route::get('/edit/{id}','DesignationController@edit')->name('edit');
    Route::post('/update/{id}','DesignationController@update')->name('update');
    Route::get('/destroy/{id}','DesignationController@destroy')->name('destroy');


    Route::post('get-department','DesignationController@getDepartment')->name('get-department');
});


Route::prefix('employee')->name('employee.')->group(function (){
    Route::get('','EmployeeController@index')->name('index');
    Route::get('/create','EmployeeController@create')->name('create');
    Route::post('/store','EmployeeController@store')->name('store');
    Route::get('/show/{id}','EmployeeController@show')->name('show');
    Route::get('/edit/{id}','EmployeeController@edit')->name('edit');
    Route::post('/update/{id}','EmployeeController@update')->name('update');
    Route::get('/destroy/{id}','EmployeeController@destroy')->name('destroy');


    Route::post('get-designation','EmployeeController@getDesignation')->name('get-designation');
});

