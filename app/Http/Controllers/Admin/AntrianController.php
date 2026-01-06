<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Antrian;
use App\Models\Pasien;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index()
    {
        $antrians = Antrian::with('pasien')->latest()->paginate(10);
        return view('admin.antrian.index', compact('antrians'));
    }

    public function create()
    {
        $pasiens = Pasien::orderBy('nama')->get();
        return view('admin.antrian.create', compact('pasiens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'tanggal' => 'required|date',
            'keluhan' => 'required|string',
        ]);

        // Generate nomor antrian
        $today = $request->tanggal;
        $lastAntrian = Antrian::whereDate('tanggal', $today)->orderBy('id', 'desc')->first();
        $nomorUrut = $lastAntrian ? (int)substr($lastAntrian->nomor_antrian, -3) + 1 : 1;
        $nomorAntrian = 'A' . date('Ymd', strtotime($today)) . str_pad($nomorUrut, 3, '0', STR_PAD_LEFT);

        Antrian::create([
            'pasien_id' => $request->pasien_id,
            'nomor_antrian' => $nomorAntrian,
            'tanggal' => $request->tanggal,
            'keluhan' => $request->keluhan,
            'status' => 'menunggu',
        ]);

        return redirect()
            ->route('admin.antrian.index')
            ->with('success', 'Antrian berhasil ditambahkan');
    }

    public function edit(Antrian $antrian)
    {
        $pasiens = Pasien::orderBy('nama')->get();
        return view('admin.antrian.edit', compact('antrian', 'pasiens'));
    }

    public function update(Request $request, Antrian $antrian)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'tanggal' => 'required|date',
            'keluhan' => 'required|string',
            'status' => 'required|in:menunggu,dipanggil,selesai,batal',
        ]);

        $antrian->update($request->all());

        return redirect()
            ->route('admin.antrian.index')
            ->with('success', 'Antrian berhasil diperbarui');
    }

    public function destroy(Antrian $antrian)
    {
        $antrian->delete();

        return redirect()
            ->route('admin.antrian.index')
            ->with('success', 'Antrian berhasil dihapus');
    }

    public function updateStatus(Request $request, Antrian $antrian)
    {
        $request->validate([
            'status' => 'required|in:menunggu,dipanggil,selesai,batal',
        ]);

        $antrian->update(['status' => $request->status]);

        return redirect()
            ->back()
            ->with('success', 'Status antrian berhasil diperbarui');
    }
}
