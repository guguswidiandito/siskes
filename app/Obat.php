<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = ['kd_obat', 'nama_obat', 'satuan', 'tgl_masuk', 'tgl_keluar', 'jumlah'];

    public function detailresep()
    {
        return $this->hasMany(detailresep::class);
    }


    public function getStockAttribute($stock)
    {
        $coba = $this->detailresep()->get();

        foreach ($coba as $key => $value) {
            $stock = $value->total_tersedia;
            $kekurangan = $value->kekurangan;
        }

        if ($this->detailresep()->count() < 1) {
            $stock = $this->jumlah;
        }

        return $stock;
    }

    public function getStokAttribute($stok)
    {
        $coba = $this->stock;
        $stok = $coba - $coba;
        return $stok;
    }

    public function getKeluarAttribute($keluar)
    {
        $keluar = $this->jumlah - $this->stock;
        return $keluar;
    }

}
