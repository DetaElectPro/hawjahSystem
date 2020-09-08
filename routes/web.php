<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//Web Route

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard', 'Web\DashboardWEBController@index')->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

//blog
    Route::resource('blog', 'Web\BlogWEBController');

//Users
    Route::resource('users', 'Web\UserWEBController');

//MedicalField
    Route::resource('medical_fields', 'Web\MedicalFieldWEBController');

//medical_specialists
    Route::resource('medical_specialists', 'Web\MedicalSpecialtyWEBController');

});

Route::group(['prefix' => 'chart'], function () {
    Route::get('user', 'Web\DashboardWEBController@users');
    Route::get('requests', 'Web\DashboardWEBController@requests');

});

Route::get('new-login', function () {
    return view('auth.loginN');
});
