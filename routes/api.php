<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

// Add this to your routes/web.php or routes/api.php
//Route::fallback(function () {
//    return response()->json(['message' => 'Page Not Found.'], 404);
//});

Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post("/login", [\App\Http\Controllers\GuestController::class, 'login'])
        ->name('login');
    Route::delete("/logout", [\App\Http\Controllers\UserController::class, "logout"])
        ->name('logout')
        ->middleware("auth:api");
});

Route::group([
    "middleware" => "api",
    "prefix" => "worker"
], function ($router) {
    Route::post("/register", [\App\Http\Controllers\GuestController::class, 'workerRegister'])
        ->name('worker.register')
        ->name("worker.register");
});
Route::group([
    "middleware" => "api",
    "prefix" => "company"
], function ($router) {
    Route::post("/register", [\App\Http\Controllers\GuestController::class, 'companyRegister'])
        ->name('company.register')
        ->name("company.register");
});
