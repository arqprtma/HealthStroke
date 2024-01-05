<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log_treatment extends Model
{
    use HasFactory;

    protected $table = 'log_treatment';

    protected $fillable = [
        'id_pasien',
        'id_penanganan',
        'id_aktivitas',
    ];

    // Relasi ke tabel Aktivitas
    public function aktivitas()
    {
        return $this->belongsTo(Aktivitas::class, 'id_aktivitas', 'id_aktivitas');
    }
    // Relasi ke tabel Penanganan
    public function penanganan()
    {
        return $this->belongsTo(Penanganan::class, 'id_penanganan', 'id_penanganan');
    }
}
