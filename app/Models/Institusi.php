<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institusi extends Model
{
    protected $fillable = [
        'nama_institusi',
        'alamat',
        'nama_ppk_52',
        'nip_ppk_52',
        'nama_ppk_53',
        'nip_ppk_53',
        'nama_pejabat_pengadaan_52',
        'nip_pejabat_pengadaan_52',
        'nama_pejabat_pengadaan_53',
        'nip_pejabat_pengadaan_53',
        'nama_bendahara',
        'nip_bendahara',
        'dipa',
        'tanggal_mulai',
        'tanggal_selesai',
    ];
}
