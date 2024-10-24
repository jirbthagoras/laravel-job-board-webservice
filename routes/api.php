<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// General Routes
Route::group([
    'middleware' => ["api", \Illuminate\Session\Middleware\StartSession::class],
], function ($router) {
    Route::post("/login", [\App\Http\Controllers\GuestController::class, 'login'])
        ->middleware("onlyGuest")
        ->name('login');
    Route::delete("/logout", [\App\Http\Controllers\UserController::class, "logout"])
        ->name('logout')
        ->middleware("auth:api");
    Route::get("/me", [\App\Http\Controllers\UserController::class, "me"])
        ->name('me')
        ->middleware("auth:api");
});

// Worker Routes
Route::group([
    "middleware" => "api",
    "prefix" => "worker"
], function ($router) {
    Route::post("/register", [\App\Http\Controllers\GuestController::class, 'workerRegister'])
        ->middleware("onlyGuest")
        ->name("worker.register");
    Route::get("/job", [\App\Http\Controllers\WorkerController::class, "jobList"])
        ->middleware("onlyWorker")
        ->name("job.list");
});

// Company Routes
Route::group([
    "middleware" => "api",
    "prefix" => "company"
], function ($router) {
    Route::post("/register", [\App\Http\Controllers\GuestController::class, 'companyRegister'])
        ->middleware("onlyGuest")
        ->name("company.register");
    Route::post("/job/create", [\App\Http\Controllers\CompanyController::class, 'createJob'])
        ->middleware("auth:api")
        ->middleware("onlyCompany")
        ->name("job.create");
});
