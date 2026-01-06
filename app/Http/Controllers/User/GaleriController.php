<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->paginate(9);

        return view('User.Galeri.index', compact('galeri'));
    }

    public function show($id)
    {
        $galeris = Galeri::with('fotos')->findOrFail($id);

        return view('User.Galeri.show', compact('galeris'));
    }
}
