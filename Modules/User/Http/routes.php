<?php

Route::group(['middleware' => ['web','authenticate','administrator'], 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::get('/', 'UserController@index');
    Route::get('/user-all', 'UserController@allUser');
    Route::get('/user-list', 'UserController@getList')->name('users.list');
    Route::get('/statuschange-user/{id}', 'UserController@statusChangeUser');
});

Route::group(['middleware' => ['web','authenticate'], 'prefix' => 'user', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
   Route::get('/my-profile','UserController@myProfile');
});
