<?php

namespace App\Providers;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*\Log::channel('debug')->info('---------------------------------------------------------------------------');
        \DB::listen(function ($item) {
            \Log::channel('debug')->info($item->sql);
        });*/
    }
}
