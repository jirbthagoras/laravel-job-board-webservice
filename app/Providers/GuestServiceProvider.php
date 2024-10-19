<?php

namespace App\Providers;

use App\Services\Guest\Login\GuestLoginService;
use App\Services\Guest\Login\GuestLoginServiceImpl;
use App\Services\Guest\Register\GuestRegisterService;
use App\Services\Guest\Register\GuestRegisterServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class GuestServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public $singletons = [
        GuestLoginService::class => GuestLoginServiceImpl::class,
        GuestRegisterService::class => GuestRegisterServiceImpl::class,
    ];

    public function provides()
    {
        return [GuestLoginService::class, GuestRegisterService::class];
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
