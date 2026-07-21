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
        // Kolom id_user & id_treatment tidak pernah dipakai oleh model/controller
        // manapun. Yang benar-benar dipakai (Log_treatment::$fillable, dashboard,
        // add_log_aktivitas, add_log_penanganan) adalah id_pasien, id_penanganan,
        // dan id_aktivitas — yang belum pernah ada di tabel ini.
        Schema::table('log_treatment', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_treatment']);
            $table->dropColumn(['id_user', 'id_treatment']);
        });

        Schema::table('log_treatment', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pasien')->after('id_log_treatment');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien');

            $table->unsignedBigInteger('id_penanganan')->nullable()->after('id_pasien');
            $table->foreign('id_penanganan')->references('id_penanganan')->on('penanganan');

            $table->unsignedBigInteger('id_aktivitas')->nullable()->after('id_penanganan');
            $table->foreign('id_aktivitas')->references('id_aktivitas')->on('aktivitas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('log_treatment', function (Blueprint $table) {
            $table->dropForeign(['id_pasien']);
            $table->dropForeign(['id_penanganan']);
            $table->dropForeign(['id_aktivitas']);
            $table->dropColumn(['id_pasien', 'id_penanganan', 'id_aktivitas']);
        });

        Schema::table('log_treatment', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->after('id_log_treatment');
            $table->foreign('id_user')->references('id')->on('users');

            $table->unsignedBigInteger('id_treatment')->after('id_user');
            $table->foreign('id_treatment')->references('id_treatment')->on('treatment');
        });
    }
};
