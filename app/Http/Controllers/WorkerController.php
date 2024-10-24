<?php

namespace App\Http\Controllers;

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
}
