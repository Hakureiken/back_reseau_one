<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // 
        Blade::if('admin', function () {
            if (auth()->user() && auth()->user()->role > 90) {
                return 1;
            }
            return 0;
        });

        Blade::if('formator', function () {
            if (auth()->user() && auth()->user()->role > 40) {
                return 1;
            }
            return 0;
        });

        Blade::if('client', function () {
            if (auth()->user() && auth()->user()->role > 30) {
                return 1;
            }
            return 0;
        });

        Blade::if('visitor', function () {
            if (auth()->user() && auth()->user()->role >= 0) {
                return 1;
            }
            return 0;
        });
    }
}
