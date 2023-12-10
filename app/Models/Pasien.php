<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pasien';

    protected $fillable = [
        'id_user',
        'nama',
        'gender',
        'umur',
        'pemicu',
        'komplikasi',
    ];

    // Define relasi dengan tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
