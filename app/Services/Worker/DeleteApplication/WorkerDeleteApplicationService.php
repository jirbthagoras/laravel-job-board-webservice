<?php

namespace App\Services\Worker\DeleteApplication;

use App\Exceptions\ApplicationException;
use App\Models\Application;
use Illuminate\Auth\Access\Gate;

trait WorkerDeleteApplicationService
{
    public function deleteApplication(string $applicationId)
    {
        if(! $application = Application::query()
            ->where("id", "=", $applicationId)
            ->where("worker_id", "=", auth()->user()->worker->id)
            ->get()) {

            ApplicationException::notFound();

        }

        return Application::query()->find($applicationId)->delete();
    }
}
