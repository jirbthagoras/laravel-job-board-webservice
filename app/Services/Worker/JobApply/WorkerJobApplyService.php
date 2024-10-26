<?php

namespace App\Services\Worker\JobApply;

use App\Exceptions\JobException;
use App\Models\Application;
use App\Models\Job;

trait WorkerJobApplyService
{
    public function apply(string $jobId)
    {
        if(! Job::query()
            ->where('id', "=", $jobId)
            ->exists())
        {
            JobException::JobNotFound();
        } elseif (Application::query()
            ->where('worker_id', "=", auth()->user()->id)
            ->exists())
        {
            JobException::AlreadyApplied();
        }

        $worker = auth()->user()->worker;

        return Application::query()
            ->create([
                "worker_id" => $worker->id,
                "job_id" => $jobId,
                "status" =>  "pending",
            ]);
    }
}
