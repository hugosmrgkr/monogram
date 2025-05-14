<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('pertanyaan');
            $table->text('jawaban');

            // Ganti foreign key menjadi manual agar cocok dengan kolom `admin_id` di tabel admins
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('admin_id')->on('admins')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
