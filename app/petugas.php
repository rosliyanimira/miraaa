<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    public function petugas()
    {
        return $this->hasMany('App/petugas');
    }
    public function  peminjam()
    {
        return $this->hasMany('App/peminjam');
    }
}
