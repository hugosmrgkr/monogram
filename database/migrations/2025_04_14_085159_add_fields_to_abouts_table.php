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
        Schema::table('abouts', function (Blueprint $table) {
            $table->text('closing_paragraph')->nullable();
            $table->string('weekday_hours')->nullable();
            $table->string('weekend_hours')->nullable();
            $table->json('horizontal_images')->nullable();
            $table->json('gallery_images')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn([
                'closing_paragraph',
                'weekday_hours',
                'weekend_hours',
                'horizontal_images',
                'gallery_images',
            ]);
        });
    }
};
