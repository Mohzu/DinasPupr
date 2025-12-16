<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware(\App\Http\Middleware\LimitLoginAttempts::class)->only('login');
        $this->middleware(\App\Http\Middleware\InvalidateOtherSessions::class)->only('login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Cek apakah user adalah admin
            if (!Auth::user()->is_admin) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Anda tidak memiliki akses admin.',
                ])->onlyInput('email');
            }

            $request->session()->regenerate();
            
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
