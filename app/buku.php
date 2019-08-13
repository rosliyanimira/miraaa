<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    public function penerbit()
    {
        return $this->belongsTo('App/penerbit');
    }
    public function  kategori()
    {
        return $this->belongsTo('App/kategori');
    }
    public function detail()
    {
        return $this->hasMany('App/detailpeminjam');
    }
}
