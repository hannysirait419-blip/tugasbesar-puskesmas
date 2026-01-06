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
        return view('admin.galeri.index', [
            'galeri' => Galeri::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'judul' => 'required',
            'fotos.*' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $galeri = Galeri::create([
            'judul_kegiatan' => $request->judul_kegiatan,
            'deskripsi' => $request->deskripsi
        ]);

        foreach ($request->file('fotos') as $foto) {
            $path = $foto->store('galeri', 'public');

            GaleriFoto::create([
                'galeri_id' => $galeri->id,
                'foto' => $path
            ]);
        }

        $path = $request->file('foto')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'foto' => $path
        ]);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Galeri berhasil ditambahkan');
    }

    public function destroy(Galeri $galeri)
    {
        // 1. Hapus semua foto fisik
        foreach ($galeri->fotos as $foto) {
            if (Storage::disk('public')->exists($foto->foto)) {
                Storage::disk('public')->delete($foto->foto);
            }
        }

        // 2. Hapus data foto dari database
        $galeri->fotos()->delete();

        // 3. Hapus galeri
        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Galeri dan seluruh fotonya berhasil dihapus');
    }
}
