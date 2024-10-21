<?php

namespace Tests\Feature\Providers;

use App\Services\Guest\GuestService;
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
