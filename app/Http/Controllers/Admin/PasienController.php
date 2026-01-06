<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::latest()->paginate(10);
        return view('admin.pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('admin.pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|size:16|unique:pasiens',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_telepon' => 'nullable|string|max:15',
            'golongan_darah' => 'nullable|in:A,B,AB,O',
        ]);

        Pasien::create($request->all());

        return redirect()
            ->route('admin.pasien.index')
            ->with('success', 'Data pasien berhasil ditambahkan');
    }

    public function edit(Pasien $pasien)
    {
        return view('admin.pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nik' => 'required|string|size:16|unique:pasiens,nik,' . $pasien->id,
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_telepon' => 'nullable|string|max:15',
            'golongan_darah' => 'nullable|in:A,B,AB,O',
        ]);

        $pasien->update($request->all());

        return redirect()
            ->route('admin.pasien.index')
            ->with('success', 'Data pasien berhasil diperbarui');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()
            ->route('admin.pasien.index')
            ->with('success', 'Data pasien berhasil dihapus');
    }
}
