<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    public function store(Request $request)
    {
        Berita::create($request->all());
        return redirect()->back()->with('success', 'Berita ditambahkan');

        $request->validate([
        'judul' => 'required',
        'konten' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
    ]);

    $data = $request->only(['judul', 'konten']);

    if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')
            ->store('berita', 'public');
    }
        Berita::create($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
        Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
        ->route('admin.berita.index')
        ->with('success', 'Berita berhasil dihapus');
    }
}
