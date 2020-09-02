<?php

use Illuminate\Support\Facades\Route;


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
Route::get('medical_fields', 'MedicalFieldAPIController@index');
Route::get('medical_fields/{id}', 'MedicalFieldAPIController@show');

//
Route::get('medical_specialties', 'MedicalSpecialtyAPIController@index');
Route::get('medical_specialties/{id}', 'MedicalSpecialtyAPIController@show');

//
Route::resource('employs', 'EmployAPIController');

//
Route::resource('accept_request_specialists', 'AcceptRequestSpecialistsAPIController');

//
Route::resource('wallets', 'WalletAPIController');

//
Route::resource('request_specialists', 'RequestSpecialistsAPIController');

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
Route::get('emergency_serviced_admin_history', 'EmergencyServicedAPIController@adminHistory');
Route::get('emergency_serviced_user_history', 'EmergencyServicedAPIController@userHistory');

//
Route::resource('ambulances', 'AmbulanceAPIController');

//
Route::resource('pharmacies', 'PharmacyAPIController');

//
Route::get('pharmacy_by_user', 'PharmacyAPIController@showByUser');
Route::get('pharmacy_by_pharmacy', 'PharmacyAPIController@showByPharmacy');

//
Route::resource('emergency_request', 'AmbulanceAPIController');

//Blog
Route::resource('blog', 'BlogAPIController');

//DoctorProfile
Route::resource('doctor_profile', 'DoctorProfileAPIController');

//DoctorAwardsRecognitions
Route::resource('doctor_awards_recognitions', 'DoctorAwardsRecognitionsAPIController');

//DoctorDegreesCertificationAPIController
Route::resource('doctor_degrees_certification', 'DoctorDegreesCertificationAPIController');

//DoctorTopicAPIController
Route::resource('doctor_topic', 'DoctorTopicAPIController');

//TopicAPIController
//Route::resource('topic', 'TopicAPIController');
