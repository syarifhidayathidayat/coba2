<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyedia extends Model
{
    protected $fillable = [
        'nama_penyedia',
        'npwp',
        'rekening',
        'alamat',
        'dokumen_npwp',
        'dokumen_ktp',
        'dokumen_rekening_koran',
    ];
}
