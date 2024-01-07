<?php

use Illuminate\Support\Facades\Mail;
use App\Mail\mailverif; // Gantilah dengan nama kelas mail Anda

function kirimEmail()
{
    $data = [
        'nama' => 'Nama Penerima',
        'pesan' => 'Ini adalah pesan contoh.'
    ];

    Mail::to('ariqp63@email.com')->send(new ContohEmail($data));

    return "Email telah dikirim!";
}

