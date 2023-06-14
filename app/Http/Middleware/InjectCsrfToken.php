<?php

namespace App\Http\Middleware;

use Closure;

class InjectCsrfToken
{
    public function handle($request, Closure $next)
    {
        $token = csrf_token();
        $request->headers->set('X-CSRF-TOKEN', $token);

        return $next($request);
    }
}