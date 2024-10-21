<?php

namespace App\Http\Controllers;

use App\Http\Requests\Guest\GuestCompanyRegisterRequest;
use App\Http\Requests\Guest\GuestLoginRequest;
use App\Http\Requests\Guest\GuestWorkerRegisterRequest;
use App\Http\Requests\GuestWorkerRegisterRequestTest;
use App\Services\Guest\GuestService;
use App\Services\Guest\Login\GuestLoginService;
use App\Services\Guest\Register\GuestRegisterService;
use MongoDB\Driver\Session;
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

        return $this->guestService->login($data);
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
}
