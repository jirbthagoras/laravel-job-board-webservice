<?php

namespace App\Http\Controllers;

use App\Http\Requests\Guest\GuestCompanyRegisterRequest;
use App\Http\Requests\Guest\GuestLoginRequest;
use App\Http\Requests\Guest\GuestWorkerRegisterRequest;
use App\Http\Requests\GuestWorkerRegisterRequestTest;
use App\Services\Guest\GuestService;
use App\Services\Guest\Login\GuestLoginService;
use App\Services\Guest\Register\GuestRegisterService;
use Tymon\JWTAuth\Facades\JWTAuth;

class GuestController extends Controller
{
    protected GuestService $guestService;

    /**
     * @param GuestService $guestService
     */
    public function __construct(GuestService $guestService)
    {
        $this->guestService = $guestService;
    }


    public function login(GuestLoginRequest $request)
    {
        $data = $request->validated();

        if (! $token = auth()->attempt($data)) {
            return response()->json(['error' =>[
                'message' => 'Password Or Email could be wrong.'
            ]], 400);
        }

        return $this->respondWithToken($token);
    }

    public function workerRegister(GuestWorkerRegisterRequest $request)
    {
        $data = $request->validated();

        return $this->guestService->workerRegister($data);
    }

    public function companyRegister(GuestCompanyRegisterRequest $request)
    {
        $data = $request->validated();

        return $this->guestService->companyRegister($data);
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
