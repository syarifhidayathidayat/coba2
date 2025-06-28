<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPemilihan extends Model
{
    use HasFactory;

    protected $table = 'dokumen_pemilihans';

    protected $fillable = [
        'undangan_nomor',
        'undangan_tanggal',
        'hps',
        'undangan_pemasukan_tgl_mulai',
        'undangan_pemasukan_tgl_selesai',
        'undangan_pemasukan_jam',
        'undangan_evaluasi_tgl_mulai',
        'undangan_evaluasi_tgl_selesai',
        'undangan_evaluasi_jam',
        'undangan_spk_hari',
        'undangan_spk_tanggal',
        'uraian_paket',
        'no_surat_izin_usaha',
        'masa_berlaku_penawaran',
        'bidang_usaha',
        'jangka_waktu_penyerahan',
        'ba_pembukaan_nomor',
        'ba_pembukaan_hari',
        'ba_pembukaan_tanggal',
        'ba_pembukaan_surat_penawaran',
        'ba_pembukaan_dok_teknis',
        'ba_pembukaan_syarat',
        'ba_pembukaan_lain',
        'ba_pembukaan_keterangan',
        'ba_klarifikasi_nomor',
        'ba_klarifikasi_hari',
        'ba_klarifikasi_tanggal',
        'ba_klarifikasi_harga_penawaran',
        'ba_klarifikasi_harga_negosiasi',
        'ba_hasil_nomor',
        'ba_hasil_hari',
        'ba_hasil_tanggal',
        'ba_hasil_penawaran_admin',
        'ba_hasil_penawaran_teknis',
        'ba_hasil_penawaran_biaya',
        'ba_hasil_penawaran_keterangan',
        'ba_hasil_harga_koreksi',
        'ba_hasil_harga_final',
        'ba_hasil_evaluasi_admin',
        'ba_hasil_evaluasi_teknis',
        'ba_hasil_evaluasi_harga',
        'nota_dinas_nomor',
        'nota_dinas_tanggal',
        'sp_id',
        'created_by',
    ];

    // Relasi ke SP
    public function sp()
    {
        return $this->hasOne(\App\Models\Sp::class);
    }

    // Relasi ke user (optional, untuk tracking siapa yang input)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
