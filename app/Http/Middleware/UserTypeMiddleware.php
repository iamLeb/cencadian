<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Check if user is authenticated and their type
        if ($user && $user->isAdmin()) {
            // If user is an admin, redirect to admin layout
            return $next($request);
        } else if ($user && $user->isCompany()) {
            return redirect()->route('company.home');
        } else if ($user && $user->isIntern()) {
            return redirect()->route('home');
        }

        // For guest users or non-admins, proceed with the request
//        return $next($request);
    }
}
