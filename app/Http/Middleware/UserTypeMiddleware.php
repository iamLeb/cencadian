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

        if ($user) {
            $route = $request->route()->getName();

            switch ($user->type) {
                case 'admin':
                    if (strpos($route, 'company.') === 0 || strpos($route, 'intern.') === 0) {
                        return redirect()->back()->with('error', 'Access denied.');
                    }
                    break;

                case 'company':
                    if (strpos($route, 'admin.') === 0 || strpos($route, 'intern.') === 0) {
                        return redirect()->back()->with('error', 'Access denied.');
                    }
                    break;

                case 'intern':
                case 'hired':
                    if (strpos($route, 'admin.') === 0 || strpos($route, 'company.') === 0) {
                        return redirect()->back()->with('error', 'Access denied.');
                    }
                    break;

                default:
                    return redirect()->back()->with('error', 'Access denied.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        return $next($request);
    }
}
