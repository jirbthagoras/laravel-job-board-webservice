<?php

namespace App\Services\Guest;

use App\Services\Guest\Login\GuestLoginService;
use App\Services\Guest\Register\GuestRegisterService;

class GuestService
{
    use GuestLoginService;
    use GuestRegisterService;
}
