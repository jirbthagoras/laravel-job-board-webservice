<?php

namespace App\Services\User\Logout;

use Tymon\JWTAuth\Facades\JWTAuth;

trait UserLogoutService
{
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json([
            "data" => [
                "message" => "Successfully Logged Out "
            ]
        ]);
    }

}
