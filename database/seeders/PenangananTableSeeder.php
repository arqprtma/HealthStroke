<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenangananTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $videoGenggamBolaKaki = 'https://drive.google.com/drive/folders/1VrUyNNY9gD_1JSn4LfTVSukUHsTcF3FZ';
        $videoSenamHipertensi = 'https://drive.google.com/drive/folders/1VrUyNNY9gD_1JSn4LfTVSukUHsTcF3FZ';

        // Data acuan: Panduan Penanganan Komplikasi Stroke.
        // id_pemicu tidak dibedakan pada dokumen acuan, sehingga setiap item
        // digandakan untuk seluruh pemicu agar tetap muncul untuk pasien
        // dengan kombinasi pemicu apa pun.
        $data = [
            'Kelumpuhan' => [
                'Rehabilitasi' => [
                    ['deskripsi' => 'Latihan kekuatan tangan dengan memegang atau meremas bola atau malam.', 'video' => ''],
                    ['deskripsi' => 'Latihan kekuatan kaki dengan mengangkat kaki saat duduk di kursi.', 'video' => $videoGenggamBolaKaki],
                    ['deskripsi' => 'Latihan keseimbangan dengan latihan berdiri.', 'video' => ''],
                    ['deskripsi' => 'Latihan berjalan apabila pasien sudah mampu berjalan, diawali dengan 3 langkah.', 'video' => ''],
                ],
                'Olahraga' => [
                    ['deskripsi' => 'Latihan pernapasan: tarik napas melalui hidung, tahan selama 4 hitungan, lalu keluarkan perlahan melalui mulut. Ulangi 5 kali atau sesuai kemampuan.', 'video' => ''],
                    ['deskripsi' => 'Jalan kaki di luar rumah pukul 07.30–08.00 selama 10–30 menit untuk menghirup udara pagi dan mendapatkan paparan sinar matahari.', 'video' => ''],
                    ['deskripsi' => 'Senam Hipertensi.', 'video' => $videoSenamHipertensi],
                ],
                'Terapi' => [
                    ['deskripsi' => 'Minum obat secara teratur sesuai aturan.', 'video' => ''],
                    ['deskripsi' => 'Bila menderita hipertensi, minum obat darah tinggi secara rutin.', 'video' => ''],
                    ['deskripsi' => 'Minum vitamin yang diberikan tenaga kesehatan.', 'video' => ''],
                    ['deskripsi' => 'Kontrol tekanan darah secara berkala dengan target sistolik 130–145 mmHg dan diastolik 70–90 mmHg.', 'video' => ''],
                ],
                'Perawatan' => [
                    ['deskripsi' => 'Kontrol ke rumah sakit atau fasilitas kesehatan setiap bulan.', 'video' => ''],
                    ['deskripsi' => 'Ikuti program rehabilitasi sesuai anjuran tenaga kesehatan.', 'video' => ''],
                ],
            ],
            'Kesulitan Menelan' => [
                'Rehabilitasi' => [
                    ['deskripsi' => 'Pijat otot-otot leher.', 'video' => ''],
                    ['deskripsi' => 'Konsumsi makanan yang lembut dan gunakan minuman dengan tekstur yang lebih kental.', 'video' => ''],
                    ['deskripsi' => 'Latihan menggigit makanan selama beberapa detik sebelum menelan.', 'video' => ''],
                ],
            ],
            'Kesulitan Berbicara' => [
                'Rehabilitasi' => [
                    ['deskripsi' => 'Latihan mengucapkan huruf vokal A, I, U, E, O.', 'video' => ''],
                    ['deskripsi' => 'Latihan mengucapkan kata sederhana seperti mama, papa, makan, minum, dan tidur.', 'video' => ''],
                ],
            ],
            'Penglihatan Kabur' => [
                'Rehabilitasi' => [
                    ['deskripsi' => 'Latihan fokus mata: pandang lurus ke depan selama 10 detik, pindahkan fokus ke kiri selama 10 detik, lalu ke kanan selama 10 detik. Ulangi sebanyak 2–3 kali.', 'video' => ''],
                ],
            ],
        ];

        $pemicuIds = DB::table('pemicu')->pluck('id_pemicu', 'nama');
        $komplikasiIds = DB::table('komplikasi')->pluck('id_komplikasi', 'nama');
        $kategoriIds = DB::table('kategori_penanganan')->pluck('id_kat_penanganan', 'nama');

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
                        DB::table('penanganan')->updateOrInsert(
                            [
                                'id_pemicu' => $idPemicu,
                                'id_komplikasi' => $idKomplikasi,
                                'id_kat_penanganan' => $idKategori,
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
