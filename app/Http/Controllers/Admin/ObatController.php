<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::latest()->paginate(10);
        return view('admin.obat.index', compact('obats'));
    }

    public function create()
    {
        return view('admin.obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:20|unique:obats',
            'nama' => 'required|string|max:255',
            'jenis' => 'nullable|string|max:255',
            'satuan' => 'required|string|max:50',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        Obat::create($request->all());

        return redirect()
            ->route('admin.obat.index')
            ->with('success', 'Data obat berhasil ditambahkan');
    }

    public function edit(Obat $obat)
    {
        return view('admin.obat.edit', compact('obat'));
    }

    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'kode' => 'required|string|max:20|unique:obats,kode,' . $obat->id,
            'nama' => 'required|string|max:255',
            'jenis' => 'nullable|string|max:255',
            'satuan' => 'required|string|max:50',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $obat->update($request->all());

        return redirect()
            ->route('admin.obat.index')
            ->with('success', 'Data obat berhasil diperbarui');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect()
            ->route('admin.obat.index')
            ->with('success', 'Data obat berhasil dihapus');
    }
}
