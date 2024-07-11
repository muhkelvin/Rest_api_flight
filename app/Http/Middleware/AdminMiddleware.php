<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
{
    if (auth()->user() && auth()->user()->is_admin) {
        return $next($request);
    }

    return response()->json(['message' => 'Unauthorized'], 403);
}
}