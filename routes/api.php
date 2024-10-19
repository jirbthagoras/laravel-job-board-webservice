<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::fallback(function () {
    return response()->json([
        "errors" => [
            "message" => "Not Found"
        ]
    ]);
});

Route::post('/login', [\App\Http\Controllers\GuestController::class, 'login']);
Route::post('/worker/register', [\App\Http\Controllers\GuestController::class, 'workerRegister']);


//Route::group([
//    'middleware' => 'api',
//    'prefix' => 'auth',
//], function ($router) {
//
//});
