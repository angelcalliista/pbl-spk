<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles  // Nama role yang diizinkan, e.g., 'admin', 'user'
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$allowedRoles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        if (!$user->role || !$user->role->name) {
            Log::warning("User ID {$user->id} ({$user->email}) tidak memiliki role yang valid, relasi 'role' bermasalah, atau nama role kosong.");
            return redirect()->route('welcome')->with('error', 'Akses ditolak: Role Anda tidak terdefinisi atau tidak valid.');
        }

        $currentUserRoleName = strtolower($user->role->name);

        foreach ($allowedRoles as $allowedRole) {
            if ($currentUserRoleName === strtolower($allowedRole)) {
                return $next($request);
            }
        }
        return redirect()->route('welcome')->with('error', 'Akses ditolak. Anda tidak memiliki izin yang cukup.');
    }
}
