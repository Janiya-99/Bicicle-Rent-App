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
        Schema::create('gps', function (Blueprint $table) {
            $table->id('gps_id');
            $table->unsignedBigInteger('path_id');
            $table->unsignedBigInteger('bicycle_id');
            $table->decimal('gps_points_lang',9 , 6);
            $table->decimal('gps_points_long',9 , 6);
            $table->foreign('path_id')
                ->references('path_id')
                ->on('paths')
                ->onDelete('cascade');
            $table->foreign('bicycle_id')
                ->references('bicycle_id')
                ->on('bicycles')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gps');
    }
};
