<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Current timestamp
        $now = Carbon::now();

        // Contoh data pengguna
        $users = [
            [
                'id_user' => 1,
                'nama' => 'Agung Dwi Sahputra',
                'email' => 'agungdwisahputra@gmail.com',
                'gender' => 'L',
                'umur' => 21,
                'username' => 'agung.ds20',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            // Tambahkan data pengguna lain sesuai kebutuhan
            [
                'id_user' => 2,
                'nama' => 'Ariq Pratama',
                'email' => 'ariqp63@gmail.com',
                'gender' => 'L',
                'umur' => 22,
                'username' => 'ariq.p63',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Masukkan data ke dalam tabel users
        DB::table('users')->insert($users);
    }
}
