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
        Schema::create('paths', function (Blueprint $table) {
            $table->id('path_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bicycle_id');
            $table->decimal('start_long', 9, 6);
            $table->decimal('start_lang', 9, 6);
            $table->decimal('end_long', 9, 6)->nullable();
            $table->decimal('end_lang', 9, 6)->nullable();
            $table->string('start_location');
            $table->string('end_location')->nullable();
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('bicycle_id')
                ->references('bicycle_id')
                ->on('bicycles')
                ->onDelete('cascade');
            $table->float('distance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paths');
    }
};
