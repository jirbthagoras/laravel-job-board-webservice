<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Worker;
use Database\Seeders\UserSeed;
use Database\Seeders\WorkerSeeder;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use function PHPUnit\Framework\isNull;

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

    public function testGuestCompanyRegister()
    {
        $this->post('/api/company/register', [
            "name" => "Athalla",
            "email" => "jabriel@gmail.com",
            "password" => "halosemuamaribermain",
            "address" => "Jl. Sigma Skibidi"
        ])
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    "message" => "Company Successfully Registered, you can login now."
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



    }


}
