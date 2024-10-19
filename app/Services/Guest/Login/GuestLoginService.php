<?php

namespace App\Services\Guest\Login;
use App\Models\User;
use Illuminate\Http\Request;

interface GuestLoginService
{
    public function login($data);
}
