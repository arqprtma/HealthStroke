<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_treatment';
    protected $table = 'treatment';
    protected $fillable = [
        'id_aktivitas',
        'id_penanganan',
        'id_pasien',

    ];


    // Define relasi dengan tabel User
    public function aktivitas()
    {
        return $this->belongsTo(Aktivitas::class, 'id_aktivitas');
    }
    public function penanganan()
    {
        return $this->belongsTo(Penanganan::class, 'id_penanganan');
    }
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }
}
