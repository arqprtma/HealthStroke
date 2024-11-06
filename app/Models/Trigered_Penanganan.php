<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trigered_Penanganan extends Model
{
    use HasFactory;
    protected $table = 'trigered_penanganan';
    protected $primaryKey = 'id_trigered_penanganan';
    protected $fillable = [
        'id_penanganan',
        'jumlah',
        'konten'
    ];
}
