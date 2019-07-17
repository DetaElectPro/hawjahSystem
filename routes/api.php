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
Route::post('/logout', 'Api\AuthControllerApi@logout');

Route::resource('employ', 'Api\EmployApiController');
