<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameJumahToLevelOnTrigeredAktivitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trigered_aktivitas', function (Blueprint $table) {
            $table->renameColumn('jumlah', 'level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trigered_aktivitas', function (Blueprint $table) {
            $table->renameColumn('level', 'jumlah');
        });
    }
}
