<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index()
    {
        return view('admin.pengumuman.index', [
            'pengumuman' => Pengumuman::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        $data = $request->only(['judul', 'isi']);
        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')
                ->store('pengumuman', 'public');
        }

        Pengumuman::create($data);
        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        // 1️⃣ Hapus file lampiran (kalau ada)
        if ($pengumuman->file && Storage::disk('public')->exists($pengumuman->file)) {
            Storage::disk('public')->delete($pengumuman->file);
        }

        // 2️⃣ Hapus data pengumuman
        $pengumuman->delete();

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus');
    }
}
