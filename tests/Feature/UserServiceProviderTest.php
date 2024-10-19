<?php

namespace Tests\Feature;

use App\Services\User\Logout\UserLogoutService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceProviderTest extends TestCase
{
    public UserLogoutService $userLogoutService;

    protected function setUp():void
    {
        parent::setUp();

        $this->userLogoutService =  $this->app->make(UserLogoutService::class);
    }


    /**
     * A basic feature test example.
     */
    public function testUserLogoutService(): void
    {
        self::assertInstanceOf(UserLogoutService::class, $this->userLogoutService);
    }
}
