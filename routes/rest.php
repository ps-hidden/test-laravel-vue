<?php

Route::get('init', 'Auth\AuthController@init');
Route::get('auth', 'Auth\AuthController@get');

Route::resource('options', 'Crud\OptionCrud')->only(['index', 'show']);
Route::resource('companies', 'Crud\CompanyCrud')->only(['index', 'show']);
Route::resource('employees', 'Crud\EmployeeCrud')->only(['index', 'show']);


Route::middleware('guest')->group(function() {
    Route::post('auth', 'Auth\LoginController@signIn');
    Route::post('auth/sign-up', 'Auth\LoginController@signUp');
    Route::post('auth/forgot', 'Auth\ResetController@forgot');
    Route::post('auth/reset', 'Auth\ResetController@reset');
});


Route::middleware('auth')->group(function() {
    Route::get('auth/logout', 'Auth\AuthController@logout');
    Route::put('auth/data', 'Auth\DataController@index');
    Route::post('auth/logo', 'Auth\LogoController@upload');
    Route::delete('auth/logo', 'Auth\LogoController@delete');
});


Route::middleware('can:isModerator')->group(function() {

});


Route::middleware('can:isAdmin')->group(function() {
    Route::get('companies-by-name', 'Crud\CompanyCrud@getByName');

    Route::resource('companies', 'Crud\CompanyCrud')->only(['store', 'update', 'destroy']);
    Route::resource('employees', 'Crud\EmployeeCrud')->only(['store', 'update', 'destroy']);

    Route::resource('users', 'Crud\UserCrud')->only(['index', 'show', 'store', 'update', 'destroy']);
    Route::resource('options', 'Crud\OptionCrud')->only(['store', 'update', 'destroy']);
});
