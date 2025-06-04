<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            // 1. Hapus foreign key yang lama dulu
            // Nama constraint default biasanya: nama_tabel_nama_kolom_foreign
            // Berdasarkan error Anda, namanya adalah 'profile_id_kriteria_foreign'
            // Jika Anda menamakannya secara custom, sesuaikan.

            // Untuk Laravel 9+ bisa langsung drop berdasarkan kolom:
            // $table->dropForeign(['id_kriteria']);
            // Atau pakai nama constraint eksplisit (lebih aman jika ada multiple FK di kolom yg sama, walau jarang):
            $table->dropForeign('profile_id_kriteria_foreign');


            // 2. Tambahkan foreign key baru dengan ON DELETE CASCADE
            $table->foreign('id_kriteria')
                  ->references('id')
                  ->on('kriteria') // Merujuk ke tabel 'kriteria'
                  ->onDelete('cascade'); // Ini bagian pentingnya
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->dropForeign(['id_kriteria']);
            $table->foreign('id_kriteria', 'profile_id_kriteria_foreign')
                  ->references('id')
                  ->on('kriteria');
        });
    }
};
