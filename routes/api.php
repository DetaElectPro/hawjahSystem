<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('/register', 'Api\AuthControllerApi@register');
    Route::post('/login', 'Api\AuthControllerApi@login');
    Route::post('/check', 'Api\AuthControllerApi@checkAuth');
    Route::get('/profile', 'Api\AuthControllerApi@profile')->middleware('auth');
    Route::get('/profile/{user}', 'Api\AuthControllerApi@profileById')->middleware('auth');
    Route::post('/logout', 'Api\AuthControllerApi@logout');

});

//Route::prefix('auth')->group(function () {

Route::resource('employ', 'EmployApiController');

Route::resource('medical_board', 'MedicalBoardApiController');
//}
Route::resource('request_specialist', 'RequestSpecialistApiController');

Route::resource('accept_request_specialist', 'AcceptRequestApiController');

Route::post('user_accept_request_specialist', 'AcceptRequestApiController@userAccept');

Route::resource('medicalFields', 'MedicalFieldAPIController');

Route::resource('medicalSpecialties', 'MedicalSpecialtyAPIController');

Route::resource('emergencyServiceds', 'EmergencyServicedAPIController');

