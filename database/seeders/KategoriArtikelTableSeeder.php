<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriArtikelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Current timestamp
        $now = Carbon::now();

        $kategoriArtikel = [
            [
                'nama' => 'Pemahaman',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Pertolongan Pertama',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Tanda dan Gejala',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Insert data into the 'kategori_artikel' table
        DB::table('kategori_artikel')->insert($kategoriArtikel);
    }
}
