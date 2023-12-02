<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomplikasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Current timestamp
        $now = Carbon::now();

        $komplikasi = [
            [
                'nama' => 'Kelumpuhan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Kesulitan Menelan',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Kesulitan Berbicara',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Penglihatan Kabur',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama' => 'Kesulitan BAB',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Insert data into the 'komplikasi' table
        DB::table('komplikasi')->insert($komplikasi);
    }
}
