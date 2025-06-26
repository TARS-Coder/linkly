<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,... $roles): Response
    {
        $user = Auth::user();

        if(!$user || !in_array($user->role, $roles)) {
            // If the user is not authenticated or does not have the required role, redirect to home
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
