<?php

namespace App\Http\Middleware;

use App\Exceptions\OnlyCompanyException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\isNull;

class OnlyCompanyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(isNull(auth()->user()->worker))
        {
            throw OnlyCompanyException::OnlyCompany();
        }

        return $next($request);
    }
}
