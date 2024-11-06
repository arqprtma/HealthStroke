<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trigered_aktivitas', function (Blueprint $table) {
            $table->id('id_trigered_aktivitas');
            $table->unsignedBigInteger('id_aktivitas');
            $table->integer('jumlah');
            $table->text('konten');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->index('id_aktivitas', 'id_aktivitas_foreign', 'btree');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigered_aktivitas');
    }
};
