<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyedia extends Model
{
    protected $fillable = [
        'nama_penyedia',
        'nama_direktur_penyedia',
        'alamat',
        'telepon',
        'website',
        'fax',
        'email',
        'rekening_bank',
        'cabang_bank',
        'rekening_atas_nama',
        'npwp',
        'dokumen_npwp',
        'dokumen_ktp',
        'dokumen_rekening_koran',
    ];
}
