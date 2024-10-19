<?php

namespace App\Providers;

use App\Services\Guest\GuestService;
use App\Services\Guest\Login\GuestLoginService;
use App\Services\Guest\Register\GuestRegisterService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class GuestServiceProvider extends ServiceProvider implements DeferrableProvider
{


    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(GuestService::class, function ($app) {
            return new GuestService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
