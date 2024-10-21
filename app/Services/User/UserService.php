<?php

namespace App\Services\User;

use App\Services\User\Logout\UserLogoutService;
use App\Services\User\Me\MeService;

class UserService
{
    use UserLogoutService;
    use MeService;
}
