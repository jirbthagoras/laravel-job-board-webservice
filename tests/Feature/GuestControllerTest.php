<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuestControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        User::query()->truncate();
    }


    /**
     * A basic feature test example.
     */
    public function testGuestWorkerRegister ()
    {
        $this->post('/api/worker/register', [
            "name" => "Athalla",
            "email" => "jabriel@gmail.com",
            "password" => "halosemuamaribermain",
            "age" => 16,
            "prophecy" => "Software Engineer",
        ])
        ->assertStatus(200)
        ->assertJson([
            "data" => [
                "message" => "Worker Successfully Registered, you can login now."
            ],
        ]);
    }

    public function testGuestLogin()
    {

        $this->testGuestWorkerRegister();

        $response = $this->post('/api/login', [
            "email" => "jabriel@gmail.com",
            "password" => "halosemuamaribermain",
        ])
            ->assertStatus(200);

        var_dump(auth()->user()->toJson(JSON_PRETTY_PRINT));

    }


}
