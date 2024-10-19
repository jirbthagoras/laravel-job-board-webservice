<?php

namespace App\Http\Controllers;

use App\Http\Requests\Guest\GuestLoginRequest;
use App\Http\Requests\GuestCompanyRegisterRequest;
use App\Http\Requests\GuestWorkerRegisterRequest;
use App\Http\Requests\GuestWorkerRegisterRequestTest;
use App\Services\Guest\Login\GuestLoginService;
use App\Services\Guest\Register\GuestRegisterService;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    protected GuestLoginService $loginService;

    protected GuestRegisterService $registerService;

    /**
     * @param GuestLoginService $loginService
     * @param GuestRegisterService $registerService
     */
    public function __construct(GuestLoginService $loginService, GuestRegisterService $registerService)
    {
        $this->loginService = $loginService;
        $this->registerService = $registerService;
    }

    public function login(GuestLoginRequest $request)
    {
        $data = $request->validated();

        return $data;
    }

    public function workerRegister(GuestWorkerRegisterRequest $request)
    {
        $data = $request->validated();

        return $data;
    }

    public function companyRegister(GuestCompanyRegisterRequest $request)
    {
        $data = $request->validated();

        return $data;
    }



}
