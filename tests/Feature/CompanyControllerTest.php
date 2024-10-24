<?php

namespace Tests\Feature;

use App\Http\Resources\Job\JobListResource;
use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCreateJob(): void
    {
        $job = Job::query()->get();

        var_dump(JobListResource::collection($job));

        self::assertTrue(true);
    }
}
