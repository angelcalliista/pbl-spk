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

        Schema::create('tbl_kriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_aspek')->constrained('tbl_aspek');
            $table->string('kode', 30);
            $table->string('nama_kriteria', 30);
            $table->integer('nilai');
            $table->enum('factor', ['1', '2']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_kriteria');
    }
};
