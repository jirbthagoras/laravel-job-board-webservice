<?php

namespace App\Services\User\Me;

trait MeService
{
    public function me()
    {
        return session("profile");
    }
}
