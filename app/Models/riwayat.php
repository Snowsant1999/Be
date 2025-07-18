<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    protected $table = "peminjamen";
    protected $guarded = [];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
