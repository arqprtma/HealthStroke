<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'pasien';
    protected $fillable = [
        'id_user',
        'nama',
        'gender',
        'umur',
        'pemicu',
        'komplikasi',
    ];
    protected $casts = [
        'pemicu' => 'array',
        'komplikasi' => 'array',
    ];

    // Define relasi dengan tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
