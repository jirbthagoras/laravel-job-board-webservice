<?php

namespace Tests\Feature;

use App\Http\Requests\CompanyCreateJobRequest;
use Dotenv\Validator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyCreateJobRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $payload = [
            "name" => "apala",
            "description" => "apala",
            "salary" => 50000,
        ];

        $request = new CompanyCreateJobRequest();

        $validator = \Illuminate\Support\Facades\Validator::make($payload, $request->rules());

        var_dump($validator->validated());

        self::assertTrue($validator->passes());
    }
}
