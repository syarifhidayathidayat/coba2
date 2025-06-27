<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'name',
        'nip',
        'jabatan',
        'email',
    ];

    // Optionally, you can define relationships here if needed
    // For example, if Pegawai has many projects:
    // public function projects()
    // {
    //     return $this->hasMany(Project::class);
    // }
}
