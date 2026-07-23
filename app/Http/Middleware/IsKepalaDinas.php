<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsKepalaDinas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !Auth::user()->isKepalaDinas()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Forbidden. Hanya Kepala Dinas yang memiliki akses.'], 403);
            }
            
            return redirect()->route('admin.dashboard')->with('error', 'Hanya Kepala Dinas yang memiliki akses ke menu tersebut.');
        }

        return $next($request);
    }
}
