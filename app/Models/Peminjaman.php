<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = "peminjamen";
    protected $guarded = [];

    public function buku()
{
    return $this->belongsTo(Buku::class);
}
public function user()
{
    return $this->belongsTo(User::class);
}
}
