<?php

namespace App\Http\Resources\Job;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "salary" => $this->salary,
            "company" => [
                "name" => $this->company->user->name,
                "email" => $this->company->user->email,
                "address" => $this->company->address,
            ]
        ];
    }
}
