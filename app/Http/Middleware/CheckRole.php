<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log; // Untuk debugging jika perlu

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
        // 1. Pastikan user sudah login
        if (!Auth::check()) {
            // Redirect ke halaman login jika belum login
            // Pastikan Anda punya route dengan nama 'login'
            return redirect()->route('login');
        }

        $user = Auth::user();

        // 2. Pastikan user memiliki relasi 'role' dan role tersebut tidak null
        // Ini penting! Jika user tidak punya id_role atau id_role-nya tidak valid,
        // $user->role akan null.
        if (!$user->role) {
            // Log error ini untuk membantu debugging jika terjadi
            Log::warning("User ID {$user->id} ({$user->email}) tidak memiliki role yang valid atau relasi 'role' bermasalah.");

            // Anda bisa mengarahkan ke halaman tertentu atau menampilkan error
            // abort(403, 'Akses Ditolak: Role pengguna tidak terdefinisi.');
            return redirect('/dashboard')->with('error', 'Akses ditolak: Role Anda tidak terdefinisi.');
        }

        // 3. Dapatkan nama role user saat ini (ubah ke huruf kecil untuk konsistensi)
        $currentUserRoleName = strtolower($user->role->name);

        // 4. Cek apakah nama role user ada di dalam daftar $allowedRoles
        foreach ($allowedRoles as $allowedRole) {
            if ($currentUserRoleName === strtolower($allowedRole)) {
                return $next($request); // User memiliki role yang diizinkan, lanjutkan request
            }
        }

        // 5. Jika user tidak memiliki role yang diizinkan
        // abort(403, 'Akses Ditolak. Anda tidak memiliki izin yang cukup.');
        return redirect('/dashboard')->with('error', 'Akses ditolak. Anda tidak memiliki izin yang cukup.');
        // Untuk API, Anda mungkin ingin:
        // return response()->json(['message' => 'Unauthorized. Insufficient permissions.'], 403);
    }
}
