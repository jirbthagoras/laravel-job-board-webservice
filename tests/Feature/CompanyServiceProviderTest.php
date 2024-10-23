<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Services\Company\CompanyService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyServiceProviderTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public CompanyService $companyService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->companyService = $this->app->make(CompanyService::class);
    }

    public function testCompanyServiceProvider(): void
    {

        self::assertInstanceOf(CompanyService::class, $this->companyService);

    }

    public function testCompanyCreateJobService()
    {

        self::assertEquals("Create Job", $this->companyService->createJob());

    }


}
