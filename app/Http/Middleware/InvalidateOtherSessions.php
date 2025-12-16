<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class InvalidateOtherSessions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Jalankan hanya jika user berhasil login dan ini adalah method POST
        if ($request->isMethod('post') && $request->user() && $request->password) {
            Auth::logoutOtherDevices($request->password);
        }

        return $response;
    }
}
