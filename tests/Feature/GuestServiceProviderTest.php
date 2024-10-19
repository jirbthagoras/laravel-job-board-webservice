<?php

namespace Tests\Feature;

use App\Http\Requests\Guest\GuestLoginRequest;
use App\Services\Guest\GuestService;
use App\Services\Guest\Login\GuestLoginService;
use App\Services\Guest\Register\GuestRegisterService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuestServiceProviderTest extends TestCase
{
    public GuestService $guestService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->guestService = $this->app->make(GuestService::class);
    }


    /**
     * A basic feature test example.
     */
    public function testGuestLoginService(): void
    {
        self::assertInstanceOf(GuestService::class, $this->guestService);
    }
}
