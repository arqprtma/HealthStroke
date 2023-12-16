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
        Schema::create('treatment', function (Blueprint $table) {
            $table->id('id_treatment');
            $table->unsignedBigInteger('id_aktivitas');
            // Menambahkan foreign key constraint
            $table->foreign('id_aktivitas')->references('id_aktivitas')->on('aktivitas');
            $table->unsignedBigInteger('id_penanganan');
            // Menambahkan foreign key constraint
            $table->foreign('id_penanganan')->references('id_penanganan')->on('penanganan');
            $table->unsignedBigInteger('id_pasien');
            // Menambahkan foreign key constraint
            $table->foreign('id_pasien')->references('id')->on('pasien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatment');
    }
};
