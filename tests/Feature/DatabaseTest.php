<?php

namespace Tests\Feature;

use App\Models\Application;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use App\Models\Worker;
use Composer\Autoload\ClassLoader;
use Database\Seeders\ApplicationSeeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\JobSeeder;
use Database\Seeders\UserSeed;
use Database\Seeders\WorkerSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    protected function setUp(): void
    {

//        Gunakan di awal SetUp method!
        parent::setUp();

        Worker::query()->delete();
        Company::query()->delete();
        User::query()->delete();


    }

    public function testWorkerUserRelation()
    {
        $this->seed([UserSeed::class, WorkerSeeder::class]);

        $user = User::query()->first();

        $worker = Worker::query()->first();

        self::assertEquals($user->id, $worker->user_id);

    }

    public function testCompanyUserRelation()
    {
        $this->seed([UserSeed::class, CompanySeeder::class]);

        $user = User::query()->first();

        $company = Company::query()->first();

        self::assertEquals($user->id, $company->user_id);
    }

    public function testJobCompanyRelation()
    {
        $this->testCompanyUserRelation();

        $this->seed([JobSeeder::class]);

        $company = Company::query()->first();

        $jobs = Job::query()->where("company_id", $company->id)->get();

        foreach ($jobs as $job) {

            self::assertEquals($company->id, $job->company_id);

        }

    }

    public function testApplicationJobWorkerRelation()
    {

        $this->seed([UserSeed::class, WorkerSeeder::class, CompanySeeder::class, JobSeeder::class, ApplicationSeeder::class]);

        $job = Job::query()->first();

        $worker = Worker::query()->first();

        $application = Application::query()->first();

        self::assertEquals($job->id, $application->job_id);
        self::assertEquals($worker->id, $application->worker_id);

        $user =  User::query()->first();

        self::assertCount(2, $user->application);

    }


}
