<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'hak_akses', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
