<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['sp_id', 'nama_barang', 'qty'];

    public function sp()
    {
        return $this->belongsTo(Sp::class);
    }
}
