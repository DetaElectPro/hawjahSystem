<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


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
    Route::post('/register', 'AuthControllerApi@register');
    Route::post('/login', 'AuthControllerApi@login');
    Route::post('/check', 'AuthControllerApi@checkAuth');
//    Route::get('/profile', 'AuthControllerApi@profile')->middleware('auth');
    Route::post('/logout', 'AuthControllerApi@logout');
    Route::resource('/profile', 'ProfileApiController');

});

//Route::prefix('auth')->group(function () {


Route::resource('medicalBoards', 'MedicalBoardApiController');
Route::resource('employs', 'EmployAPIController');
//}
Route::resource('requestSpecialists', 'RequestSpecialistApiController');

Route::resource('acceptRequestSpecialists', 'AcceptRequestApiController');

Route::post('userAcceptRequestSpecialists', 'AcceptRequestApiController@userAccept');

Route::resource('medicalFields', 'MedicalFieldAPIController');

Route::resource('medicalSpecialties', 'MedicalSpecialtyAPIController');

Route::resource('emergencyServiceds', 'EmergencyServicedAPIController');



