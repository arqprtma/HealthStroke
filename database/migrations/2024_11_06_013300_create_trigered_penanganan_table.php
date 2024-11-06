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
        Schema::create('trigered_penanganan', function (Blueprint $table) {
            $table->id('id_trigered_penanganan');
            $table->unsignedBigInteger('id_penanganan');
            $table->integer('jumlah');
            $table->text('konten');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->index('id_penanganan', 'id_penanganan_foreign', 'btree');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigered_penanganan');
    }
};
