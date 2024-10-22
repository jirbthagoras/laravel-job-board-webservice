<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([
    "middleware" => "api",
    "prefix" => "worker"
], function ($router) {
    Route::post("/register", [\App\Http\Controllers\GuestController::class, 'workerRegister'])
        ->middleware("onlyGuest")
        ->name("worker.register");
});
Route::group([
    "middleware" => "api",
    "prefix" => "company"
], function ($router) {
    Route::post("/register", [\App\Http\Controllers\GuestController::class, 'companyRegister'])
        ->middleware("onlyGuest")
        ->name("company.register");
});
