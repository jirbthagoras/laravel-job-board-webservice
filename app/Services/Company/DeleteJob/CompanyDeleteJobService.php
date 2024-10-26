<?php

namespace App\Services\Company\DeleteJob;

use App\Exceptions\JobException;
use App\Models\Job;

trait CompanyDeleteJobService
{
    public function deleteJob(string $jobId)
    {
        if(! $job = Job::query()
            ->where('id', "=", $jobId)
            ->where("company_id", "=", auth()->user()->company->id)
            ->exists()) {
            JobException::JobNotFound();
        }

        Job::query()->find($jobId)->delete();
    }
}
