<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AktivitasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Data acuan: Panduan Penanganan Komplikasi Stroke (bagian Activity Daily Living / ADL).
        // id_pemicu tidak dibedakan pada dokumen acuan, sehingga setiap item
        // digandakan untuk seluruh pemicu agar tetap muncul untuk pasien
        // dengan kombinasi pemicu apa pun.
        $data = [
            'Kelumpuhan' => [
                'Personal Hygiena' => [
                    ['deskripsi' => 'Sikat gigi menggunakan sikat berbulu lembut, usahakan dilakukan sendiri untuk melatih fungsi tangan.', 'video' => null],
                    ['deskripsi' => 'Mandi dua kali sehari menggunakan air hangat yang telah diberi baby oil dan sabun bayi.', 'video' => null],
                    ['deskripsi' => 'Gunakan pakaian yang menyerap keringat dan sederhana agar mudah dipakai, lalu ganti pakaian pagi dan sore.', 'video' => null],
                ],
                'Makan dan Minum' => [
                    ['deskripsi' => 'Sediakan makanan bertekstur lembut, bila perlu gunakan minuman yang lebih kental.', 'video' => null],
                    ['deskripsi' => 'Minum jus buah tanpa atau dengan sedikit gula.', 'video' => null],
                    ['deskripsi' => 'Konsumsi buah yang mudah dikunyah seperti pepaya dan pisang.', 'video' => null],
                    ['deskripsi' => 'Konsumsi oatmeal karena mudah ditelan.', 'video' => null],
                ],
                'Ambulasi' => [
                    ['deskripsi' => 'Saat tidur, ubah posisi miring kiri dan kanan, hindari posisi terlentang terus-menerus.', 'video' => null],
                    ['deskripsi' => 'Latihan berpindah dari posisi tidur ke duduk.', 'video' => null],
                    ['deskripsi' => 'Latihan menggeser posisi duduk.', 'video' => null],
                    ['deskripsi' => 'Latihan berpindah dari posisi duduk ke tidur.', 'video' => null],
                ],
                'Mobilisasi' => [
                    ['deskripsi' => 'Gunakan tongkat atau alat bantu jalan bila diperlukan, serta sepatu yang ringan dan tidak licin.', 'video' => null],
                    ['deskripsi' => 'Latihan berjalan dari kamar menuju ruang keluarga secara bolak-balik.', 'video' => null],
                    ['deskripsi' => 'Duduk dan berdiri dengan berpegangan pada kursi atau tongkat.', 'video' => null],
                ],
                'Istirahat/Tidur' => [
                    ['deskripsi' => 'Tenangkan pikiran, hindari terlalu banyak berpikir, tarik napas panjang, dan pejamkan mata sebelum tidur.', 'video' => null],
                    ['deskripsi' => 'Berdoa sebelum tidur, yakin bahwa Tuhan bersama kita dan memberikan kekuatan serta kesembuhan, lalu tidur yang cukup.', 'video' => null],
                ],
            ],
            'Kesulitan Menelan' => [
                'Makan dan Minum' => [
                    ['deskripsi' => 'Konsumsi bubur havermut atau bubur nasi.', 'video' => null],
                    ['deskripsi' => 'Konsumsi ati ayam, telur rebus, atau kaldu daging.', 'video' => null],
                    ['deskripsi' => 'Konsumsi sayuran yang dimasak hingga lunak seperti kentang dan wortel tumbuk.', 'video' => null],
                    ['deskripsi' => 'Konsumsi kaldu ayam, kaldu sapi, atau puding lembut.', 'video' => null],
                ],
                'Istirahat/Tidur' => [
                    ['deskripsi' => 'Tidur maksimal pukul 21.00 agar bangun pagi dengan tubuh segar.', 'video' => null],
                ],
            ],
            'Kesulitan Berbicara' => [
                'Makan dan Minum' => [
                    ['deskripsi' => 'Konsumsi telur rebus atau telur orak-arik.', 'video' => null],
                ],
            ],
        ];

        $pemicuIds = DB::table('pemicu')->pluck('id_pemicu', 'nama');
        $komplikasiIds = DB::table('komplikasi')->pluck('id_komplikasi', 'nama');
        $kategoriIds = DB::table('kategori_aktivitas')->pluck('id_kat_aktivitas', 'nama');

        foreach ($data as $komplikasiNama => $kategoriGroups) {
            $idKomplikasi = $komplikasiIds[$komplikasiNama] ?? null;
            if (! $idKomplikasi) {
                continue;
            }

            foreach ($kategoriGroups as $kategoriNama => $items) {
                $idKategori = $kategoriIds[$kategoriNama] ?? null;
                if (! $idKategori) {
                    continue;
                }

                foreach ($items as $item) {
                    foreach ($pemicuIds as $idPemicu) {
                        DB::table('aktivitas')->updateOrInsert(
                            [
                                'id_pemicu' => $idPemicu,
                                'id_komplikasi' => $idKomplikasi,
                                'id_kat_aktivitas' => $idKategori,
                                'deskripsi' => $item['deskripsi'],
                            ],
                            [
                                'video' => $item['video'],
                                'created_at' => $now,
                                'updated_at' => $now,
                            ]
                        );
                    }
                }
            }
        }
    }
}
