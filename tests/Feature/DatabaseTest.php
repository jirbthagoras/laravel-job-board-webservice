<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;
use App\Models\Worker;
use Composer\Autoload\ClassLoader;
use Database\Seeders\CompanySeeder;
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

    public function testCompanyRelation()
    {
        $this->seed([UserSeed::class, CompanySeeder::class]);

        $user = User::query()->first();

        $company = Company::query()->first();

        self::assertEquals($user->id, $company->user_id);

    }


}
