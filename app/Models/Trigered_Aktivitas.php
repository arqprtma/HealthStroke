<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trigered_Aktivitas extends Model
{
    use HasFactory;
    protected $table = 'trigered_aktivitas';
    protected $primaryKey = 'id_trigered_aktivitas';
    protected $fillable = [
        'id_aktivitas',
        'judul',
        'level',
        'konten',
        'kemajuan',
        'kemunduran'
    ];
}
