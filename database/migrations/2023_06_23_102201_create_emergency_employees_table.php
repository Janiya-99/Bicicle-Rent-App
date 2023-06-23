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
        Schema::create('emergency_employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emergency_id');
            $table->unsignedBigInteger('emp_id');
            $table->foreign('emergency_id')
                ->references('emergency_id')
                ->on('emergencies');
            $table->foreign('emp_id')
                ->references('emp_id')
                ->on('employs');
            $table->timestamps();
        });
    }

    /**095124
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_employees');
    }
};
