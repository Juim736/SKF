<?php

Route::group(['middleware' => ['web','authenticate'], 'prefix' => 'account', 'namespace' => 'Modules\Account\Http\Controllers'], function()
{
    Route::get('/account', 'AccountController@account');
});
