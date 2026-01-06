<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use App\Models\Galeri;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {
        return view('Home', [
            'pengumuman' => Pengumuman::latest()->limit(3)->get(),
            'galeri' => Galeri::with('fotos')->latest()->limit(3)->get(),
            'berita' => Berita::latest()->limit(3)->get(),
        ]);
    }
}
