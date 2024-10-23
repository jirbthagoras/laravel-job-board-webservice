<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;
use App\Services\Company\CompanyService;
use Database\Seeders\CompanySeeder;
use Database\Seeders\UserSeed;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyCreateJobServiceTest extends TestCase
{
    public CompanyService $companyService;

    protected function setUp(): void
    {
        parent::setUp();

        User::query()->truncate();

        $this->companyService = app(CompanyService::class);
    }


    /**
     * A basic feature test example.
     */
    public function testCreateJob(): void
    {
        $this->seed([UserSeed::class, CompanySeeder::class]);

        $user = User::query()->first();

        auth()->login($user);

        $response = $this->companyService->createJob(
            [
                "name" => "test job",
                "description" => "Hey",
                "salary" => 100,
            ]
        );
    }
}
