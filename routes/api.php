<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthControllerApi@login');
    Route::post('admin', 'AuthControllerApi@adminLogin');
    Route::post('register', 'AuthControllerApi@register');

    Route::post('logout', 'AuthControllerApi@logout');
    Route::post('fcm_update', 'ProfileApiController@updateFCM');
    Route::get('check_user', 'ProfileApiController@checkUser');
});

Route::post('upload_image', 'ProfileApiController@uploadImage');
Route::post('upload_cv', 'ProfileApiController@uploadCvFile');
//    Route::post('/api/update_image', 'ProfileApiController@uploadImage');
Route::get('medical_fields', 'MedicalFieldAPIController@index');
Route::get('medical_fields/{id}', 'MedicalFieldAPIController@show');


Route::get('medical_specialties', 'MedicalSpecialtyAPIController@index');
Route::get('medical_specialties/{id}', 'MedicalSpecialtyAPIController@show');

//
Route::resource('employs', 'EmployAPIController');
//Route::get('employs/{id}', 'EmployAPIController@show');
//Route::delete('employs/{id}', 'EmployAPIController@destroy');
//Route::post('employs', 'EmployAPIController@store');
//Route::put('employs/{id}', 'EmployAPIController@update');

//
Route::resource('accept_request_specialists', 'AcceptRequestSpecialistsAPIController');
//Route::get('accept_request_specialists/{id}', 'AcceptRequestSpecialistsAPIController@show');
//Route::delete('accept_request_specialists/{id}', 'AcceptRequestSpecialistsAPIController@destroy');
//Route::post('accept_request_specialists', 'AcceptRequestSpecialistsAPIController@store');
//Route::put('accept_request_specialists/{id}', 'AcceptRequestSpecialistsAPIController@update');


Route::resource('wallets', 'WalletAPIController');
//Route::get('wallets/{id}', 'WalletAPIController@show');
//Route::delete('wallets/{id}', 'WalletAPIController@destroy');
//Route::post('wallets', 'WalletAPIController@store');
//Route::put('wallets/{id}', 'WalletAPIController@update');

//
Route::resource('request_specialists', 'RequestSpecialistsAPIController');
//Route::get('request_specialists/{id}', 'RequestSpecialistsAPIController@show');
//Route::delete('request_specialists/{id}', 'RequestSpecialistsAPIController@destroy');
//Route::post('request_specialists', 'RequestSpecialistsAPIController@store');
//Route::put('request_specialists/{id}', 'RequestSpecialistsAPIController@update');
//
Route::get('request_specialists_admin_history', 'RequestSpecialistsAPIController@adminHistory');
Route::get('request_specialists_doctor_history', 'RequestSpecialistsAPIController@doctorHistory');
Route::get('request_specialists_history', 'RequestSpecialistsAPIController@history');
Route::post('search_request_specialists', 'RequestSpecialistsAPIController@search');
//
Route::get('acceptRequestByAdmin/{id}', 'AcceptRequestSpecialistsAPIController@acceptRequestByAdmin');
Route::get('acceptRequestByUser/{id}', 'AcceptRequestSpecialistsAPIController@acceptRequestByUser');
Route::get('cancelRequestByAdmin/{id}', 'AcceptRequestSpecialistsAPIController@cancelRequestByAdmin');
Route::get('cancelRequestByAdminToUser/{id}', 'AcceptRequestSpecialistsAPIController@cancelRequestByAdminToUser');
Route::get('cancelRequestByUser/{id}', 'AcceptRequestSpecialistsAPIController@cancelRequestByUser');
Route::post('acceptRequestAndDone/{id}', 'AcceptRequestSpecialistsAPIController@acceptRequestAndDone');
//
Route::resource('emergency_serviced', 'EmergencyServicedAPIController');
//Route::get('emergency_serviced/{id}', 'EmergencyServicedAPIController@show');
//Route::delete('emergency_serviced/{id}', 'EmergencyServicedAPIController@destroy');
//Route::post('emergency_serviced', 'EmergencyServicedAPIController@store');
//Route::put('emergency_serviced/{id}', 'EmergencyServicedAPIController@update');

Route::get('emergency_serviced_admin_history', 'EmergencyServicedAPIController@adminHistory');
Route::get('emergency_serviced_user_history', 'EmergencyServicedAPIController@userHistory');

//
Route::resource('ambulances', 'AmbulanceAPIController');
//Route::get('ambulances/{id}', 'AmbulanceAPIController@show');
//Route::delete('ambulances/{id}', 'AmbulanceAPIController@destroy');
//Route::post('ambulances', 'AmbulanceAPIController@store');
//Route::put('ambulances/{id}', 'AmbulanceAPIController@update');

//
Route::resource('pharmacies', 'PharmacyAPIController');
//Route::get('pharmacies/{id}', 'PharmacyAPIController@show');
//Route::delete('pharmacies/{id}', 'PharmacyAPIController@destroy');
//Route::post('pharmacies', 'PharmacyAPIController@store');
//Route::put('pharmacies/{id}', 'PharmacyAPIController@update');

Route::get('pharmacy_by_user', 'PharmacyAPIController@showByUser');
Route::get('pharmacy_by_pharmacy', 'PharmacyAPIController@showByPharmacy');

//

Route::resource('emergency_request', 'AmbulanceAPIController');
//Route::get('emergency_request/{id}', 'AmbulanceAPIController@show');
//Route::delete('emergency_request/{id}', 'AmbulanceAPIController@destroy');
//Route::post('emergency_request', 'AmbulanceAPIController@store');
//Route::put('emergency_request/{id}', 'AmbulanceAPIController@update');
//Blog
Route::resource('blog', 'BlogAPIController');
//Route::get('blog/{id}', 'BlogAPIController@show');
