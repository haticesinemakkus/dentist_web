<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Libraries\Helpers;
use App\Models\InfoPopup;
use App\Models\Transport;
use App\Models\User;
use App\Models\UserPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use Cache, File;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Artisan, DB,Curl;


use Grimzy\LaravelMysqlSpatial\Types\Geometry;
use Grimzy\LaravelMysqlSpatial\Types\GeometryCollection;

class DevController extends Controller
{
    public function test(Request $request)
    {
        $user_count_yok = User::where('is_control',6)->count();
        $user_count_not_yok = User::where('is_control','<>',6)->count();
        $user_count_yok_not_null = User::where('is_control',6)->where('yok_okulu_multi','<>',null)->count();
        dump('YÖK kontrol edilen sayısı '.$user_count_yok );
        dump('YÖK güncellenen sayısı '.$user_count_yok_not_null );
        dump('Kalan Sayısı(6 olmayan) '.$user_count_not_yok );
    }

    public function cache(Request $request)
    {
        Cache::flush();
        Artisan::call('route:cache');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('optimize:clear');

        echo 'CACHE - OK';
    }

    public function pull(Request $request)
    {
        $hooks = array(
            '10.1.1.231' => 'https://trusting-liskov.213-74-184-66.plesk.page:8443/modules/git/public/web-hook.php?uuid=cd44d42b-533b-77a8-096a-3e38444b0d80',
            '10.1.1.232' => 'https://serene-nobel.213-74-184-66.plesk.page:8443/modules/git/public/web-hook.php?uuid=1602c191-6045-c7b5-62e5-50e509825b4d',
            '10.1.1.233' => 'https://distracted-moore.213-74-184-66.plesk.page:8443/modules/git/public/web-hook.php?uuid=9ba5a563-ceb9-8a2e-0719-5a63b34915bd',
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $hooks[$_SERVER['SERVER_ADDR']]);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $output = curl_exec($ch);
        curl_close($ch);

        echo 'PULL - OK';
    }


    public function cacheall(Request $request)
    {

        $servers = array(
            '10.1.1.231',
            '10.1.1.232',
            '10.1.1.233',
        );

        foreach ($servers as $ip)
        {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://" . $ip . "/dev/cache");

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $output = curl_exec($ch);

            curl_close($ch);

            echo '<pre>' . $ip . '</pre>';
        }
    }

    public function oneclick(Request $request)
    {
        $servers = array(
            '10.1.1.231',
            '10.1.1.232',
            '10.1.1.233',
        );

        foreach ($servers as $ip)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://" . $ip . "/dev/pull");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $output = curl_exec($ch);
            curl_close($ch);
            echo '<pre>' . $ip . '</pre>';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://" . $ip . "/dev/cache");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $output = curl_exec($ch);
            curl_close($ch);
            echo '<pre>' . $ip . '</pre>';
        }
    }

}
