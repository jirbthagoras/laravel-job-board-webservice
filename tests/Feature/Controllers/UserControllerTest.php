<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testLogout(): void
    {
        $this->delete('/api/logout');
    }
}
