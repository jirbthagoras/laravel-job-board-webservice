<?php

namespace Tests\Feature\Route;

use Tests\TestCase;

class
RouteErrorTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testNotFound(): void
    {
        $this->post("/api/not/found")
            ->assertStatus(404);
    }

    public function testWrongMethod()
    {

        $this->get("/api/login")
            ->assertStatus(405);

    }


}
