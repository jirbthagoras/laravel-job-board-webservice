<?php

namespace App\Services\Guest\Login;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isNull;

trait GuestLoginService
{
    public function login(array $data)
    {
        if (! $token = auth()->attempt($data)) {
            return response()->json(['error' =>[
                'message' => 'Password Or Email could be wrong.'
            ]], 400);
        }

        $user = auth()->user();

        if(! $profile = $user->worker)
            {
                $profile = $user->company;
            }

        session()->put("profile",
            [
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "profile" => $profile,
            ]
        );

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }


}
