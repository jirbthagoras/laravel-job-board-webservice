<?php

namespace Tests\Feature;

use App\Services\User\Logout\UserLogoutService;
use App\Services\User\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceProviderTest extends TestCase
{
    public UserService $userService;

    protected function setUp():void
    {
        parent::setUp();

        $this->userService =  $this->app->make(UserService::class);
    }


    /**
     * A basic feature test example.
     */
    public function testUserLogoutService(): void
    {
        self::assertInstanceOf(UserService::class, $this->userService);
    }
}
