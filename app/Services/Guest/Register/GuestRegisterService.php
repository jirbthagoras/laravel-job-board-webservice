<?php

namespace App\Services\Guest\Register;

use App\Models\User;

interface GuestRegisterService
{
    public function workerRegister($data);

    public function companyRegister($data);
}
