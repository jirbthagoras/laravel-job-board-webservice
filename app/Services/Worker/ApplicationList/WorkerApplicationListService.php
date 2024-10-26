<?php

namespace App\Services\Worker\ApplicationList;

use App\Http\Resources\Application\WorkerApplicationListResource;
use App\Models\Application;

trait WorkerApplicationListService
{
    public function applicationList()
    {
        return WorkerApplicationListResource::collection(Application::all());
    }
}
