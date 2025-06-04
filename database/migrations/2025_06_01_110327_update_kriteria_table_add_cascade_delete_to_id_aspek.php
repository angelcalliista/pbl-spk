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
        Schema::table('kriteria', function (Blueprint $table) {
            // 1. Hapus foreign key yang lama dulu
            // Nama constraint default biasanya: nama_tabel_nama_kolom_foreign
            // Jadi, kemungkinan 'kriteria_id_aspek_foreign'
            // Jika kamu menamakannya secara custom, sesuaikan.
            // Laravel 9+ bisa langsung drop berdasarkan kolom:
            $table->dropForeign(['id_aspek']);
            // Atau pakai nama constraint eksplisit:
            // $table->dropForeign('kriteria_id_aspek_foreign');

            // 2. Tambahkan foreign key baru dengan ON DELETE CASCADE
            $table->foreign('id_aspek')
                  ->references('id')
                  ->on('aspek')
                  ->onDelete('cascade'); // Ini bagian pentingnya
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kriteria', function (Blueprint $table) {
            $table->dropForeign(['id_aspek']);

            $table->foreign('id_aspek')
                  ->references('id')
                  ->on('aspek');

        });
    }
};
