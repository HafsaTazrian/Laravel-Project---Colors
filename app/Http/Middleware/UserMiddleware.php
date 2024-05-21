<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == 0) {  // Check if the user is NOT an admin
                return $next($request);
            } else {
                Auth::logout(); // Optional: Logout if you want to enforce re-authentication
                return redirect('/login')->with('error', 'Unauthorized access.'); // Redirect to a login page or another appropriate page
            }
        }

        // Redirect unauthenticated users
        return redirect('/login')->with('error', 'You need to be logged in to access this page.');
    }
}
