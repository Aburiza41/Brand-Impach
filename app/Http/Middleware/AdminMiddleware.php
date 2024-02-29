<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is admin
        if (auth()->user()->is_admin) {
            return $next($request);
        }

        // Logout user
        auth()->logout();

        // Invalidate session
        $request->session()->invalidate();

        // Set Alert
        Alert::error('Error', 'You are not authorized to access this page');

        // Redirect to login page
        return redirect()->route('login');
    }
}
