<?php

Route::group(['middleware' => ['web', 'authenticate'], 'prefix' => 'employee', 'namespace' => 'Modules\Employee\Http\Controllers'], function () {
    Route::get('/', 'EmployeeController@index');
    Route::get('/all-employee', 'EmployeeController@allEmployee');
    Route::get('/employee-attendance', 'EmployeeController@employeeAttendance');
    Route::get('/attendance-details/{id}', 'EmployeeController@attendanceDetails');
    Route::get('/employee-logOff', 'EmployeeController@employeeLogOff');
    Route::get('/employee-add/{id}', 'EmployeeController@employeeAdd');
});
