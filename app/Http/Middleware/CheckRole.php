<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, enum $role): Response
    {
        if (! $request->user() || ! $request->user()->role === $role) {
            abort(403, 'Unauthorized access.'); // Or redirect to a different page
        }
        return $next($request);
    }
}
