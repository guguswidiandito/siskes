<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = ['no_dokter', 'nama_dokter', 'no_telepon', 'alamat_dokter', 'poli'];

    public function kunjungan()
    {
        return $this->hasMany(kunjungan::class);
    }

    public function rekam()
    {
        return $this->hasMany(rekam::class);
    }

    public function resep()
    {
        return $this->hasMany(resep::class);
    }
}
