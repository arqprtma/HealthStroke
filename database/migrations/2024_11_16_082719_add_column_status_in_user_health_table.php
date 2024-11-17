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
        Schema::table('user_health', function (Blueprint $table) {
            $table->enum('status', ['kemajuan', 'kemunduran', 'stagnasi'])->nullable()->after('level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_health', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
