<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjam extends Model
{
    public function peminjam()
    {
        return $this->hasMany('App/peminjaman');
    }
    public function  kartupendaftaran()
    {
        return $this->hasMany('App/kartupendaftaran');
    }
}
