<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class LimitLoginAttempts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $key = 'login|' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors([
                'email' => 'Terlalu banyak percobaan login. Silakan coba lagi dalam ' . $seconds . ' detik.',
            ])->onlyInput('email');
        }

        $response = $next($request);

        // Cek jika user berhasil login (biasanya redirect ke dashboard atau home)
        // Kita bisa cek apakah user terautentikasi dan response adalah redirect
        if ($request->user()) {
            RateLimiter::clear($key);
        } else {
            // Jika user belum login setelah request diproses (gagal login), hitung percobaan
            // Kita pastikan ini hanya untuk method POST (saat submit form)
            if ($request->isMethod('post')) {
                RateLimiter::hit($key);
            }
        }

        return $response;
    }
}
