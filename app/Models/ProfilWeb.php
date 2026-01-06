<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilWeb extends Model
{
    protected $fillable = [
        'nama','alamat','telepon','email','visi','misi','logo'
    ];
}
