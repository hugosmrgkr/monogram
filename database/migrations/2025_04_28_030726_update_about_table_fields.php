<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            // Menambahkan kolom jika belum ada
            if (!Schema::hasColumn('abouts', 'kontak_wa')) {
                $table->string('kontak_wa')->nullable();    
            }

            if (!Schema::hasColumn('abouts', 'kontak_ig')) {
                $table->string('kontak_ig')->nullable();
            }

            // Mengubah kolom yang sudah ada menjadi nullable
            $table->time('weekday_open')->nullable()->change();
            $table->time('weekday_close')->nullable()->change();
            $table->time('weekend_open')->nullable()->change();
            $table->time('weekend_close')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            // Menghapus kolom yang ditambahkan pada rollback
            $table->dropColumn('kontak_wa');
            $table->dropColumn('kontak_ig');

            // Jika Anda ingin mengembalikan perubahan pada kolom waktu (opsional)
            // $table->time('weekday_open')->nullable(false)->change();
            // $table->time('weekday_close')->nullable(false)->change();
            // $table->time('weekend_open')->nullable(false)->change();
            // $table->time('weekend_close')->nullable(false)->change();
        });
    }
};
