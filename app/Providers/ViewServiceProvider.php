<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Settings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('web.layout.footer', function ($view) {
            $setting = Settings::where('id',1)->first();
            $view->with('setting',$setting);
        });

        View::composer('web.layout.master', function ($view) {
            $setting = Settings::where('id',1)->first();
            $view->with('setting',$setting);
        });
    }
}
