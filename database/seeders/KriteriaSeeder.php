<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                $data = [
                    [
                        'id' => 1,
                        'id_aspek' => 1,
                        'kode' => 'H1',
                        'nama' => 'Manajemen Proyek',
                        'nilai' => 4,
                        'factor' => 1,
                        'created_at' => '2025-06-02 05:00:54',
                        'updated_at' => '2025-06-02 05:00:54',
                    ],
                    [
                        'id' => 2,
                        'id_aspek' => 1,
                        'kode' => 'H2',
                        'nama' => 'Menyusun Program Kerja',
                        'nilai' => 4,
                        'factor' => 2,
                        'created_at' => '2025-06-02 05:04:48',
                        'updated_at' => '2025-06-02 05:05:36',
                    ],
                    [
                        'id' => 3,
                        'id_aspek' => 1,
                        'kode' => 'H3',
                        'nama' => 'Penguasaan Teknologi Digital',
                        'nilai' => 4,
                        'factor' => 2,
                        'created_at' => '2025-06-02 05:05:17',
                        'updated_at' => '2025-06-02 05:05:17',
                    ],
                    [
                        'id' => 4,
                        'id_aspek' => 1,
                        'kode' => 'H4',
                        'nama' => 'Mengelola sumber daya manusia',
                        'nilai' => 4,
                        'factor' => 2,
                        'created_at' => '2025-06-02 05:06:45',
                        'updated_at' => '2025-06-02 05:06:45',
                    ],
                    [
                        'id' => 5,
                        'id_aspek' => 1,
                        'kode' => 'H5',
                        'nama' => 'Manajemen Risiko',
                        'nilai' => 4,
                        'factor' => 1,
                        'created_at' => '2025-06-02 05:07:18',
                        'updated_at' => '2025-06-02 05:07:18',
                    ],
                    [
                        'id' => 6,
                        'id_aspek' => 1,
                        'kode' => 'H6',
                        'nama' => 'Mengembangkan inovasi',
                        'nilai' => 4,
                        'factor' => 1,
                        'created_at' => '2025-06-02 05:08:08',
                        'updated_at' => '2025-06-02 05:08:08',
                    ],
                    [
                        'id' => 7,
                        'id_aspek' => 2,
                        'kode' => 'S1',
                        'nama' => 'Komunikasi efektif',
                        'nilai' => 5,
                        'factor' => 1,
                        'created_at' => '2025-06-02 05:08:43',
                        'updated_at' => '2025-06-02 05:08:43',
                    ],
                    [
                        'id' => 8,
                        'id_aspek' => 2,
                        'kode' => 'S2',
                        'nama' => 'Kemampuan Negosiasi',
                        'nilai' => 4,
                        'factor' => 1,
                        'created_at' => '2025-06-02 05:09:11',
                        'updated_at' => '2025-06-02 05:09:11',
                    ],
                    [
                        'id' => 9,
                        'id_aspek' => 2,
                        'kode' => 'S3',
                        'nama' => 'Kecerdasan Emosional',
                        'nilai' => 5,
                        'factor' => 2,
                        'created_at' => '2025-06-02 05:10:24',
                        'updated_at' => '2025-06-02 05:10:24',
                    ],
                    [
                        'id' => 10,
                        'id_aspek' => 2,
                        'kode' => 'S4',
                        'nama' => 'Manajemen Waktu',
                        'nilai' => 5,
                        'factor' => 2,
                        'created_at' => '2025-06-02 05:11:21',
                        'updated_at' => '2025-06-02 05:11:21',
                    ],
                    [
                        'id' => 11,
                        'id_aspek' => 2,
                        'kode' => 'S5',
                        'nama' => 'Merangkul Anggota Tim',
                        'nilai' => 5,
                        'factor' => 2,
                        'created_at' => '2025-06-02 05:12:26',
                        'updated_at' => '2025-06-02 05:12:26',
                    ],
                    [
                        'id' => 12,
                        'id_aspek' => 2,
                        'kode' => 'S6',
                        'nama' => 'Etika dan Kejujuran',
                        'nilai' => 5,
                        'factor' => 1,
                        'created_at' => '2025-06-02 05:13:12',
                        'updated_at' => '2025-06-02 05:13:12',
                    ],
                    [
                        'id' => 13,
                        'id_aspek' => 2,
                        'kode' => 'S7',
                        'nama' => 'Bisa Beradaptasi',
                        'nilai' => 4,
                        'factor' => 1,
                        'created_at' => '2025-06-02 05:13:50',
                        'updated_at' => '2025-06-02 05:13:50',
                    ],
                ];
                DB::table('kriteria')->insert($data);
    }
}
