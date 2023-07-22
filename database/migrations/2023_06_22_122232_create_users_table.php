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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_of_birth')->nullable();
            $table->string('nic')->nullable();
            $table->string('licence_id')->nullable();
            $table->string('blood_group')->nullable();
            $table->date('license_issue_date')->nullable();
            $table->date('license_expire_date')->nullable();
            $table->integer('points')->nullable();
            $table->foreign('status_id')
                ->references('status_id')
                ->on('user_statuses')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
