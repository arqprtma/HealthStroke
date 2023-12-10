<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penanganan extends Model
{
    use HasFactory;

    protected $table = 'penanganan';

    protected $primaryKey = 'id_penanganan';

    protected $fillable = [
        'id_pemicu',
        'id_komplikasi',
        'id_kat_penanganan',
        'deskripsi',
        'video',
    ];

    // Define relasi dengan tabel Pemicu, Komplikasi, dan KategoriPenanganan
    public function pemicu()
    {
        return $this->belongsTo(Pemicu::class, 'id_pemicu');
    }

    public function komplikasi()
    {
        return $this->belongsTo(Komplikasi::class, 'id_komplikasi');
    }

    public function kategori_penanganan()
    {
        return $this->belongsTo(Kategori_penanganan::class, 'id_kat_penanganan');
    }
}
