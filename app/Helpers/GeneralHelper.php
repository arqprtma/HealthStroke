<?php

use App\Models\Trigered_Aktivitas;
use App\Models\Trigered_Penanganan;
use Illuminate\Support\Str;

if (!function_exists('previewText')) {
    /**
     * Ubah konten HTML (deskripsi kaya) menjadi cuplikan teks polos yang rapi:
     * sisipkan spasi antar-tag agar kata tidak menempel, lalu potong.
     */
    function previewText($html, int $limit = 90): string
    {
        $text = strip_tags(str_replace('<', ' <', (string) $html));
        $text = trim(preg_replace('/\s+/', ' ', $text));

        return Str::limit($text, $limit);
    }
}

if (!function_exists('trigerPenangananByLevel')) {
    /**
     * Format a date to a human-readable string.
     *
     * @param  string  $date
     * @param  string  $format
     * @return string
     */
    function getTrigerPenanganan($id_penanganan, $level)
    {
        $trigerPenanganan = Trigered_Penanganan::where(['id_penanganan' => $id_penanganan, 'level' => $level])->first();

        return $trigerPenanganan;
    }
}

if (!function_exists('trigerAktivitasByLevel')) {
    /**
     * Format a date to a human-readable string.
     *
     * @param  string  $date
     * @param  string  $format
     * @return string
     */
    function getTrigerAktivitas($id_aktivitas, $level)
    {
        $trigerAktivitas = Trigered_Aktivitas::where(['id_aktivitas' => $id_aktivitas, 'level' => $level])->first();

        return $trigerAktivitas;
    }
}