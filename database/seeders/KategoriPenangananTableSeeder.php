<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriPenangananTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Current timestamp
        $now = Carbon::now();

        $kategoriPenanganan = [
            [
                'nama' => 'Rehabilitasi',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Olahraga',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Terapi',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Perawatan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Insert data into the 'kategori_penanganan' table
        DB::table('kategori_penanganan')->insert($kategoriPenanganan);
    }
}
