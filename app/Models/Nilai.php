<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['siswa_id', 'mata_pelajaran', 'nilai'];

    // Relasi: Nilai milik satu Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
