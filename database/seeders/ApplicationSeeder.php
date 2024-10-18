<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Job;
use App\Models\Worker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $job1 = Job::query()->first();
        $job2 = Job::query()->latest()->first();

        $worker = Worker::query()->first();

        Application::query()
            ->create([
                "status" => "Pending",
                "worker_id" => $worker->id,
                "job_id" => $job1->id
            ]);

        Application::query()
            ->create([
                "status" => "Pending",
                "worker_id" => $worker->id,
                "job_id" => $job2->id
            ]);

    }
}
