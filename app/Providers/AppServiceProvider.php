<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Instagram;

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
        
        app()->singleton(Instagram::class, function ($app){
            return new Instagram('Istagram key');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
