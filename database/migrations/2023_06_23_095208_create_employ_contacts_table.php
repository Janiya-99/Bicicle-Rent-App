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
        Schema::create('employ_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employ_id');
            $table->string('contact_number');
            $table->foreign('employ_id')
                ->references('emp_id')
                ->on('employs')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employ_contacts');
    }
};
