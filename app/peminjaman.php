<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    public function petugas()
    {
        return $this->belogsTo('App/petugas');
    }
    public function peminjam()
    {
        return $this->belongsTo('App/peminjam');
    }
}
