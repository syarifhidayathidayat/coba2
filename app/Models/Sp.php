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
        'dokumen_pemilihan_id',
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
    // status SP
    public function getStatusLabelAttribute()
    {
        if (!$this->bast) {
            return 'SP Dibuat';
        }

        if ($this->bast && !$this->bast->dicetak) {
            return 'BAST Dibuat';
        }

        // if ($this->bast && $this->bast->dicetak && !$this->pembayaran) {
        //     return 'BAST Dicetak';
        // }

        // if ($this->pembayaran) {
        //     return 'Sudah Dibayar';
        // }

        return 'Tidak diketahui';
    }

    public function dokumenPemilihan()
    {
        return $this->belongsTo(DokumenPemilihan::class);
    }
    public function paketPekerjaan()
    {
        return $this->belongsTo(\App\Models\PaketPekerjaan::class, 'nama_paket', 'nama_paket');
    }
}
