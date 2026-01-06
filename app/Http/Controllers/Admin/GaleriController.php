<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\GaleriFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::with('fotos')->latest()->paginate(10);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_kegiatan' => 'required|string|max:255',
            'fotos' => 'required|array',
            'fotos.*' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $galeri = Galeri::create([
            'judul_kegiatan' => $request->judul_kegiatan,
        ]);

        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $path = $foto->store('galeri', 'public');
                GaleriFoto::create([
                    'galeri_id' => $galeri->id,
                    'foto' => $path
                ]);
            }
        }

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan');
    }

    public function show(Galeri $galeri)
    {
        $galeri->load('fotos');
        return view('admin.galeri.show', compact('galeri'));
    }

    public function edit(Galeri $galeri)
    {
        $galeri->load('fotos');
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul_kegiatan' => 'required|string|max:255',
            'fotos.*' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $galeri->update([
            'judul_kegiatan' => $request->judul_kegiatan,
        ]);

        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $path = $foto->store('galeri', 'public');
                GaleriFoto::create([
                    'galeri_id' => $galeri->id,
                    'foto' => $path
                ]);
            }
        }

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy(Galeri $galeri)
    {
        // Delete all photos
        foreach ($galeri->fotos as $foto) {
            if (Storage::disk('public')->exists($foto->foto)) {
                Storage::disk('public')->delete($foto->foto);
            }
        }

        $galeri->fotos()->delete();
        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Galeri dan seluruh fotonya berhasil dihapus');
    }

    public function destroyFoto(GaleriFoto $foto)
    {
        if (Storage::disk('public')->exists($foto->foto)) {
            Storage::disk('public')->delete($foto->foto);
        }
        
        $foto->delete();

        return redirect()->back()
            ->with('success', 'Foto berhasil dihapus');
    }
}
