<?php

namespace Tests\Feature\Requests;

use App\Http\Requests\Guest\GuestCompanyRegisterRequest;
use App\Http\Requests\Guest\GuestLoginRequest;
use App\Http\Requests\Guest\GuestWorkerRegisterRequest;
use App\Models\User;
use Database\Seeders\CompanySeeder;
use Database\Seeders\UserSeed;
use Database\Seeders\WorkerSeeder;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class GuestRequestTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        User::query()->delete();
    }


    /**
     * A basic feature test example.
     */
    public function testLoginRequest(): void
    {
        $data = [
            "email" => "admin@gmail.com",
            "password" => "ssssss"
        ];

        $request = new GuestLoginRequest();

        $validator = Validator::make($data, $request->rules());

        var_dump($validator->validate());

        $this->assertTrue($validator->passes());
    }

    public function testWorkerRegisterRequest()
    {

        $this->seed([UserSeed::class, WorkerSeeder::class]);

        $data = [
            "name" => "Athalla",
            "email" => "athalla@gmail.com",
            "password" => "hahahay",
            "age" => 16,
            "role" => "Software Engineer"
        ];

        $request = new GuestWorkerRegisterRequest();

        $validator = Validator::make($data, $request->rules());

        $this->assertTrue($validator->fails());

    }

    public function testCompanyRegisterRequest()
    {

        $this->seed([UserSeed::class, CompanySeeder::class]);

        $data = [
            "name" => "Athallah",
            "email" => "athalla@gmail.com",
            "password" => "sssssssssd",
            "address" => "Jl. BaturSari 1"
        ];

        $request = new GuestCompanyRegisterRequest();

        $validator = Validator::make($data, $request->rules());

        $this->assertTrue($validator->fails());

    }


}
