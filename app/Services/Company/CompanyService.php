<?php

namespace App\Services\Company;

use App\Services\Company\AcceptApplication\CompanyAcceptApplicationService;
use App\Services\Company\CreateJob\CompanyCreateJobService;
use App\Services\Company\DeleteJob\CompanyDeleteJobService;
use App\Services\Company\JobApplicationLists\CompanyJobApplicationService;

class CompanyService
{
    use CompanyDeleteJobService;
    use CompanyCreateJobService;
    use CompanyJobApplicationService;
    use CompanyAcceptApplicationService;
}
