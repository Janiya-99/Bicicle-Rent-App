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
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id('emergency_id');
            $table->unsignedBigInteger('bicycle_id');
            $table->unsignedBigInteger('emergency_status_id');
            $table->decimal('lang', 9, 6);
            $table->decimal('long', 9, 6);
            $table->date('date');
            $table->time('time');
            $table->text('description');
            $table->foreign('bicycle_id')
                ->references('bicycle_id')
                ->on('bicycles')
                ->onDelete('cascade');
            $table->foreign('emergency_status_id')
                ->references('emergency_status_id')
                ->on('emergency_statuses')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergencies');
    }
};
