<?php

namespace App\Libraries;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Route;

class Helpers
{
    public static function buttonPrivacyControl($route_name)
    {
        $onuser = Auth::user();

        $permissions = null;

        if ($onuser->permissions != null) {
            $permissions = $onuser->permissions;
        } else {
            $user_role = Role::find($onuser->role_id);

            if (! $user_role) {
                return false;
            }

            if ($user_role->permissions == null) {
                return false;
            }

            $permissions = $user_role->permissions;
        }

        if (! in_array($route_name, json_decode($permissions, true))) {
            return false;
        }

        return true;
    }

    public static function activeMenu($groupArr)
    {
        if(Route::currentRouteName() == 'panel.' . $groupArr[0])
        {
            return 'active open';
        }

        $temp = array();
        foreach ($groupArr as $value) {
            array_push($temp, 'panel.' . $value . '_list');
            array_push($temp, 'panel.' . $value . '_form');
        }

        return in_array(Route::currentRouteName(), $temp) ? 'active open' : '';
    }

    public static function validationArray($messages = NULL)
    {
        $message = array();
        foreach ($messages->get('*') as $item) {
            array_push($message, $item[0]);
        }
        /*$error = $messages->first('*');
        $message = strtoupper($error[0]) . substr($error, 1, -1);*/
        return $message;
    }

    public static function tr_strtoupper($text)
    {
        $text=mb_strtoupper(Helpers::tr_up($text),'UTF-8');
        return $text;
    }

    public static function tr_up($str){
        $str = str_replace('i', 'İ', $str);
        $str = str_replace('ı', 'I', $str);
        return $str;
    }

    public static function shortURL($url)
    {
        $url = file_get_contents("http://tinyurl.com/api-create.php?url=$url");

        return str_replace('https://', '', $url);
    }

    public static function PhoneNumber($phone){
        return  preg_replace("/[^0-9]/", "", $phone);
    }

    public static function JsonWarning($message)
    {
        return response()->json(['status' => false, 'message' =>  $message ], 400);
    }
}
