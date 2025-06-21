<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bast extends Model
{
    use HasFactory;

    protected $fillable = [
        'sp_id',
        'tanggal_bast',
        'nomor_bast',
        'nomor_bap',
        'nomor_bapem',
        'no_kwitansi',
        'status',
        'keterangan'
    ];

    protected $casts = [
        'tanggal_bast' => 'date'
    ];

    // Relasi ke SP
    public function sp()
    {
        return $this->belongsTo(Sp::class);
    }

    // Relasi ke Barang melalui tabel pivot
    public function barangs()
    {
        return $this->belongsToMany(Barang::class, 'bast_barang')
            ->withPivot('jumlah_serah_terima', 'kondisi', 'keterangan')
            ->withTimestamps();
    }

    // Method untuk generate nomor BAST
    public static function generateNomorBast()
    {
        $lastBast = self::latest()->first();
        $year = date('Y');
        $month = date('m');
        
        if ($lastBast) {
            $lastNumber = (int) substr($lastBast->nomor_bast, -4);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        
        return "BAST/{$year}/{$month}/" . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }

    // Method untuk generate nomor BAP
    public static function generateNomorBap()
    {
        $lastBap = self::latest()->first();
        $year = date('Y');
        $month = date('m');
        
        if ($lastBap) {
            $lastNumber = (int) substr($lastBap->nomor_bap, -4);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        
        return "BAP/{$year}/{$month}/" . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }

    // Method untuk generate nomor BAPEM
    public static function generateNomorBapem()
    {
        $lastBapem = self::latest()->first();
        $year = date('Y');
        $month = date('m');
        
        if ($lastBapem) {
            $lastNumber = (int) substr($lastBapem->nomor_bapem, -4);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        
        return "BAPEM/{$year}/{$month}/" . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }
    
    
}
