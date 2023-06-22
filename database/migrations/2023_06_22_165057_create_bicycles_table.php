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
        Schema::create('bicycles', function (Blueprint $table) {
            $table->id('bicycle_id');
            $table->unsignedBigInteger('type_id')->default(1);
            $table->unsignedBigInteger('station_id');
            $table->string('qr_code');
            $table->string('live_lang');
            $table->string('live_long');
            $table->string('status');
            $table->string('temp_pin');
            $table->foreign('type_id')
                ->references('id')
                ->on('bicycle_types');
            $table->foreign('station_id')
                ->references('station_id')
                ->on('stations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bicycles');
    }
};
