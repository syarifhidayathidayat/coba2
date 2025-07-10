<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyedia extends Model
{
    protected $fillable = [
        'user_id',
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
    public function sp()
    {
        return $this->hasMany(Sp::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function basts()
    {
        return $this->hasManyThrough(
            \App\Models\Bast::class, // model yang dituju
            \App\Models\Sp::class,   // perantara
            'penyedia_id',           // foreign key di SP ke Penyedia
            'sp_id',                 // foreign key di BAST ke SP
            'id',                    // local key di Penyedia
            'id'                     // local key di SP
        );
    }
}
