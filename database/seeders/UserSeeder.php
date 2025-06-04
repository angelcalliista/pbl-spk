<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Untuk hashing password
use App\Models\User; // Opsional, jika Anda ingin menggunakan Eloquent
use App\Models\Role; // Opsional, untuk mencari ID role secara dinamis

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data user lama jika perlu (opsional, tergantung kebutuhan)
        // User::truncate(); // Jika menggunakan Eloquent dan ingin menghapus semua user
        // DB::table('users')->truncate(); // Jika menggunakan Query Builder

        // Cari ID role 'admin' secara dinamis (lebih baik daripada hardcode ID)
        $adminRole = Role::where('name', 'admin')->first(); // Asumsi nama role adalah 'admin'

        if (!$adminRole) {
            $this->command->error("Role 'admin' tidak ditemukan. Pastikan RoleSeeder sudah dijalankan dan role 'admin' ada.");
            // Anda bisa juga membuat role admin di sini jika tidak ada,
            // tapi lebih baik dipisahkan di RoleSeeder.
            // $adminRole = Role::create(['name' => 'admin']);
            return;
        }

        User::create([
            'name' => 'Admin User',
            'id_role' => $adminRole->id, // Menggunakan ID role admin yang ditemukan
            'email' => 'admin@example.com',
            'email_verified_at' => now(), // Verifikasi email langsung
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang aman
            'remember_token' => \Illuminate\Support\Str::random(10),
            // 'created_at' dan 'updated_at' akan diisi otomatis oleh Eloquent
        ]);

        // Jika Anda lebih suka menggunakan DB Facade (Query Builder):
        /*
        DB::table('users')->insert([
            'name' => 'Admin User',
            'id_role' => $adminRole->id, // Atau hardcode ID jika Anda tahu pasti, misal 1
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang aman
            'remember_token' => \Illuminate\Support\Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        */

        // Anda bisa menambahkan user lain di sini jika perlu
        // User::create([...]);
    }
}
