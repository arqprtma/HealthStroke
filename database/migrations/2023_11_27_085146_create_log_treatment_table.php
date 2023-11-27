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
        Schema::create('log_treatment', function (Blueprint $table) {
            $table->id('id_log_treatment');
            $table->unsignedBigInteger('id_user');
            // Menambahkan foreign key constraint
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->unsignedBigInteger('id_treatment');
            // Menambahkan foreign key constraint
            $table->foreign('id_treatment')->references('id_treatment')->on('treatment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_treatment');
    }
};
