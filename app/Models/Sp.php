<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sp extends Model
{
    protected $table = 'sps';

    protected $fillable = [
        'nomor_sp',
        'penyedia_id',
        'nama_paket',
        'tanggal',
        'total_kontrak',
        'mulai_pekerjaan',
        'masa',
        'akhir_pekerjaan',
        'metode',
        'total_pagu',
        'akun',
    ];

    public function penyedia()
    {
        return $this->belongsTo(Penyedia::class);
    }
    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
