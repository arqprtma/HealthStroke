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
        Schema::create('penanganan', function (Blueprint $table) {
            $table->id('id_penanganan');
            $table->unsignedBigInteger('id_pemicu');
            // Menambahkan foreign key constraint
            $table->foreign('id_pemicu')->references('id_pemicu')->on('pemicu');
            $table->unsignedBigInteger('id_komplikasi');
            // Menambahkan foreign key constraint
            $table->foreign('id_komplikasi')->references('id_komplikasi')->on('komplikasi');
            $table->unsignedBigInteger('id_kat_penanganan');
            // Menambahkan foreign key constraint
            $table->foreign('id_kat_penanganan')->references('id_kat_penanganan')->on('kategori_penanganan');
            $table->text('deskripsi');
            $table->text('video');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penanganan');
    }
};
