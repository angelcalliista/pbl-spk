<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama agar tidak duplikat
        DB::table('alternatifs')->truncate();

        // Data yang akan diinsert
        $data = [
            [
                'id' => 1,
                'kode' => 'WP1',
                'nama' => 'Naura Fathiya Azzahra',
                'created_at' => '2025-06-02 04:35:48',
                'updated_at' => '2025-06-02 04:35:48',
            ],
            [
                'id' => 2,
                'kode' => 'WP2',
                'nama' => 'Kayla Jovita',
                'created_at' => '2025-06-02 04:36:52',
                'updated_at' => '2025-06-02 04:36:52',
            ],
            [
                'id' => 3,
                'kode' => 'WA1',
                'nama' => 'Raka Ramada',
                'created_at' => '2025-06-02 04:37:10',
                'updated_at' => '2025-06-02 04:37:10',
            ],
            [
                'id' => 4,
                'kode' => 'WA2',
                'nama' => 'Muhammad Reza Arifin',
                'created_at' => '2025-06-02 04:37:33',
                'updated_at' => '2025-06-02 04:37:33',
            ],
            [
                'id' => 5,
                'kode' => 'A1',
                'nama' => 'Jihan Nurul Aisyah',
                'created_at' => '2025-06-02 04:38:00',
                'updated_at' => '2025-06-02 04:38:00',
            ],
            [
                'id' => 6,
                'kode' => 'A2',
                'nama' => 'Muammar Nur Hakim',
                'created_at' => '2025-06-02 04:38:25',
                'updated_at' => '2025-06-02 04:38:25',
            ],
            [
                'id' => 7,
                'kode' => 'MG1',
                'nama' => 'Daniel Rafael Sagala',
                'created_at' => '2025-06-02 04:38:53',
                'updated_at' => '2025-06-02 04:38:53',
            ],
        ];

        // Insert data ke tabel alternatifs
        DB::table('alternatifs')->insert($data);
    }
}
