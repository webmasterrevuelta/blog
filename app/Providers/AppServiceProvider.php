<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    public function bootHorizon()
{
    if ($horizonEmail = config('lio.horizon_email')) {
        Horizon::routeMailNotificationsTo($horizonEmail);
    }

    Horizon::auth(function ($request) use ($horizonEmail) {
        return auth()->check() &&
            auth()->user()->emailAddress() === $horizonEmail;
    });
}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
