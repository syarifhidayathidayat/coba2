<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaketPekerjaan extends Model
{
    use HasFactory;

    protected $table = 'paket_pekerjaan';

    protected $fillable = [
        'nama_paket',
        'tahun_anggaran',
        'max',
        'kode_rup',
        'pagu',
        'qty',
        'outstanding_kontrak',
        'realisasi',
        'sisa_pagu',
        'jenis_akun',
    ];
}
