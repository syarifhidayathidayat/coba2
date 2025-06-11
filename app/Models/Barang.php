<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'sp_id',
        'nama_barang',
        'qty',
        'penempatan_id',
    ];


    public function sp()
    {
        return $this->belongsTo(Sp::class);
    }
    public function penempatan()
    {
        return $this->belongsTo(Penempatan::class);
    }
}
