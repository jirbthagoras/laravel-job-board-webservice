<?php

namespace Database\Seeders;

use App\Models\Worker;
use http\Client\Curl\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::query()->first();

        Worker::query()
            ->create([
                "age" => "30",
                "prophecy" => "Software Engineer",
                "user_id" => $user->id
            ]);
    }
}
