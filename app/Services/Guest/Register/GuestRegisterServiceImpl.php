<?php

namespace App\Services\Guest\Register;

use App\Models\User;

class GuestRegisterServiceImpl implements GuestRegisterService
{
    public function workerRegister($data)
    {
        return "Register Worker";
    }

    public function companyRegister($data)
    {
        return "Resgiter Company";
    }

}
