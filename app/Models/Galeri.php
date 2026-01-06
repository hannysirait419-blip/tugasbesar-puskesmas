<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Galeri.php
class Galeri extends Model
{
    protected $table = 'galeri';
    protected $fillable = ['judul_kegiatan', 'deskripsi'];

    public function fotos()
    {
        return $this->hasMany(GaleriFoto::class);
    }
}
