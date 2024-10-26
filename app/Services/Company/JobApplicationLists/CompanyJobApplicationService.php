<?php

namespace App\Services\Company\JobApplicationLists;

use App\Http\Resources\Job\JobApplicationResource;
use App\Models\Job;

trait CompanyJobApplicationService
{
    public function jobApplicationList()
    {
        $jobs = Job::query()->where("company_id", "=", auth()->user()->company->id);

        return JobApplicationResource::collection($jobs->get());
    }
}
