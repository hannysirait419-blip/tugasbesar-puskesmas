<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';

    protected $fillable = [
        'nik',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'golongan_darah',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function antrians()
    {
        return $this->hasMany(Antrian::class);
    }
}
