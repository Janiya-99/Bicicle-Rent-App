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
        Schema::create('recent_activities', function (Blueprint $table) {
            $table->id('activity_id');
            $table->unsignedBigInteger('weather_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('path_id')->default(1);
            $table->unsignedBigInteger('station_id');
            $table->unsignedBigInteger('bicycle_id');
            $table->unsignedBigInteger('paymet_type_id')->default(1);
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users');
            $table->foreign('weather_id')
                ->references('id')
                ->on('weather');
            $table->foreign('path_id')
                ->references('path_id')
                ->on('paths');
            $table->foreign('station_id')
                ->references('station_id')
                ->on('stations');
            $table->foreign('bicycle_id')
                ->references('bicycle_id')
                ->on('bicycles');
            $table->foreign('paymet_type_id')
                ->references('payment_id')
                ->on('payment_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recent_activities');
    }
};
