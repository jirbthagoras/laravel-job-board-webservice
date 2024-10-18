<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::query()->first();

        Job::query()
            ->create([
                "name" => "Bersih-Bersih selokan",
                "description" => "Bersih-bersih selokan di daerah Semarang tepatnya Jl. Gajah Raya",
                "salary" => 20000,
                "company_id" => $company->id,
            ]);

        Job::query()
            ->create([
                "name" => "Kotor-kotorin selokan",
                "description" => "Kotor-kotorin selokan di daerah Semarang tepatnya Jl. Gajah Raya",
                "salary" => 0,
                "company_id" => $company->id,
            ]);
    }
}
