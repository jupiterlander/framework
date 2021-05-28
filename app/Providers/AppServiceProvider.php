<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema; // for scrutinizer

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
        // for scrutinizer
        Schema::defaultStringLength(191);
    }
}
