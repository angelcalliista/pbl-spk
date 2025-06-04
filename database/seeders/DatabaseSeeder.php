<?php

namespace Database\Seeders;

// use App\Models\Alternatif; // Tidak perlu jika tidak digunakan langsung di sini
// use App\Models\Aspek;    // Tidak perlu jika tidak digunakan langsung di sini
// use App\Models\User;     // Tidak perlu jika tidak digunakan langsung di sini
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema; // <-- TAMBAHKAN INI
use Illuminate\Support\Facades\DB;     // <-- TAMBAHKAN INI

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Nonaktifkan Pengecekan Foreign Key
        Schema::disableForeignKeyConstraints();

        // 2. Truncate Tabel dalam Urutan yang Benar
        // (Tabel yang memiliki foreign key ke tabel lain di-truncate lebih dulu)
        DB::table('profile')->truncate();      // Tabel 'profile' memiliki FK ke 'alternatifs' dan 'kriteria'
        // Jika ada tabel lain yang memiliki FK ke 'roles', 'alternatifs', 'aspek', 'kriteria', truncate di sini juga
        // Contoh: DB::table('tabel_lain_child')->truncate();

        // Baru truncate tabel parent
        DB::table('alternatifs')->truncate();
        DB::table('kriteria')->truncate();     // Asumsikan 'profile' juga punya FK ke 'kriteria'
        DB::table('aspek')->truncate();
        DB::table('role')->truncate();
        // DB::table('users')->truncate(); // Jika ada tabel users dan relasinya

        // 3. Panggil Seeder Anda
        // Urutan pemanggilan seeder di sini menjadi kurang krusial untuk truncate,
        // karena truncate sudah dilakukan di atas.
        // Tapi tetap baik untuk menjaga urutan logis (parent dulu baru child jika seeder melakukan insert).
        $this->call([
            RoleSeeder::class,
            UserSeeder::class, // Jika ada dan RoleSeeder membuat roles yang dibutuhkan UserSeeder
            AlternatifSeeder::class,
            AspekSeeder::class,
            KriteriaSeeder::class,  // Pastikan Kriteria ada sebelum Profile yang merujuknya
            ProfileSeeder::class,
            // RoleSeeder::class, // Anda memanggil RoleSeeder dua kali, cukup sekali di awal
        ]);

        // 4. Aktifkan Kembali Pengecekan Foreign Key
        Schema::enableForeignKeyConstraints();
    }
}
