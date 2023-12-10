<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_aktivitas';

    protected $fillable = [
        'id_pemicu',
        'id_komplikasi',
        'id_kat_aktivitas',
        'deskripsi',
        'video',
    ];

    // Define relasi dengan tabel Pemicu, Komplikasi, dan KategoriAktivitas
    public function pemicu()
    {
        return $this->belongsTo(Pemicu::class, 'id_pemicu');
    }

    public function komplikasi()
    {
        return $this->belongsTo(Komplikasi::class, 'id_komplikasi');
    }

    public function kategori_aktivitas()
    {
        return $this->belongsTo(Kategori_aktivitas::class, 'id_kat_aktivitas');
    }
}
