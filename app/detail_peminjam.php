<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_peminjam extends Model
{
    public function peminjaman()
    {
        return $this->belongsTo('App/peminjaman');
    }
    public function  buku()
    {
        return $this->belongsTo('App/buku');
    }
}
