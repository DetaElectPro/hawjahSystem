<?php

Route::prefix('auth')->group(function () {
    Route::post('login', 'AuthControllerApi@login');
    Route::post('test', 'AuthControllerApi@login');
    Route::post('check', 'AuthControllerApi@checkAuth');
    Route::post('register', 'AuthControllerApi@register');

//    Route::get('/profile', 'AuthControllerApi@profile')->middleware('auth');
    Route::post('logout', 'AuthControllerApi@logout');
    Route::resource('profile', 'ProfileApiController');

});

Route::prefix('cat')->group(function () {
    Route::get('medicalFC/{id}', 'MedicalSpecialtyAPIController@medicalFields');
});

Route::resource('medicalBoards', 'MedicalBoardApiController');
Route::resource('employs', 'EmployAPIController');
//}
Route::resource('requestSpecialists', 'RequestSpecialistApiController');

Route::resource('acceptRequestSpecialists', 'AcceptRequestApiController');

//Route::get('userAcceptRequestSpecialists', 'AcceptRequestApiController@index');
Route::post('userAcceptRequestSpecialists', 'AcceptRequestApiController@userAccept');

Route::resource('medicalFields', 'MedicalFieldAPIController');

Route::resource('medicalSpecialties', 'MedicalSpecialtyAPIController');

Route::resource('emergencyServiceds', 'EmergencyServicedAPIController');

Route::resource('pharmacies', 'PharmacyAPIController');

Route::get('emp_cv', 'EmployAPIController@cv');
Route::post('emp_cv/{id}', 'EmployAPIController@updateCv');

//php artisan route:cache

Route::resource('acceptEmergency', 'AcceptEmergencyServicedAPIController');