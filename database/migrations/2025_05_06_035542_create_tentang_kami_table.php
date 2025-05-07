<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('tentang_kami', function (Blueprint $table) {
            $table->id();
            $table->time('jam_buka_hari_biasa')->nullable();
            $table->time('jam_tutup_hari_biasa')->nullable();
            $table->time('jam_buka_akhir_pekan')->nullable();
            $table->time('jam_tutup_akhir_pekan')->nullable();
            $table->string('kontak_wa')->nullable();
            $table->string('kontak_ig')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Membatalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_kami');
    }
};
