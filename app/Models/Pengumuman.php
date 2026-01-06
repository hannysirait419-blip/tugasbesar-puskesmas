<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Pengumuman.php
class Pengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $fillable = ['judul', 'isi', 'file'];
}
