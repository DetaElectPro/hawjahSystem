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
//Route::get('/login', 'Auth\LoginByPhoneController@showLoginForm');
//Route::post('/login', 'Auth\LoginByPhoneController@login');
Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginByPhoneController@showLoginForm']);
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginByPhoneController@login']);

Route::resource('home', 'HomeController');



Route::resource('medicalFields', 'MedicalFieldController');

Route::resource('medicalSpecialties', 'MedicalSpecialtyController');