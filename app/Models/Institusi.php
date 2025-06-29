<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institusi extends Model
{
    protected $fillable = [
        'nama_institusi',
        'alamat',
        'no_telp',
        'fax',
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
        'sp_dipa',
        'tanggal_sp_dipa',
        'no_sk_pejabat',
        'tanggal_sk_pejabat',
        'upload_sk_pejabat',
        'tanggal_mulai',
        'tanggal_selesai',
    ];
}
