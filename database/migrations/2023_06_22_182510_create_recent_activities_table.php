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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('path_id');
            $table->unsignedBigInteger('station_id');
            $table->unsignedBigInteger('bicycle_id');
            $table->unsignedBigInteger('payment_type_id')->default(1);
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('path_id')
                ->references('path_id')
                ->on('paths')
                ->onDelete('cascade');
            $table->foreign('station_id')
                ->references('station_id')
                ->on('stations')
                ->onDelete('cascade');
            $table->foreign('bicycle_id')
                ->references('bicycle_id')
                ->on('bicycles')
                ->onDelete('cascade');
            $table->foreign('payment_type_id')
                ->references('payment_id')
                ->on('payment_types')
                ->onDelete('cascade');
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
