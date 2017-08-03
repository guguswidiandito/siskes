<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailResep extends Model
{
    protected $fillable = ['resep_id', 'obat_id', 'jumlah', 'aturan_pakai', 'total_tersedia', 'kekurangan'];

    public function resep()
    {
    	return $this->belongsTo(Resep::class);
    }

    public function obat()
    {
    	return $this->belongsTo(Obat::class);
    }
}
