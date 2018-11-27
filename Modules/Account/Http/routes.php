<?php

Route::group(['middleware' => ['web','authenticate','account'], 'prefix' => 'account', 'namespace' => 'Modules\Account\Http\Controllers'], function()
{
    Route::get('/account', 'AccountController@account');
    Route::post('/cost-store', 'AccountController@costStore');
    Route::post('/cost-edit', 'AccountController@costEdit');
    Route::post('/cost-update/{id}', 'AccountController@costUpdate');
    Route::get('/daily-account', 'AccountController@dailyAccount');

});
