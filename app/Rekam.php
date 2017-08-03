<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekam extends Model
{
    protected $fillable = ['no_rekam', 'tgl_rekam', 'pasien_id', 'dokter_id', 'poli', 'user_id', 'keluhan', 'diagnosa', 'theraphy', 'biaya', 'status'];

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

    public function resep()
    {
        return $this->hasMany(resep::class);
    }
}
