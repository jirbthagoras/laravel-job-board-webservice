<?php

namespace App\Http\Resources\Application;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerApplicationListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static $wrap = "Applications";

    public function toArray(Request $request): array
    {
        return [
            "name" => $this->job->name,
            "description" => $this->job->description,
            "salary" => $this->job->salary,
            "status" => $this->status,
            "company" => [
                "name" => $this->job->company->user->email,
                "address" => $this->job->company->address,
                "email" => $this->job->company->user->email,
            ]
        ];
    }
}
