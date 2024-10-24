<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            "onlyGuest" => \App\Http\Middleware\OnlyGuestMiddleware::class,
            "onlyCompany" => \App\Http\Middleware\OnlyCompanyMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

        $exceptions->renderable(function (\App\Exceptions\AlreadyLoggedInException $e, \Illuminate\Http\Request $request) {
            return response()->json([
                "errors" => [
                    "message" => $e->getMessage(),
                ]
            ]);
        });

        $exceptions->renderable(function (\App\Exceptions\OnlyCompanyException $e, \Illuminate\Http\Request $request) {
            return response()->json([
                "errors" => [
                    "message" => $e->getMessage(),
                ]
            ]);
        });

    })->create();
