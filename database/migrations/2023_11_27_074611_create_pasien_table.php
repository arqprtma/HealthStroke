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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_user');
            // Menambahkan foreign key constraint
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('nama', 100);
            $table->enum('gender', ['L', 'P'])->default('L');
            $table->integer('umur');
            $table->text('pemicu');
            $table->text('komplikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
