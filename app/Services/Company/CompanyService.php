<?php

namespace App\Services\Company;

use App\Services\Company\CreateJob\CompanyCreateJobService;
use App\Services\Company\DeleteJob\CompanyDeleteJobService;

class CompanyService
{
    use CompanyDeleteJobService;
    use CompanyCreateJobService;
}
