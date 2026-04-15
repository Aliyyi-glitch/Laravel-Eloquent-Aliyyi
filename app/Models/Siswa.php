<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['nama', 'absen', 'kelas'];

    /**
     * Define the relationship to the Nilai model.
     * A Siswa has many Nilais.
     */
    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}