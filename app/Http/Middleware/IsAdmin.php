<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            // Jika user tidak login atau bukan admin
            // Jika request ajax/json, return 403
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized.'], 403);
            }
            
            // Jika user login tapi bukan admin, logout dan redirect
            if (Auth::check()) {
                Auth::logout();
                return redirect()->route('login')->withErrors(['email' => 'Anda tidak memiliki akses admin.']);
            }

            return redirect()->route('login');
        }

        return $next($request);
    }
}
