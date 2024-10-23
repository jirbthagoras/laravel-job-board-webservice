<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateJobRequest;
use App\Http\Resources\JobResource;
use App\Models\Job;
use App\Services\Company\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected CompanyService $companyService;

    /**
     * @param CompanyService $companyService
     */
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function createJob(CompanyCreateJobRequest $request)
    {
        $data = $request->validated();

        return response()->json([
            "data" => [
                "message" => "Job created",
                "job" => new JobResource($this->companyService->createJob($data))
            ]
        ]);
    }
}
