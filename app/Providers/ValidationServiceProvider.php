<?php

namespace App\Providers;

use App\Models\Sportive;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('valid_tc', function ($attribute, $value, $parameters, $validator) {
            $olmaz = array('11111111110', '22222222220', '33333333330', '44444444440', '55555555550', '66666666660', '7777777770', '88888888880', '99999999990');
            $ilkt = 0;
            $sont = 0;
            $tumt = 0;
            if ($value[0] == 0 or !ctype_digit($value) or strlen($value) != 11) {
                return false;
            } else {
                for ($a = 0; $a < 9; $a = $a + 2) {
                    $ilkt = $ilkt + $value[$a];
                }
                for ($a = 1; $a < 9; $a = $a + 2) {
                    $sont = $sont + $value[$a];
                }
                for ($a = 0; $a < 10; $a = $a + 1) {
                    $tumt = $tumt + $value[$a];
                }
                if (($ilkt * 7 - $sont) % 10 != $value[9] or $tumt % 10 != $value[10]) {
                    return false;
                } else {
                    foreach ($olmaz as $olurmu) {
                        if ($value == $olurmu) {
                            return false;
                        }
                    }
                    return true;
                }
            }
        });
    }
}
