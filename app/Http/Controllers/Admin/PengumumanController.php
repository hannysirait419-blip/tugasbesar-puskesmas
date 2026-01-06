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
        $pengumumans = Pengumuman::latest()->paginate(10);
        return view('admin.pengumuman.index', compact('pengumumans'));
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

    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'file' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        $data = $request->only(['judul', 'isi']);
        
        if ($request->hasFile('file')) {
            // Delete old file
            if ($pengumuman->file && Storage::disk('public')->exists($pengumuman->file)) {
                Storage::disk('public')->delete($pengumuman->file);
            }
            $data['file'] = $request->file('file')
                ->store('pengumuman', 'public');
        }

        $pengumuman->update($data);
        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        if ($pengumuman->file && Storage::disk('public')->exists($pengumuman->file)) {
            Storage::disk('public')->delete($pengumuman->file);
        }

        $pengumuman->delete();

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus');
    }
}
