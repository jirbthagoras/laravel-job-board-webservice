<?php

namespace App\Http\Resources\Job;

use App\Http\Resources\Application\WorkerApplicationListResource;
use App\Services\Company\JobApplicationLists\CompanyJobApplicationService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "job_id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "salary" => $this->salary,
            "applications" => WorkerApplicationListResource::collection($this->applications),
        ];
    }
}
