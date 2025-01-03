<?php

namespace App\Http\Middleware;

use App\Exceptions\AlreadyLoggedInException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\isNull;

class OnlyGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()) {
            throw AlreadyLoggedInException::AlreadyloggedIn();
        }

        return $next($request);
    }
}
