<?php

/**
 * Created by Jim
 * Date: 2/10/2018
 * Time: 9:51 PM
 */

namespace App\Libraries;

use Carbon\Carbon;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Modules\Employee\Entities\Employee;



class CommonFunction {

    public static function getUserId()
    {
        if (Sentinel::check()) {
            return Sentinel::getUser()->id;
        } else {
            return 0;
        }
    }

    public static function isEmployeeExitAttendace(){
        $user_id = Sentinel::getUser()->id;
        $employee = Employee::leftjoin('attendances','employees.id','=', 'attendances.employee_id')
                    ->where('employees.user_id',$user_id)
                    ->whereDate('attendances.created_at',Carbon::today())
                    ->where('attendances.exit_time', null)
                    ->count();
        if($employee) { 
            $time = Carbon::now();
            $morning = Carbon::create($time->year, $time->month, $time->day, 11, 13, 0); 
            $evening = Carbon::create($time->year, $time->month, $time->day, 23, 55, 0);
           if($time->between($morning, $evening, true)){
            return true;
           }
        }
        return false;
    }

    public static function getEmployeeName($emp_id){
        $emp_id = Encryption::decodeId($emp_id);
        $emp_name = Employee::leftjoin('users','employees.user_id','=','users.id')
                    ->where('employees.id',$emp_id)
                    ->first(['users.first_name','users.last_name',]);
        if($emp_name){
            return ucfirst($emp_name->first_name."-".$emp_name->last_name);
        }
        return "";
    } 

    public static function convert2Bangla($eng_number) {
        $eng = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $ban = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        return str_replace($eng, $ban, $eng_number);
    }

    public static function convert2English($ban_number) {
        $eng = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $ban = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        return str_replace($ban, $eng, $ban_number);
    }

   

    

    /*     * ****************************End of Class***************************** */
}
