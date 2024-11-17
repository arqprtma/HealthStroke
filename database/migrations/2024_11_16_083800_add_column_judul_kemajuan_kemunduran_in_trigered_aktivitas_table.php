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
        Schema::table('trigered_aktivitas', function (Blueprint $table) {
            $table->string('judul')->nullable()->after('id_aktivitas');
            $table->text('kemajuan')->nullable()->after('konten');
            $table->text('kemunduran')->nullable()->after('kemajuan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trigered_aktivitas', function (Blueprint $table) {
            $table->dropColumn(['judul', 'kemajuan', 'kemunduran']);
        });
    }
};
