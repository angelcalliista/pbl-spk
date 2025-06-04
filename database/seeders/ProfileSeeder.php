<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama agar tidak duplikat
        DB::table('profile')->truncate();

        // Data yang akan diinsert
        $data = [
            ['id' => 1, 'id_alternatif' => 5, 'id_kriteria' => 1, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 2, 'id_alternatif' => 5, 'id_kriteria' => 2, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 3, 'id_alternatif' => 5, 'id_kriteria' => 3, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 4, 'id_alternatif' => 5, 'id_kriteria' => 4, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 5, 'id_alternatif' => 5, 'id_kriteria' => 5, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 6, 'id_alternatif' => 5, 'id_kriteria' => 6, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 7, 'id_alternatif' => 6, 'id_kriteria' => 1, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 8, 'id_alternatif' => 6, 'id_kriteria' => 2, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 9, 'id_alternatif' => 6, 'id_kriteria' => 3, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 10, 'id_alternatif' => 6, 'id_kriteria' => 4, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 11, 'id_alternatif' => 6, 'id_kriteria' => 5, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 12, 'id_alternatif' => 6, 'id_kriteria' => 6, 'nilai_profile' => 1, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 13, 'id_alternatif' => 7, 'id_kriteria' => 1, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 14, 'id_alternatif' => 7, 'id_kriteria' => 2, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 15, 'id_alternatif' => 7, 'id_kriteria' => 3, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 16, 'id_alternatif' => 7, 'id_kriteria' => 4, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 17, 'id_alternatif' => 7, 'id_kriteria' => 5, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 18, 'id_alternatif' => 7, 'id_kriteria' => 6, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 19, 'id_alternatif' => 3, 'id_kriteria' => 1, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 20, 'id_alternatif' => 3, 'id_kriteria' => 2, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 21, 'id_alternatif' => 3, 'id_kriteria' => 3, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 22, 'id_alternatif' => 3, 'id_kriteria' => 4, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 23, 'id_alternatif' => 3, 'id_kriteria' => 5, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 24, 'id_alternatif' => 3, 'id_kriteria' => 6, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 25, 'id_alternatif' => 4, 'id_kriteria' => 1, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 26, 'id_alternatif' => 4, 'id_kriteria' => 2, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:28', 'updated_at' => '2025-06-02 05:22:28'],
            ['id' => 27, 'id_alternatif' => 4, 'id_kriteria' => 3, 'nilai_profile' => 2, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 28, 'id_alternatif' => 4, 'id_kriteria' => 4, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 29, 'id_alternatif' => 4, 'id_kriteria' => 5, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 30, 'id_alternatif' => 4, 'id_kriteria' => 6, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 31, 'id_alternatif' => 1, 'id_kriteria' => 1, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 32, 'id_alternatif' => 1, 'id_kriteria' => 2, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 33, 'id_alternatif' => 1, 'id_kriteria' => 3, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 34, 'id_alternatif' => 1, 'id_kriteria' => 4, 'nilai_profile' => 5, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 35, 'id_alternatif' => 1, 'id_kriteria' => 5, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 36, 'id_alternatif' => 1, 'id_kriteria' => 6, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 37, 'id_alternatif' => 2, 'id_kriteria' => 1, 'nilai_profile' => 5, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 38, 'id_alternatif' => 2, 'id_kriteria' => 2, 'nilai_profile' => 2, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 39, 'id_alternatif' => 2, 'id_kriteria' => 3, 'nilai_profile' => 5, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 40, 'id_alternatif' => 2, 'id_kriteria' => 4, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 41, 'id_alternatif' => 2, 'id_kriteria' => 5, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 42, 'id_alternatif' => 2, 'id_kriteria' => 6, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:22:29', 'updated_at' => '2025-06-02 05:22:29'],
            ['id' => 43, 'id_alternatif' => 5, 'id_kriteria' => 7, 'nilai_profile' => 5, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 44, 'id_alternatif' => 5, 'id_kriteria' => 8, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 45, 'id_alternatif' => 5, 'id_kriteria' => 9, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 46, 'id_alternatif' => 5, 'id_kriteria' => 10, 'nilai_profile' => 5, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 47, 'id_alternatif' => 5, 'id_kriteria' => 11, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 48, 'id_alternatif' => 5, 'id_kriteria' => 12, 'nilai_profile' => 5, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 49, 'id_alternatif' => 5, 'id_kriteria' => 13, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 50, 'id_alternatif' => 6, 'id_kriteria' => 7, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 51, 'id_alternatif' => 1, 'id_kriteria' => 12, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 52, 'id_alternatif' => 2, 'id_kriteria' => 13, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 53, 'id_alternatif' => 3, 'id_kriteria' => 1, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 54, 'id_alternatif' => 4, 'id_kriteria' => 2, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 55, 'id_alternatif' => 5, 'id_kriteria' => 3, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 56, 'id_alternatif' => 1, 'id_kriteria' => 4, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 57, 'id_alternatif' => 2, 'id_kriteria' => 5, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 58, 'id_alternatif' => 3, 'id_kriteria' => 6, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 59, 'id_alternatif' => 4, 'id_kriteria' => 7, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 60, 'id_alternatif' => 5, 'id_kriteria' => 8, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 61, 'id_alternatif' => 1, 'id_kriteria' => 9, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 62, 'id_alternatif' => 2, 'id_kriteria' => 10, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 63, 'id_alternatif' => 3, 'id_kriteria' => 11, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 64, 'id_alternatif' => 4, 'id_kriteria' => 12, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 65, 'id_alternatif' => 5, 'id_kriteria' => 13, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 66, 'id_alternatif' => 1, 'id_kriteria' => 1, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 67, 'id_alternatif' => 2, 'id_kriteria' => 2, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 68, 'id_alternatif' => 3, 'id_kriteria' => 3, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 69, 'id_alternatif' => 4, 'id_kriteria' => 4, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 70, 'id_alternatif' => 5, 'id_kriteria' => 5, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 71, 'id_alternatif' => 1, 'id_kriteria' => 6, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 72, 'id_alternatif' => 2, 'id_kriteria' => 7, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 73, 'id_alternatif' => 3, 'id_kriteria' => 8, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 74, 'id_alternatif' => 4, 'id_kriteria' => 9, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 75, 'id_alternatif' => 4, 'id_kriteria' => 10, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:28:09', 'updated_at' => '2025-06-02 05:28:09'],
            ['id' => 76, 'id_alternatif' => 4, 'id_kriteria' => 12, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 77, 'id_alternatif' => 4, 'id_kriteria' => 13, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 78, 'id_alternatif' => 1, 'id_kriteria' => 7, 'nilai_profile' => 5, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 79, 'id_alternatif' => 1, 'id_kriteria' => 8, 'nilai_profile' => 3, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 80, 'id_alternatif' => 1, 'id_kriteria' => 9, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 81, 'id_alternatif' => 1, 'id_kriteria' => 10, 'nilai_profile' => 5, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 82, 'id_alternatif' => 1, 'id_kriteria' => 11, 'nilai_profile' => 5, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 83, 'id_alternatif' => 1, 'id_kriteria' => 12, 'nilai_profile' => 5, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 84, 'id_alternatif' => 1, 'id_kriteria' => 13, 'nilai_profile' => 5, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 85, 'id_alternatif' => 2, 'id_kriteria' => 7, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 86, 'id_alternatif' => 2, 'id_kriteria' => 8, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 87, 'id_alternatif' => 2, 'id_kriteria' => 9, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 88, 'id_alternatif' => 2, 'id_kriteria' => 10, 'nilai_profile' => 5, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 89, 'id_alternatif' => 2, 'id_kriteria' => 11, 'nilai_profile' => 5, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 90, 'id_alternatif' => 2, 'id_kriteria' => 12, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10'],
            ['id' => 91, 'id_alternatif' => 2, 'id_kriteria' => 13, 'nilai_profile' => 4, 'created_at' => '2025-06-02 05:28:10', 'updated_at' => '2025-06-02 05:28:10']
        ];

        // Insert data ke tabel
        DB::table('profile')->insert($data);
    }
}
