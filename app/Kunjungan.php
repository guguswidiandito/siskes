<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $fillable = ['no_kunjungan', 'tgl_kunjungan', 'dokter_id', 'pasien_id', 'user_id', 'poli'];

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
}
