<?php

namespace App\Services\Worker\JobList;

use App\Http\Resources\Job\JobListResource;
use App\Models\Job;

trait WorkerJobListService
{
    public function jobList()
    {
        $jobs = Job::all();

        return JobListResource::collection($jobs);
    }
}
