<?php

namespace App\Http\Controllers;

use App\Http\Resources\Application\ApplicationResource;
use App\Services\Worker\WorkerService;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public WorkerService $workerService;

    /**
     * @param WorkerService $workerService
     */
    public function __construct(WorkerService $workerService)
    {
        $this->workerService = $workerService;
    }

    public function jobList()
    {
        return response()->json([
            "data" => $this->workerService->jobList()
        ]);
    }

    public function apply(string $jobId)
    {
        return response()->json([
            "data" => [
                "message" => "Application Successfully Created, Congrats!",
                "application" => new ApplicationResource($this->workerService->apply($jobId))
            ]
        ]);
    }

    public function applicationList()
    {
        return response()->json([
            "Applications" => $this->workerService->applicationList(),
        ]);
    }
}
