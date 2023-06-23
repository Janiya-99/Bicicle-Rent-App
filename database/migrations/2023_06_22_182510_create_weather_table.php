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
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('activity_id');
            $table->decimal('wind_speed', 8, 2);
            $table->decimal('temperature', 5, 2);
            $table->integer('visibility');
            $table->decimal('humidity', 5, 2);
            $table->string('weather_status');
            // $table->foreign('activity_id')
            //     ->references('activity_id')
            //     ->on('recent_activities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};
