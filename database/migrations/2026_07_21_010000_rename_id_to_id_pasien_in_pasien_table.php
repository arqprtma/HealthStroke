<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Model Pasien mendeklarasikan primaryKey 'id_pasien', tapi kolom
        // aslinya bernama 'id'. Rename ini menyamakan skema dengan yang
        // sudah diasumsikan di seluruh controller/model.
        DB::statement('ALTER TABLE pasien RENAME COLUMN id TO id_pasien');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE pasien RENAME COLUMN id_pasien TO id');
    }
};
