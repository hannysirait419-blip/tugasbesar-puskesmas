<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Galeri;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard', [
            'berita' => Berita::count(),
            'pengumuman' => Pengumuman::count(),
            'galeri' => Galeri::count(),
        ]);
    }
}
