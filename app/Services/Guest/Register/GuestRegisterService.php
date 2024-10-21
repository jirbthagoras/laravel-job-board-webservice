<?php

namespace App\Services\Guest\Register;

use App\Models\Company;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Support\Facades\Hash;

trait GuestRegisterService
{
    public function workerRegister($data)
    {
        $user = User::query()
            ->create(
                [
                    'name' => $data['name'],
                    "email" => $data['email'],
                    "password" =>($data['password']),
                ]
            );

        $worker = Worker::query()
            ->create(
                [
                    'age' => $data["age"],
                    "prophecy" => $data["prophecy"],
                    "user_id" => $user->id
                ]
            );

        return response()->json([
            "data" =>
            [
                "message" => "Worker Successfully Registered, you can login now."
            ]
        ]);
    }

    public function companyRegister($data)
    {
        $user = User::query()
            ->create(
                [
                    'name' => $data['name'],
                    "email" => $data['email'],
                    "password" =>$data['password'],
                ]
            );

        $company = Company::query()
            ->create([
                "address" => $data['address'],
                "user_id" => $user->id
            ]);

        return response()->json([
            "data" =>
                [
                    "message" => "Company Successfully Registered, you can login now."
                ]
        ]);
    }

}
