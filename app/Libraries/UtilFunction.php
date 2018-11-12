<?php
/**
 * Created by Jim
 * Date: 2/7/2018
 * Time: 9:51 PM
 */

namespace App\Libraries;



class UtilFunction
{
    public static function parsePassportData($passport_data, $pp_user_existing_dob = '')
    {
        $original_data = $passport_data;
        $passport_data = explode(PHP_EOL, $passport_data);
        if (!isset($passport_data[1])) {
            $passport_data[0] = substr($original_data, 0, 44);
            $passport_data[1] = substr($original_data, 44, 88);


            $passport_data[0] = trim($passport_data[0]);
            $passport_data[1] = trim($passport_data[1]);

        }
        if (!isset($passport_data[0]) || !isset($passport_data[1])) {
            return false;
        }

        $nameArr = explode('<<', substr($passport_data[0], 5, 30));
        $birth_date_str = substr($passport_data[1], 13, 6);


        $passport_expire_str = substr($passport_data[1], 21, 6);
        $personal_number = str_replace('<', '', substr($passport_data[1], 28, 14));
        #$birth_year = substr($passport_expire_str, 0, 2);
        #$birth_month = substr($passport_expire_str, 2, 2);
        #$birth_day = substr($passport_expire_str, 4, 2);

        $birth_date = UtilFunction::getPassportFullYear($birth_date_str, $pp_user_existing_dob);


        $return = [
            #'type' => substr($passport_data[0],0,1),
            'type' => (substr($passport_data[0], 1, 1) == '<') ? 'O' : substr($passport_data[0], 1, 1),
            'country_code' => substr($passport_data[0], 2, 3),
            'surname' => $nameArr[0],
            'given_name' => str_replace('<', ' ', $nameArr[1]),
            'passport_no' => substr($passport_data[1], 0, 9),
            'nationality' => substr($passport_data[1], 10, 3),
            'birth_date' => $birth_date,
            'gender' => substr($passport_data[1], 20, 1),
            'passport_expire_date' => date('Y-m-d', strtotime(substr($passport_expire_str, 0, 2) . '-' . substr($passport_expire_str, 2, 2) . '-' . substr($passport_expire_str, 4, 2))),
            'personal_number' => $personal_number,
        ];

        return $return;
    }

    

}