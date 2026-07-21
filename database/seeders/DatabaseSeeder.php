<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            PemicuTableSeeder::class,
            KomplikasiTableSeeder::class,
            KategoriAktivitasTableSeeder::class,
            KategoriPenangananTableSeeder::class,
            KategoriArtikelTableSeeder::class,
            AktivitasTableSeeder::class,
            PenangananTableSeeder::class,
        ]);
    }
}
