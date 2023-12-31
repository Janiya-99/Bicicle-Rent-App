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
            $table->unsignedBigInteger('status_id');
            $table->text('qr_code');
            $table->decimal('live_lang', 9, 6);
            $table->decimal('live_long', 9, 6);
            $table->decimal('temp_pin', 5, 2)->nullable();
            $table->decimal('height', 8,2);
            $table->decimal('weight', 8,2);
            $table->string('manufactured');
            $table->foreign('type_id')
                ->references('id')
                ->on('bicycle_types')
                ->onDelete('cascade');
            $table->foreign('station_id')
                ->references('station_id')
                ->on('stations')
                ->onDelete('cascade');
            $table->foreign('status_id')
                ->references('id')
                ->on('bicycle_statuses')
                ->onDelete('cascade');
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
