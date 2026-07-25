<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AktivitasTableSeeder extends Seeder
{
    private $now;

    /**
     * Bangun konten HTML edukasi dari bagian-bagian terstruktur.
     * Gambar diambil dari internet (Wikimedia Commons, lisensi bebas) lalu
     * disimpan lokal di public/images/edukasi agar andal & cepat.
     */
    private function blok(array $o): string
    {
        $h = '';
        if (!empty($o['intro'])) {
            $h .= '<p>' . $o['intro'] . '</p>';
        }
        if (!empty($o['img'])) {
            $h .= '<figure><img src="/images/edukasi/' . $o['img'] . '" alt="' . ($o['alt'] ?? '') . '" loading="lazy">';
            $h .= '<figcaption>' . ($o['cap'] ?? 'Ilustrasi. Sumber: Wikimedia Commons') . '</figcaption></figure>';
        }
        if (!empty($o['langkah'])) {
            $h .= '<h4>' . ($o['langkahTitle'] ?? 'Langkah-langkah') . '</h4><ol>';
            foreach ($o['langkah'] as $l) {
                $h .= '<li>' . $l . '</li>';
            }
            $h .= '</ol>';
        }
        if (!empty($o['tips'])) {
            $h .= '<h4>Tips &amp; Perhatian</h4><ul>';
            foreach ($o['tips'] as $t) {
                $h .= '<li>' . $t . '</li>';
            }
            $h .= '</ul>';
        }
        if (!empty($o['catatan'])) {
            $h .= '<div class="catatan">' . $o['catatan'] . '</div>';
        }
        return $h;
    }

    public function run(): void
    {
        $this->now = Carbon::now();

        $data = [
            'Kelumpuhan' => [
                'Personal Hygiena' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Menjaga kebersihan gigi dan mulut. Usahakan pasien melakukannya sendiri untuk sekaligus melatih fungsi tangan.',
                            'img' => 'sikat-gigi.jpg', 'alt' => 'Menyikat gigi',
                            'langkah' => [
                                'Gunakan sikat gigi berbulu lembut.',
                                'Bantu pasien memegang sikat bila tangannya masih lemah.',
                                'Sikat gigi perlahan dua kali sehari, pagi dan malam.',
                            ],
                            'tips' => ['Melakukan sendiri melatih koordinasi dan kekuatan tangan pasien.'],
                        ]),
                        'video' => null,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Memandikan pasien untuk menjaga kebersihan dan kenyamanan tubuh.',
                            'langkah' => [
                                'Mandikan dua kali sehari menggunakan air hangat.',
                                'Tambahkan baby oil dan gunakan sabun bayi yang lembut di kulit.',
                                'Keringkan tubuh dengan handuk lembut, terutama lipatan kulit.',
                            ],
                            'tips' => ['Air hangat membantu melancarkan peredaran darah dan merilekskan otot.'],
                        ]),
                        'video' => null,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Memilih dan mengatur pakaian yang nyaman serta mudah dipakai bagi pasien.',
                            'langkah' => [
                                'Gunakan pakaian yang menyerap keringat.',
                                'Pilih pakaian sederhana yang mudah dipakai dan dilepas.',
                                'Ganti pakaian pagi dan sore hari.',
                            ],
                        ]),
                        'video' => null,
                    ],
                ],
                'Makan dan Minum' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Sediakan makanan yang mudah dikunyah dan ditelan untuk mencegah tersedak.',
                            'img' => 'oatmeal.jpg', 'alt' => 'Makanan bertekstur lembut',
                            'langkah' => [
                                'Sajikan makanan bertekstur lembut.',
                                'Bila perlu, gunakan minuman yang lebih kental agar lebih aman ditelan.',
                            ],
                            'tips' => ['Pastikan pasien duduk tegak saat makan dan minum.'],
                        ]),
                        'video' => null,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Berikan jus buah sebagai sumber vitamin yang mudah dikonsumsi.',
                            'langkah' => [
                                'Buat jus buah tanpa gula atau dengan sedikit gula saja.',
                                'Sajikan dalam suhu ruang, tidak terlalu dingin.',
                            ],
                        ]),
                        'video' => null,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Berikan buah yang mudah dikunyah dan lembut teksturnya.',
                            'img' => 'pisang.jpg', 'alt' => 'Buah pisang dan pepaya',
                            'langkah' => [
                                'Pilih buah seperti pepaya dan pisang.',
                                'Potong kecil-kecil agar mudah dikunyah.',
                            ],
                        ]),
                        'video' => null,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Oatmeal merupakan pilihan makanan yang bergizi dan mudah ditelan.',
                            'img' => 'oatmeal.jpg', 'alt' => 'Oatmeal',
                            'langkah' => [
                                'Masak oatmeal hingga lembut.',
                                'Sajikan hangat, bisa ditambah potongan buah lunak.',
                            ],
                        ]),
                        'video' => null,
                    ],
                ],
                'Ambulasi' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Mengatur posisi tidur pasien untuk mencegah luka tekan (dekubitus) dan menjaga kenyamanan.',
                            'langkah' => [
                                'Saat tidur, ubah posisi miring ke kiri dan ke kanan secara bergantian.',
                                'Ubah posisi setiap 2 jam sekali.',
                                'Hindari posisi terlentang terus-menerus.',
                            ],
                            'catatan' => 'Perubahan posisi berkala penting untuk mencegah luka pada kulit akibat tekanan.',
                        ]),
                        'video' => null,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Melatih pasien berpindah dari posisi berbaring ke posisi duduk.',
                            'langkah' => [
                                'Miringkan tubuh pasien ke satu sisi.',
                                'Bantu menurunkan kaki ke tepi tempat tidur.',
                                'Dorong tubuh perlahan ke posisi duduk sambil ditopang.',
                            ],
                            'tips' => ['Lakukan perlahan untuk menghindari pusing akibat perubahan posisi mendadak.'],
                        ]),
                        'video' => null,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Melatih pasien menggeser dan mengatur posisi duduk agar lebih mandiri.',
                            'langkah' => [
                                'Pastikan pasien duduk dengan tumpuan yang aman.',
                                'Latih menggeser posisi duduk sedikit demi sedikit.',
                            ],
                        ]),
                        'video' => null,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Melatih pasien berpindah dari posisi duduk kembali ke posisi berbaring.',
                            'langkah' => [
                                'Bantu pasien menurunkan tubuh ke sisi tempat tidur.',
                                'Angkat kaki naik ke tempat tidur.',
                                'Atur posisi berbaring yang nyaman.',
                            ],
                        ]),
                        'video' => null,
                    ],
                ],
                'Mobilisasi' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Menggunakan alat bantu dan alas kaki yang tepat untuk mendukung pasien bergerak dengan aman.',
                            'img' => 'tongkat-jalan.jpg', 'alt' => 'Tongkat alat bantu jalan',
                            'langkah' => [
                                'Gunakan tongkat atau alat bantu jalan bila diperlukan.',
                                'Kenakan sepatu yang ringan dan tidak licin.',
                            ],
                            'tips' => ['Alat bantu dan alas kaki yang tepat mengurangi risiko jatuh.'],
                        ]),
                        'video' => null,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Melatih kemampuan berjalan pasien di dalam rumah secara bertahap.',
                            'langkah' => [
                                'Latih berjalan dari kamar menuju ruang keluarga.',
                                'Lakukan secara bolak-balik sesuai kemampuan.',
                                'Selalu ada pendamping selama latihan.',
                            ],
                        ]),
                        'video' => null,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Melatih pasien duduk dan berdiri secara mandiri dengan bantuan pegangan.',
                            'langkah' => [
                                'Minta pasien duduk dan berdiri dengan berpegangan pada kursi atau tongkat.',
                                'Ulangi beberapa kali sesuai kemampuan.',
                            ],
                        ]),
                        'video' => null,
                    ],
                ],
                'Istirahat/Tidur' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Menenangkan pikiran dan tubuh untuk membantu pasien beristirahat dengan nyenyak.',
                            'img' => 'relaksasi.jpg', 'alt' => 'Relaksasi sebelum tidur',
                            'langkah' => [
                                'Tenangkan pikiran dan hindari terlalu banyak berpikir.',
                                'Tarik napas panjang perlahan.',
                                'Pejamkan mata dan rilekskan tubuh.',
                            ],
                        ]),
                        'video' => null,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Menutup hari dengan doa dan istirahat yang cukup untuk mendukung pemulihan.',
                            'langkah' => [
                                'Berdoa sebelum tidur.',
                                'Usahakan tidur yang cukup setiap malam.',
                            ],
                            'catatan' => 'Yakinlah bahwa Tuhan senantiasa memberikan kekuatan dan kesembuhan.',
                        ]),
                        'video' => null,
                    ],
                ],
            ],
            'Kesulitan Menelan' => [
                'Makan dan Minum' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Makanan bertekstur bubur sangat dianjurkan karena mudah ditelan.',
                            'img' => 'oatmeal.jpg', 'alt' => 'Bubur lembut',
                            'langkah' => [
                                'Sajikan bubur havermut atau bubur nasi yang lembut.',
                                'Suapi perlahan dalam porsi kecil.',
                            ],
                        ]),
                        'video' => null,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Lauk lunak dan berkuah membantu pasien memenuhi kebutuhan gizi tanpa kesulitan menelan.',
                            'langkah' => [
                                'Berikan ati ayam, telur rebus, atau kaldu daging.',
                                'Pastikan tekstur lunak dan potongan kecil.',
                            ],
                        ]),
                        'video' => null,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Sayuran yang dimasak hingga lunak mudah dikunyah dan ditelan.',
                            'langkah' => [
                                'Masak sayuran hingga benar-benar lunak, misalnya kentang dan wortel.',
                                'Tumbuk atau haluskan bila perlu.',
                            ],
                        ]),
                        'video' => null,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Makanan cair dan lembut menjadi pilihan aman bagi pasien dengan kesulitan menelan.',
                            'langkah' => [
                                'Berikan kaldu ayam atau kaldu sapi.',
                                'Puding lembut bisa menjadi variasi yang disukai.',
                            ],
                        ]),
                        'video' => null,
                    ],
                ],
                'Istirahat/Tidur' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Istirahat yang teratur membantu pemulihan tubuh secara menyeluruh.',
                            'langkah' => [
                                'Usahakan pasien tidur maksimal pukul 21.00.',
                                'Bangun pagi dalam kondisi tubuh yang segar.',
                            ],
                        ]),
                        'video' => null,
                    ],
                ],
            ],
            'Kesulitan Berbicara' => [
                'Makan dan Minum' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Telur merupakan sumber protein lunak yang mudah dikonsumsi.',
                            'langkah' => [
                                'Sajikan telur rebus yang lembut.',
                                'Atau buat telur orak-arik sebagai variasi.',
                            ],
                        ]),
                        'video' => null,
                    ],
                ],
            ],
        ];

        $this->simpan('aktivitas', 'id_aktivitas', 'id_kat_aktivitas', 'kategori_aktivitas', $data);
    }

    /**
     * Simpan konten secara idempotent & berbasis posisi: baris yang sudah ada
     * di-update di tempatnya (ID tetap, tidak merusak relasi treatment/log),
     * baris baru dibuat bila belum ada.
     */
    private function simpan(string $table, string $pk, string $katFk, string $katTable, array $data): void
    {
        $pemicuIds = DB::table('pemicu')->pluck('id_pemicu', 'nama');
        $komplikasiIds = DB::table('komplikasi')->pluck('id_komplikasi', 'nama');
        $kategoriIds = DB::table($katTable)->pluck($katFk, 'nama');

        foreach ($data as $komplikasiNama => $kategoriGroups) {
            $idKomplikasi = $komplikasiIds[$komplikasiNama] ?? null;
            if (!$idKomplikasi) {
                continue;
            }
            foreach ($kategoriGroups as $kategoriNama => $items) {
                $idKategori = $kategoriIds[$kategoriNama] ?? null;
                if (!$idKategori) {
                    continue;
                }
                foreach ($pemicuIds as $idPemicu) {
                    $existing = DB::table($table)
                        ->where(['id_pemicu' => $idPemicu, 'id_komplikasi' => $idKomplikasi, $katFk => $idKategori])
                        ->orderBy($pk)->pluck($pk)->values();

                    foreach ($items as $i => $item) {
                        $payload = [
                            'deskripsi' => $item['deskripsi'],
                            'video' => $item['video'] ?? null,
                            'updated_at' => $this->now,
                        ];
                        if (isset($existing[$i])) {
                            DB::table($table)->where($pk, $existing[$i])->update($payload);
                        } else {
                            DB::table($table)->insert(array_merge($payload, [
                                'id_pemicu' => $idPemicu,
                                'id_komplikasi' => $idKomplikasi,
                                $katFk => $idKategori,
                                'created_at' => $this->now,
                            ]));
                        }
                    }
                }
            }
        }
    }
}
