<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = ['no_pasien', 'nama_pasien', 'alamat_pasien', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'status', 'gol_darah', 'agama'];

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
        return $this->hasOne(resep::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }
}
