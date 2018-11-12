<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'visitors'],function(){
	Route::get('/', function () {
    	return view('login::index');
	});

});

Route::group(['middleware' => 'authenticate'],function(){
	Route::get('/dashboard', function () {
    	return view('layouts.dashboard');
	});
});





