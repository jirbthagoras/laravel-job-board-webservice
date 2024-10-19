<?php

namespace App\Providers;

use App\Services\User\Logout\UserLogoutService;
use App\Services\User\Logout\UserLogoutServiceImpl;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public $singletons = [
      UserLogoutService::class => UserLogoutServiceImpl::class
    ];

    public function provides()
    {
        return [UserLogoutService::class];
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
