<?php

namespace Database\Seeders;

use App\Models\Company;
use http\Client\Curl\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::query()->first();

        Company::query()->create([
            "address" => "Jl. Pesanggrahan 1",
            "user_id" => $user->id
        ]);
    }
}
