<?php

Route::group(['middleware' => ['web', 'visitors'], 'prefix' => 'login', 'namespace' => 'Modules\Login\Http\Controllers'], function () {
    Route::get('/', 'LoginController@index');
    Route::get('/registration', 'LoginController@registration');
    Route::post('/signup', 'LoginController@signup');
    Route::post('/signin', 'LoginController@signin');

});

Route::group(['middleware' => 'web', 'prefix' => 'login', 'namespace' => 'Modules\Login\Http\Controllers'], function () {
    Route::post('/sign-out', 'LoginController@signOut');
});
