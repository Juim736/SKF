<?php

/**
 * Created by Jim
 * Date: 6/8/2018
 * Time: 9:51 PM
 */

namespace App\Libraries;



class ACL
{

    public static function db_reconnect()
    {
        if (Session::get('DB_MODE') == 'PRODUCTION') {
//        DB::purge('mysql-main');
//        DB::setDefaultConnection('mysql-main');
//        DB::setDefaultConnection(Session::get('mysql_access'));
        }
    }

    

    public static function getAccsessRight($module, $right = '', $id = null)
    {
        $accessRight = '';
        if (Auth::user()) {
            $user_type = Auth::user()->user_type;
        } else {
            die('You are not authorized user or your session has been expired!');
        }
        switch ($module) {
            case 'settings':
                if ($user_type == '1x101') {
                    $accessRight = 'AVE';
                }
                break;
            case 'dashboard':
                if ($user_type == '1x101') {
                    $accessRight = 'AVESERN';
                } elseif ($user_type == '5x505') {
                    $accessRight = 'AVESERNH';
                } elseif ($user_type == '13x131') {
                    $accessRight = 'AVESERNH';
                }
                break;
            case 'faq':
                if ($user_type == '1x101') {
                    $accessRight = 'AVE';
                }else if($user_type == '2x202' ||$user_type == '2x205'){
                    $accessRight = 'V';
                }
                break;
            case 'search':
                if ($user_type == '1x101' || $user_type == '2x202' || $user_type == '2x203') {
                    $accessRight = 'AVE';
                } else if ($user_type == '3x300' || $user_type == '3x305') {
                    $accessRight = 'V';
                } else {

                }
                break;

            case 'report':
                if ($user_type == '1x101') {
                    $accessRight = 'AVE';
                } else if ($user_type == '5x505' || $user_type == '6x606') {
                    $accessRight = 'V';
                } else {
                    $accessRight = 'V';
                }
                break;

            case 'user':
                if ($user_type == '1x101') {
                    $accessRight = '-A-V-E-R-';
                } else if ($user_type == '2x202') {
                    $accessRight = 'VER';
                } else if ($user_type == '4x404') {
                    $accessRight = '-V-R-';
                } else {
                    $accessRight = '-V-R-E';
                }
                if($right=="SPU"){
                    if (ACL::hasUserModificationRight($user_type, $right, $id))
                        return true;
                }

                break;

           

            default:
                $accessRight = '';
        }
        if ($right != '') {
            if (strpos($accessRight, $right) === false) {
                return false;
            } else {
                return true;
            }
        } else {
            return $accessRight;
        }
    }

    public static function isAllowed($accessMode, $right)
    {
        if (strpos($accessMode, $right) === false) {
            return false;
        } else {
            return true;
        }
    }




    /*     * **********************************End of Class****************************************** */
}
