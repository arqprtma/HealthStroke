<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriAktivitasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Current timestamp
        $now = Carbon::now();

        $kategoriAktivitas = [
            [
                'nama' => 'Personal Hygiena',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Makan dan Minum',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Ambulasi',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Mobilisasi',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Istirahat/Tidur',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Insert atau update data di tabel 'kategori_aktivitas' (aman dijalankan berulang kali)
        foreach ($kategoriAktivitas as $item) {
            DB::table('kategori_aktivitas')->updateOrInsert(['nama' => $item['nama']], $item);
        }
    }
}
