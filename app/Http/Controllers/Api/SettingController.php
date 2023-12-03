<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function list()
    {
        $setting = Settings::find(1);
        $items = [];

            $items[] = [
                'id' => $setting->id,
                'working_hours' => $setting->working_hours,
                'phone' => $setting->phone1,
                'email' => $setting->email,
                'address' => $setting->address1,
                'facebook' => $setting->facebook,
                'twitter' => $setting->twitter,
                'instagram' => $setting->instagram,
                'youtube' => $setting->youtube,
                'linkedin' => $setting->linkedin,
                'about_us' => $setting->about_us,
                'whatsapp_phone' => $setting->whatsapp_phone,
            ];
        return response()->json($items);
    }
}
