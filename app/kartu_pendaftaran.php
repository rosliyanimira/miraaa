<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kartu_pendaftaran extends Model
{
    public function petugas()
    {
        return $this->belongsTo('App/petugas');
    }
    public function  peminjam()
    {
        return $this->belongsTo('App/peminjam');
    }
}
