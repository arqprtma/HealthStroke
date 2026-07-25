<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenangananTableSeeder extends Seeder
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
        $drive = 'https://drive.google.com/drive/folders/1VrUyNNY9gD_1JSn4LfTVSukUHsTcF3FZ';

        $data = [
            'Kelumpuhan' => [
                'Rehabilitasi' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Latihan untuk memulihkan kekuatan dan koordinasi otot tangan yang melemah akibat stroke, dengan menggenggam dan meremas bola karet lunak atau malam (playdough).',
                            'img' => 'fisioterapi.jpg', 'alt' => 'Latihan fisioterapi tangan',
                            'langkah' => [
                                'Duduk nyaman, letakkan lengan di atas meja atau paha.',
                                'Genggam bola karet lunak dengan tangan yang lemah.',
                                'Remas bola perlahan, tahan 3&ndash;5 detik, lalu lepaskan.',
                                'Ulangi 10&ndash;15 kali, 2&ndash;3 kali sehari sesuai kemampuan.',
                            ],
                            'tips' => [
                                'Gunakan bola yang tidak terlalu keras agar tidak melukai.',
                                'Bila tangan sangat lemah, bantu gerakan dengan tangan yang sehat.',
                                'Hentikan bila timbul nyeri atau kelelahan berlebih.',
                            ],
                        ]),
                        'video' => '',
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Menguatkan otot paha dan tungkai dengan mengangkat kaki dalam posisi duduk di kursi.',
                            'img' => 'fisioterapi.jpg', 'alt' => 'Latihan kekuatan kaki',
                            'langkah' => [
                                'Duduk tegak di kursi dengan telapak kaki menapak lantai.',
                                'Luruskan satu lutut hingga kaki terangkat sejajar lantai.',
                                'Tahan 3&ndash;5 detik, lalu turunkan perlahan.',
                                'Ulangi 10 kali pada tiap kaki secara bergantian.',
                            ],
                            'tips' => [
                                'Pegang tepi kursi untuk menjaga keseimbangan.',
                                'Lakukan perlahan, jangan menghentak.',
                                'Tingkatkan jumlah pengulangan secara bertahap bila mampu.',
                            ],
                        ]),
                        'video' => $drive,
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Melatih keseimbangan tubuh dengan latihan berdiri, sebagai persiapan untuk kembali berjalan.',
                            'langkah' => [
                                'Berdiri di dekat dinding atau kursi kokoh sebagai pegangan.',
                                'Berdiri tegak bertumpu pada kedua kaki, tahan 10&ndash;30 detik.',
                                'Bila sudah stabil, kurangi tumpuan pada pegangan sedikit demi sedikit.',
                            ],
                            'catatan' => 'Selalu ada pendamping saat latihan berdiri untuk mencegah pasien jatuh.',
                        ]),
                        'video' => '',
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Bila pasien sudah mampu berdiri dengan stabil, mulai latihan berjalan secara bertahap.',
                            'img' => 'tongkat-jalan.jpg', 'alt' => 'Latihan berjalan dengan alat bantu',
                            'langkah' => [
                                'Awali dengan 3 langkah, lalu istirahat.',
                                'Tambah jumlah langkah sedikit demi sedikit setiap hari.',
                                'Gunakan alat bantu (tongkat atau walker) bila diperlukan.',
                            ],
                            'tips' => [
                                'Kenakan alas kaki yang tidak licin.',
                                'Dampingi pasien dan pastikan lantai kering serta tidak licin.',
                                'Utamakan keamanan; jangan memaksakan jarak.',
                            ],
                        ]),
                        'video' => '',
                    ],
                ],
                'Olahraga' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Latihan pernapasan membantu relaksasi, melancarkan asupan oksigen, dan menenangkan pikiran.',
                            'img' => 'relaksasi.jpg', 'alt' => 'Latihan pernapasan dan relaksasi',
                            'langkah' => [
                                'Duduk atau berbaring dengan nyaman.',
                                'Tarik napas perlahan melalui hidung.',
                                'Tahan selama 4 hitungan.',
                                'Keluarkan perlahan melalui mulut.',
                                'Ulangi 5 kali atau sesuai kemampuan.',
                            ],
                        ]),
                        'video' => '',
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Berjalan kaki di luar rumah pada pagi hari untuk menghirup udara segar dan mendapat paparan sinar matahari yang baik untuk tubuh.',
                            'img' => 'tongkat-jalan.jpg', 'alt' => 'Jalan kaki pagi',
                            'langkah' => [
                                'Lakukan pada pukul 07.30&ndash;08.00.',
                                'Durasi 10&ndash;30 menit sesuai kemampuan pasien.',
                                'Gunakan alat bantu jalan bila perlu dan selalu dampingi pasien.',
                            ],
                            'tips' => [
                                'Hentikan bila pasien merasa lelah, pusing, atau sesak.',
                            ],
                        ]),
                        'video' => '',
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Senam ringan untuk membantu menjaga tekanan darah tetap stabil dan meningkatkan kebugaran.',
                            'langkah' => [
                                'Ikuti gerakan senam sesuai panduan pada video.',
                                'Lakukan perlahan dan sesuai kemampuan pasien.',
                            ],
                            'catatan' => 'Tekan tombol video di bawah untuk melihat panduan gerakan senam.',
                        ]),
                        'video' => $drive,
                    ],
                ],
                'Terapi' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Konsumsi obat secara teratur sesuai aturan dokter sangat penting untuk pemulihan dan mencegah serangan stroke berulang.',
                            'tips' => [
                                'Minum obat tepat waktu sesuai dosis yang diberikan.',
                                'Jangan menghentikan atau mengubah dosis obat tanpa anjuran dokter.',
                                'Gunakan pengingat atau alarm agar tidak lupa.',
                            ],
                        ]),
                        'video' => '',
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Bila pasien menderita hipertensi (tekanan darah tinggi), minum obat penurun tekanan darah secara rutin sesuai resep.',
                            'img' => 'tekanan-darah.jpg', 'alt' => 'Kontrol tekanan darah',
                            'tips' => [
                                'Minum obat pada jam yang sama setiap hari.',
                                'Tetap minum obat meski tekanan darah terasa normal, kecuali ada anjuran lain dari dokter.',
                            ],
                        ]),
                        'video' => '',
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Konsumsi vitamin yang diberikan tenaga kesehatan untuk mendukung proses pemulihan tubuh.',
                            'tips' => [
                                'Minum vitamin sesuai dosis dan waktu yang dianjurkan.',
                                'Konsultasikan bila ingin menambah suplemen lain.',
                            ],
                        ]),
                        'video' => '',
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Pantau tekanan darah secara berkala untuk memastikan tetap berada dalam rentang yang aman.',
                            'img' => 'tekanan-darah.jpg', 'alt' => 'Alat ukur tekanan darah',
                            'langkah' => [
                                'Ukur tekanan darah pada waktu yang sama setiap hari, misalnya pagi hari.',
                                'Pasien duduk tenang beberapa menit sebelum diukur.',
                                'Catat hasilnya dan tunjukkan saat kontrol ke fasilitas kesehatan.',
                            ],
                            'catatan' => 'Target tekanan darah: Sistolik <strong>130&ndash;145 mmHg</strong>, Diastolik <strong>70&ndash;90 mmHg</strong>.',
                        ]),
                        'video' => '',
                    ],
                ],
                'Perawatan' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Kontrol ke rumah sakit atau fasilitas kesehatan setiap bulan untuk evaluasi perkembangan dan penyesuaian pengobatan.',
                            'tips' => [
                                'Bawa catatan tekanan darah dan keluhan pasien saat kontrol.',
                                'Tanyakan hal yang belum jelas kepada tenaga kesehatan.',
                            ],
                        ]),
                        'video' => '',
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Ikuti program rehabilitasi sesuai anjuran tenaga kesehatan secara konsisten. Kesabaran dan kerutinan adalah kunci pemulihan pasca stroke.',
                            'tips' => [
                                'Lakukan latihan secara rutin, sedikit demi sedikit setiap hari.',
                                'Beri dukungan dan semangat kepada pasien.',
                            ],
                        ]),
                        'video' => '',
                    ],
                ],
            ],
            'Kesulitan Menelan' => [
                'Rehabilitasi' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Memijat lembut otot-otot leher membantu melemaskan otot yang berperan dalam proses menelan.',
                            'img' => 'fisioterapi.jpg', 'alt' => 'Terapi otot leher',
                            'langkah' => [
                                'Pijat lembut sisi dan depan leher dengan gerakan memutar.',
                                'Lakukan beberapa menit, hindari menekan terlalu keras.',
                            ],
                            'tips' => ['Hentikan bila pasien merasa nyeri atau tidak nyaman.'],
                        ]),
                        'video' => '',
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Pilih makanan bertekstur lembut dan minuman yang lebih kental agar lebih mudah dan aman ditelan.',
                            'img' => 'oatmeal.jpg', 'alt' => 'Makanan bertekstur lembut',
                            'tips' => [
                                'Beri makan perlahan dalam porsi kecil.',
                                'Pastikan pasien duduk tegak saat makan dan minum.',
                            ],
                        ]),
                        'video' => '',
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Latih pasien menggigit makanan selama beberapa detik sebelum menelan untuk merangsang refleks dan kekuatan otot menelan.',
                            'langkah' => [
                                'Berikan potongan makanan lunak berukuran kecil.',
                                'Minta pasien menggigit dan menahan beberapa detik.',
                                'Lanjutkan menelan perlahan.',
                            ],
                        ]),
                        'video' => '',
                    ],
                ],
            ],
            'Kesulitan Berbicara' => [
                'Rehabilitasi' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Latihan mengucapkan huruf vokal untuk melatih otot mulut dan kemampuan berbicara.',
                            'langkah' => [
                                'Ucapkan huruf <strong>A</strong> dengan jelas, tahan sebentar.',
                                'Lanjutkan dengan <strong>I</strong>, <strong>U</strong>, <strong>E</strong>, <strong>O</strong>.',
                                'Ulangi beberapa kali sambil melihat gerakan mulut di cermin.',
                            ],
                            'tips' => ['Lakukan perlahan dan beri pujian atas setiap kemajuan.'],
                        ]),
                        'video' => '',
                    ],
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Latihan mengucapkan kata sederhana untuk melatih pasien kembali berbicara.',
                            'langkah' => [
                                'Latih kata: mama, papa, makan, minum, tidur.',
                                'Ucapkan bersama pasien, satu kata pada satu waktu.',
                                'Ulangi rutin setiap hari.',
                            ],
                        ]),
                        'video' => '',
                    ],
                ],
            ],
            'Penglihatan Kabur' => [
                'Rehabilitasi' => [
                    [
                        'deskripsi' => $this->blok([
                            'intro' => 'Latihan memusatkan fokus mata untuk membantu melatih otot dan koordinasi penglihatan.',
                            'img' => 'mata.jpg', 'alt' => 'Latihan fokus mata',
                            'langkah' => [
                                'Pandang lurus ke depan selama 10 detik.',
                                'Pindahkan fokus ke kiri selama 10 detik.',
                                'Pindahkan fokus ke kanan selama 10 detik.',
                                'Ulangi sebanyak 2&ndash;3 kali.',
                            ],
                            'tips' => ['Lakukan di tempat dengan pencahayaan cukup dan istirahatkan mata bila lelah.'],
                        ]),
                        'video' => '',
                    ],
                ],
            ],
        ];

        $this->simpan('penanganan', 'id_penanganan', 'id_kat_penanganan', 'kategori_penanganan', $data);
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
                            'video' => $item['video'] ?? '',
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
