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

        switch ($user->type) {
            case 'admin':
                return $next($request);
                break;
            case 'intern':
                return redirect()->route('home')->with('success', 'Hello Intern');
                break;
            case 'company':
                return redirect()->route('company.home')->with('success', 'Hello Company');
                break;
        }

    }
}
