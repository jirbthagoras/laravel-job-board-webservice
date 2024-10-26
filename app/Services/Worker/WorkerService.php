<?php

namespace App\Services\Worker;

use App\Services\Worker\ApplicationList\WorkerApplicationListService;
use App\Services\Worker\JobApply\WorkerJobApplyService;
use App\Services\Worker\JobList\WorkerJobListService;

class WorkerService
{
    use WorkerJobListService;
    use WorkerJobApplyService;
    use WorkerApplicationListService;
}
