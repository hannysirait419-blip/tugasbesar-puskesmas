<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->paginate(10);

        return view('User.pengumuman.index', compact('pengumuman'));
    }

    public function show($id)
    {
        $item = Pengumuman::findOrFail($id);

        return view('User.pengumuman.show', compact('item'));
    }
}
