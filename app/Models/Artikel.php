<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';

    protected $fillable = [
        'judul',
        'cover',
        'kategori',
        'deskripsi',
    ];

    // Relasi ke tabel kategori_artikel
    public function kategori_artikel()
    {
        return $this->belongsTo(Kategori_artikel::class, 'kategori', 'id_kat_artikel');
    }
}
