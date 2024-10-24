<?php

namespace App\Http\Middleware;

use App\Exceptions\OnlyCompanyException;
use App\Exceptions\OnlyWorkerException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\isNull;

class OnlyWorkerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(! auth()->user()->worker)
        {
            throw OnlyWorkerException::OnlyWorker();
        }

        return $next($request);
    }
}
