<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->paginate(10);

        return view('user.pengumuman.index', compact('pengumuman'));
    }

    public function show($id)
    {
        $item = Pengumuman::findOrFail($id);

        return view('user.pengumuman.show', compact('item'));
    }
}
