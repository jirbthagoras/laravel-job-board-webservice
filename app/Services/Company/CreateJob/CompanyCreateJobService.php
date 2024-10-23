<?php

namespace App\Services\Company\CreateJob;

use App\Models\Job;

trait CompanyCreateJobService
{
    public function createJob(array $data)
    {
        $user = auth()->user();

        return Job::query()->create([
            "name" =>  $data["name"],
            "description" => $data["description"],
            "salary" => $data["salary"],
            "company_id" => $user->id
        ]);
    }
}
