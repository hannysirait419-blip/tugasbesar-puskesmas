<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/GaleriFoto.php
class GaleriFoto extends Model
{
    protected $fillable = ['galeri_id', 'foto'];

    public function galeri()
    {
        return $this->belongsTo(Galeri::class);
    }
}
