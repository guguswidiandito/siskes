<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $fillable = ['no_resep', 'tgl_resep', 'dokter_id', 'pasien_id', 'user_id', 'rekam_id'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function rekam()
    {
        return $this->belongsTo(Rekam::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }

    public function detailresep()
    {
        return $this->hasMany(DetailResep::class);
    }
}
