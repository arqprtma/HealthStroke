<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Mengisi tabel trigered_penanganan (data "level" / penilaian perkembangan pasien)
 * berdasarkan dokumen CP DSS "Informasi_CP_DSS_rev.xlsx":
 *
 *  - Sheet "Keputusan Latihan Kekuatan Otot" -> skala kekuatan otot 0-5 untuk
 *    penanganan Rehabilitasi pada komplikasi Kelumpuhan.
 *  - Sheet "Keputusan Olah Raga Jalan Kaki" -> skala respons tekanan darah 0-2
 *    untuk penanganan Olahraga "jalan kaki" pada komplikasi Kelumpuhan.
 *  - Sheet "Informasi CP DSS" (bagian KEPUTUSAN) -> penilaian YA/TIDAK (skala 2
 *    level: belum/sudah membaik) untuk komplikasi Kesulitan Menelan, Kesulitan
 *    Berbicara, dan Penglihatan Kabur pada penanganan Rehabilitasi masing-masing.
 *
 * Setelah data ini terisi, kartu "Decision Progress" dan modal "Penilaian
 * Perkembangan Pasien" pada halaman detail penanganan menjadi aktif.
 */
class TrigeredPenangananTableSeeder extends Seeder
{
    private $now;

    public function run(): void
    {
        $this->now = Carbon::now();

        foreach ($this->aturan() as $r) {
            $idKomplikasi = DB::table('komplikasi')->where('nama', $r['komplikasi'])->value('id_komplikasi');
            $idKategori = DB::table('kategori_penanganan')->where('nama', $r['kategori'])->value('id_kat_penanganan');
            if (!$idKomplikasi || !$idKategori) {
                continue;
            }

            $query = DB::table('penanganan')
                ->where('id_komplikasi', $idKomplikasi)
                ->where('id_kat_penanganan', $idKategori);
            if (!empty($r['filter'])) {
                $query->where('deskripsi', 'like', '%' . $r['filter'] . '%');
            }

            foreach ($query->pluck('id_penanganan') as $idPenanganan) {
                foreach ($r['levels'] as $level => $d) {
                    $this->upsert($idPenanganan, $level, [
                        'judul' => $d['judul'],
                        'konten' => $d['konten'],
                        'kemajuan' => $r['kemajuan'],
                        'kemunduran' => $r['kemunduran'],
                    ]);
                }
            }
        }
    }

    /**
     * Daftar aturan pemetaan sheet keputusan -> level penanganan.
     */
    private function aturan(): array
    {
        return [
            // 1. Skala kekuatan otot 0-5 (Keputusan Latihan Kekuatan Otot)
            [
                'komplikasi' => 'Kelumpuhan',
                'kategori' => 'Rehabilitasi',
                'kemajuan' => 'Terus bersemangat! Nilai kekuatan otot meningkat. Lanjutkan latihan sesuai anjuran; bila sudah stabil, teruskan hingga 6 bulan.',
                'kemunduran' => 'Nilai kekuatan otot menurun. Bila pasien kelelahan, istirahat sementara lalu lanjutkan setelah reda. Pastikan cara latihan sudah sesuai petunjuk; bila perlu konsultasikan ke tenaga kesehatan.',
                'levels' => [
                    0 => ['judul' => 'Belum ada kontraksi', 'konten' => 'Saat tangan atau kaki yang lumpuh diangkat, tidak ada kontraksi otot atau reaksi sama sekali.'],
                    1 => ['judul' => 'Kontraksi minimal', 'konten' => 'Ada sedikit kontraksi atau reaksi otot, tetapi belum ada perubahan gerakan; hanya kekuatannya yang mulai muncul.'],
                    2 => ['judul' => 'Gerak tanpa lawan gravitasi', 'konten' => 'Otot berkontraksi dan dapat bergerak penuh (full ROM), tetapi belum mampu melawan gaya gravitasi.'],
                    3 => ['judul' => 'Mampu melawan gravitasi', 'konten' => 'Mampu bergerak penuh (full ROM) melawan gaya gravitasi, namun belum ada tahanan tambahan.'],
                    4 => ['judul' => 'Melawan tahanan ringan', 'konten' => 'Mampu melawan tahanan (manual), tetapi belum maksimal dan belum full ROM.'],
                    5 => ['judul' => 'Kekuatan normal', 'konten' => 'Normal. Otot bergerak aktif penuh dan mampu melawan tahanan maksimal.'],
                ],
            ],

            // 2. Skala respons tekanan darah 0-2 (Keputusan Olah Raga Jalan Kaki)
            [
                'komplikasi' => 'Kelumpuhan',
                'kategori' => 'Olahraga',
                'filter' => 'Berjalan kaki di luar rumah',
                'kemajuan' => 'Bagus! Tekanan darah membaik. Teruskan latihan jalan kaki secara rutin, minimal 3 bulan terus-menerus.',
                'kemunduran' => 'Tekanan darah naik. Istirahat, minum obat teratur, dan alihkan ke latihan relaksasi atau olah raga pernapasan. Jika pusing atau lelah, ISTIRAHAT dan RELAX.',
                'levels' => [
                    0 => ['judul' => 'Tekanan darah meningkat', 'konten' => 'Setelah rutin jalan kaki (± 9 kali), tekanan darah justru meningkat. Istirahat, minum obat teratur, dan alihkan ke latihan relaksasi atau olah raga pernapasan.'],
                    1 => ['judul' => 'Tekanan darah mulai stabil', 'konten' => 'Tekanan darah mulai stabil. Lanjutkan jalan kaki minimal 3 kali/minggu sambil terus memantau tekanan darah.'],
                    2 => ['judul' => 'Tekanan darah menurun/stabil', 'konten' => 'Tekanan darah menurun atau stabil (target 130–145 / 70–90 mmHg). Teruskan latihan minimal 3 bulan terus-menerus.'],
                ],
            ],

            // 3. Kesulitan Menelan (Keputusan: "Apakah sudah menelan dengan baik tanpa tersedak?")
            [
                'komplikasi' => 'Kesulitan Menelan',
                'kategori' => 'Rehabilitasi',
                'kemajuan' => 'Refleks menelan membaik. Teruskan latihan 2 kali sehari (pagi dan sore) sesuai anjuran.',
                'kemunduran' => 'Refleks menelan belum membaik. Pastikan latihan sesuai petunjuk; bila kesulitan menelan, konsultasikan ke tenaga kesehatan terdekat.',
                'levels' => [
                    0 => ['judul' => 'Belum membaik', 'konten' => 'Pasien masih tersedak atau kesulitan menelan; refleks menelan belum mengalami perubahan.'],
                    1 => ['judul' => 'Sudah membaik', 'konten' => 'Pasien sudah dapat menelan dengan baik tanpa tersedak; refleks menelan mengalami perbaikan.'],
                ],
            ],

            // 4. Kesulitan Berbicara (Keputusan: "Apakah sudah berbicara jelas dan dapat dipahami?")
            [
                'komplikasi' => 'Kesulitan Berbicara',
                'kategori' => 'Rehabilitasi',
                'kemajuan' => 'Otot wajah dan mulut membaik. Teruskan latihan 2 kali sehari (pagi dan sore) sesuai anjuran.',
                'kemunduran' => 'Bicara belum jelas. Pastikan latihan sesuai petunjuk; bila kesulitan, konsultasikan ke tenaga kesehatan terdekat.',
                'levels' => [
                    0 => ['judul' => 'Belum membaik', 'konten' => 'Pasien belum dapat berbicara dengan jelas dan sulit dipahami; otot wajah dan mulut belum mengalami perubahan.'],
                    1 => ['judul' => 'Sudah membaik', 'konten' => 'Pasien sudah dapat berbicara dengan jelas dan dapat dipahami; otot wajah dan mulut mengalami perbaikan.'],
                ],
            ],

            // 5. Penglihatan Kabur (Keputusan: "Apakah sudah dapat melihat dengan jelas?")
            [
                'komplikasi' => 'Penglihatan Kabur',
                'kategori' => 'Rehabilitasi',
                'kemajuan' => 'Otot mata membaik. Teruskan latihan 2 kali sehari (pagi dan sore) sesuai anjuran.',
                'kemunduran' => 'Penglihatan belum jelas. Pastikan latihan sesuai petunjuk; bila kesulitan, konsultasikan ke tenaga kesehatan terdekat.',
                'levels' => [
                    0 => ['judul' => 'Belum membaik', 'konten' => 'Pasien belum dapat melihat dengan jelas; otot mata belum mengalami perubahan.'],
                    1 => ['judul' => 'Sudah membaik', 'konten' => 'Pasien sudah dapat melihat dengan jelas; otot mata mengalami perbaikan.'],
                ],
            ],
        ];
    }

    /**
     * Idempotent: update baris (id_penanganan, level) bila sudah ada, atau buat baru.
     */
    private function upsert($idPenanganan, int $level, array $fields): void
    {
        $existing = DB::table('trigered_penanganan')
            ->where('id_penanganan', $idPenanganan)
            ->where('level', $level)
            ->value('id_trigered_penanganan');

        $payload = array_merge($fields, ['updated_at' => $this->now]);

        if ($existing) {
            DB::table('trigered_penanganan')->where('id_trigered_penanganan', $existing)->update($payload);
        } else {
            DB::table('trigered_penanganan')->insert(array_merge($payload, [
                'id_penanganan' => $idPenanganan,
                'level' => $level,
                'created_at' => $this->now,
            ]));
        }
    }
}
