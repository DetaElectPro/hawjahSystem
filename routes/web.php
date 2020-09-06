<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('dashboard', 'Web\DashboardWEBController@index');

Route::group(['prefix' => 'admin'], function () {

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
