<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class AspekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama agar tidak duplikat
        DB::table('aspek')->truncate();

        // Data yang akan diinsert
        $data = [
            [
                'id' => 1,
                'kode' => 'A1',
                'nama' => 'Hard Skill',
                'persentase' => 40,
                'created_at' => '2025-06-02 04:51:10',
                'updated_at' => '2025-06-02 04:51:10',
            ],
            [
                'id' => 2,
                'kode' => 'A2',
                'nama' => 'Soft Skill',
                'persentase' => 60,
                'created_at' => '2025-06-02 04:51:55',
                'updated_at' => '2025-06-02 04:51:55',
            ],
        ];

        // Insert data ke tabel aspek
        DB::table('aspek')->insert($data);
    }
}
