<?php

namespace Tests\Feature;

use App\Http\Requests\Guest\GuestLoginRequest;
use App\Http\Requests\GuestCompanyRegisterRequest;
use App\Http\Requests\GuestWorkerRegisterRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class GuestRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testLoginRequest(): void
    {
        $data = [
            "email" => "admin@gmail.com",
            "password" => "hahahay"
        ];

        $request = new GuestLoginRequest();

        $validator = Validator::make($data, $request->rules());

        var_dump($validator->validate());

        $this->assertTrue($validator->passes());
    }

    public function testWorkerRegisterRequest()
    {

        $data = [
            "name" => "Athallah",
            "email" => "athallah@gmail.com",
            "password" => "hahahay",
            "age" => 16,
            "role" => "Software Engineer"
        ];

        $request = new GuestWorkerRegisterRequest();

        $validator = Validator::make($data, $request->rules());

        var_dump($validator->validate());

        $this->assertTrue($validator->passes());

    }

    public function testCompanyRegisterRequest()
    {

        $data = [
            "name" => "Athallah",
            "email" => "athallah@gmail.com",
            "password" => "hahahay",
            "address" => "Jl. BaturSari 1"
        ];

        $request = new GuestCompanyRegisterRequest();

        $validator = Validator::make($data, $request->rules());

        var_dump($validator->validate());

        $this->assertTrue($validator->passes());

    }


}
