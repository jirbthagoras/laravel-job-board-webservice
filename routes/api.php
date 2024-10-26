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
    "middleware" => ["api"],
    "prefix" => "worker"
], function ($router) {
    Route::post("/register", [\App\Http\Controllers\GuestController::class, 'workerRegister'])
        ->middleware("onlyGuest")
        ->name("worker.register");
    Route::get("/job", [\App\Http\Controllers\WorkerController::class, "jobList"])
        ->middleware("onlyWorker")
        ->middleware("auth:api")
        ->name("job.list");
    Route::post("/job/apply/{jobId}", [\App\Http\Controllers\WorkerController::class, "apply"])
        ->where("jobId", "[0-9]+")
        ->middleware("onlyWorker")
        ->middleware("auth:api")
        ->name("job.apply");
    Route::get("/application", [\App\Http\Controllers\WorkerController::class, "applicationList"])
        ->middleware("auth:api")
        ->middleware("onlyWorker")
        ->name("application.list");
    Route::delete("/application/delete/{applicationId}", [\App\Http\Controllers\WorkerController::class, "deleteApplication"])
        ->middleware("onlyWorker")
        ->middleware("auth:api")
        ->where("applicationId", "[0-9]+")
        ->name("application.delete");
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
    Route::delete("/job/delete/{jobId}", [\App\Http\Controllers\CompanyController::class, 'deleteJob'])
        ->middleware("auth:api")
        ->middleware("onlyCompany")
        ->where("jobId", "[0-9]+")
        ->name("job.delete");
    Route::get("/job/application", [\App\Http\Controllers\CompanyController::class, "listJobApplication"])
        ->middleware("auth:api")
        ->middleware("onlyCompany")
        ->name("company.application.list");
    Route::put("/job/accept/{jobId}/{applicationId}", [\App\Http\Controllers\CompanyController::class, "acceptApplication"])
        ->middleware("onlyCompany")
        ->middleware("auth:api")
        ->where("jobId", "[0-9]+")
        ->where("applicationId", "[0-9]+")
        ->where("applicationId", "[0-9]+")
        ->name("job.accept");
});
