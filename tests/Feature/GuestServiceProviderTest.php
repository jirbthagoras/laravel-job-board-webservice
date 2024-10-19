<?php

namespace Tests\Feature;

use App\Services\Guest\Login\GuestLoginService;
use App\Services\Guest\Register\GuestRegisterService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuestServiceProviderTest extends TestCase
{
    public GuestLoginService $guestLoginService;
    public GuestRegisterService $guestRegisterService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->guestLoginService = $this->app->make(GuestLoginService::class);
        $this->guestRegisterService = $this->app->make(GuestRegisterService::class);
    }


    /**
     * A basic feature test example.
     */
    public function testUserLoginService(): void
    {
        self::assertInstanceOf(GuestLoginService::class, $this->guestLoginService);
    }

    public function testUserRegisterService(): void
    {
        self::assertInstanceOf(GuestRegisterService::class, $this->guestRegisterService);
    }
}
