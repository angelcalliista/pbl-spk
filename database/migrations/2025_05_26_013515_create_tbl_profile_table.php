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
        Schema::create('tbl_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alternatif')->constrained('tbl_alternatif');
            $table->foreignId('id_kriteria')->constrained('tbl_kriteria');
            $table->integer('nilai_profile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_profile');
    }
};
