<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemicuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Current timestamp
        $now = Carbon::now();

        $pemicus = [
            [
                'nama' => 'Hipertensi',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Cardio Vascular',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Diabetes Melitus',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Insert data into the 'pemicu' table
        DB::table('pemicu')->insert($pemicus);
    }
}
