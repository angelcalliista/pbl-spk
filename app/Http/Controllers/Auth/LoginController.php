<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)->letters()->numbers(),
            ],
            'id_role' => 'required|integer|exists:role,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'id_role' => $request->id_role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (app('Illuminate\Cache\RateLimiter')->tooManyAttempts($this->throttleKey($request), 5)) {
            $seconds = app('Illuminate\Cache\RateLimiter')->availableIn($this->throttleKey($request));

            return back()->withErrors([
                'email' => "Too many login attempts. Please try again in  <span id='retry-timer'>{$seconds}</span> seconds.",
            ])->withInput($request->only('email'));
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            app('Illuminate\Cache\RateLimiter')->clear($this->throttleKey($request));
            return redirect()->intended('/');
        }
        app('Illuminate\Cache\RateLimiter')->hit($this->throttleKey($request), 60);

        return back()->withErrors([
            'email' => 'Incorrect email or password.',
        ])->withInput($request->only('email'));
    }

    protected function throttleKey(Request $request)
    {
        return strtolower($request->input('email')) . '|' . $request->ip();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

