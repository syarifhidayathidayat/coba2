<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


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
    public function updateTotalKontrak()
    {
        $total = $this->barangs()->sum('total') + $this->barangs()->sum('ongkos_kirim');
        $this->total_kontrak = $total;
        $this->save();
    }
    public function hitungAkhirPekerjaan()
    {
        if ($this->mulai_pekerjaan && $this->masa) {
            $this->akhir_pekerjaan = Carbon::parse($this->mulai_pekerjaan)->addDays((int)$this->masa)->format('Y-m-d');
            $this->save();
        }
    }
    public function bast()
    {
        return $this->hasOne(\App\Models\Bast::class);
    }
}
