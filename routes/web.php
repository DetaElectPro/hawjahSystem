<?php

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


Route::get('dashboard', 'Web\DashboardWEBController@index');

//blog
Route::get('blog', 'Web\BlogWEBController@index');
Route::post('blog', 'Web\BlogWEBController@store');
Route::get('blog/create', 'Web\BlogWEBController@create');
Route::get('blog/{id}/view', 'Web\BlogWEBController@show');
Route::get('blog/{id}/edit', 'Web\BlogWEBController@edit');
Route::put('blog/{id}/update', 'Web\BlogWEBController@update');
Route::get('blog/{id}/delete', 'Web\BlogWEBController@destroy');
//Users
Route::get('users', 'Web\UserWEBController@index');
Route::post('users', 'Web\UserWEBController@store');
Route::get('users/create', 'Web\UserWEBController@create');
Route::get('users/{id}/view', 'Web\UserWEBController@show');
Route::get('users/{id}/edit', 'Web\UserWEBController@edit');
Route::put('users/{id}/update', 'Web\UserWEBController@update');
Route::get('users/{id}/delete', 'Web\UserWEBController@destroy');
//MedicalField
Route::get('medical_fields', 'Web\MedicalFieldWEBController@index');
Route::post('medical_fields', 'Web\MedicalFieldWEBController@store');
Route::get('medical_fields/create', 'Web\MedicalFieldWEBController@create');
Route::get('medical_fields/{id}/view', 'Web\MedicalFieldWEBController@show');
Route::get('medical_fields/{id}/edit', 'Web\MedicalFieldWEBController@edit');
Route::put('medical_fields/{id}/update', 'Web\MedicalFieldWEBController@update');
Route::get('medical_fields/{id}/delete', 'Web\MedicalFieldWEBController@destroy');
//medical_specialists
Route::get('medical_specialists', 'Web\MedicalSpecialtyWEBController@index');
Route::post('medical_specialists', 'Web\MedicalSpecialtyWEBController@store');
Route::get('medical_specialists/create', 'Web\MedicalSpecialtyWEBController@create');
Route::get('medical_specialists/{id}/view', 'Web\MedicalSpecialtyWEBController@show');
Route::get('medical_specialists/{id}/edit', 'Web\MedicalSpecialtyWEBController@edit');
Route::put('medical_specialists/{id}/update', 'Web\MedicalSpecialtyWEBController@update');
Route::get('medical_specialists/{id}/delete', 'Web\MedicalSpecialtyWEBController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
