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

Route::post('/register', 'Api\AuthControllerApi@register');
Route::post('/login', 'Api\AuthControllerApi@login');
Route::post('/check', 'Api\AuthControllerApi@checkAuth');
Route::post('/logout', 'Api\AuthControllerApi@logout');

Route::resource('employ', 'Api\EmployApiController');
Route::resource('medical_board', 'Api\MedicalBoardApiController');
Route::resource('medical_field', 'Api\MedicalFieldApiController');
Route::resource('medical_specialty', 'Api\MedicalSpecialtyApiController');

Route::resource('request_specialist', 'Api\RequestSpecialistApiController');
Route::resource('accept_request_specialist', 'Api\AcceptRequestApiController');
Route::post('user_accept_request_specialist', 'Api\AcceptRequestApiController@userAccept');

