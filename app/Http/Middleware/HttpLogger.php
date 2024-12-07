<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HttpLogger
{
    public function handle(Request $request, Closure $next)
    {
        // Log the request URL and method
        Log::info('Request logged', [
            'url' => $request->url(),
            'method' => $request->method(),
            'headers' => $request->headers->all(),
        ]);

        return $next($request);
    }
}