<?php

Route::prefix('auth')->group(function () {
    Route::post('/login', 'AuthControllerApi@login')->name('login');
    Route::post('check', 'AuthControllerApi@checkAuth');
    Route::post('register', 'AuthControllerApi@register');

    Route::post('logout', 'AuthControllerApi@logout');
    Route::resource('profile', 'ProfileApiController');
    Route::put('/fcm', 'ProfileApiController@updateFCM')->name('user.update');
});

Route::prefix('cat')->group(function () {
    Route::get('medicalFC/{id}', 'MedicalSpecialtyAPIController@medicalFields');
});

Route::resource('medicalBoards', 'MedicalBoardApiController');
Route::resource('employs', 'EmployAPIController');

Route::resource('requestSpecialists', 'RequestSpecialistApiController');

Route::resource('acceptRequestSpecialists', 'AcceptRequestApiController');

Route::post('userAcceptRequestSpecialists', 'AcceptRequestApiController@userAccept');

Route::resource('medicalFields', 'MedicalFieldAPIController');

Route::resource('medicalSpecialties', 'MedicalSpecialtyAPIController');

Route::resource('emergencyServiceds', 'EmergencyServicedAPIController');

Route::resource('pharmacies', 'PharmacyAPIController');

Route::get('emp_cv', 'EmployAPIController@cv');
Route::post('emp_cv/{id}', 'EmployAPIController@updateCv');

//php artisan route:cache
//composer dump-autoloa

Route::resource('acceptEmergency', 'AcceptEmergencyServicedAPIController');

Route::post('notify', 'NotificationController@notify');


Route::resource('ambulances', 'AmbulanceAPIController');