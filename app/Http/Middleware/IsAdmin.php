<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{


    // app/Http/Middleware/IsAdmin.php

    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return $request->expectsJson() 
                ? abort(401) 
                : redirect()->route('login')->with('error', 'Please login first.');
        }

        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action. Admin access required.');
        }

        return $next($request);
    }
}