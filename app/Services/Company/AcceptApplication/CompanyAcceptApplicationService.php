<?php

namespace App\Services\Company\AcceptApplication;

use App\Models\Application;

trait CompanyAcceptApplicationService
{
    public function acceptApplication(string $jobId, string $applicationId)
    {
        $application = Application::query()->findOrFail($applicationId)->first();

        $application->status = "accepted";
        $application->save();
    }
}
