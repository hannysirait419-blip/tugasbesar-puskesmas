@extends('admin.layouts.app')
@section('title', 'Edit Antrian')
@section('page_title', 'Edit Antrian')
@section('page_subtitle', 'Perbarui data antrian')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-soft p-4">
            <h5 class="fw-bold mb-4">Form Edit Antrian</h5>

            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.antrian.update', $antrian) }}" method="POST">
                @csrf @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nomor Antrian</label>
                        <input type="text" class="form-control" value="{{ $antrian->nomor_antrian }}" readonly disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="menunggu" {{ old('status', $antrian->status) == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="dipanggil" {{ old('status', $antrian->status) == 'dipanggil' ? 'selected' : '' }}>Dipanggil</option>
                            <option value="selesai" {{ old('status', $antrian->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="batal" {{ old('status', $antrian->status) == 'batal' ? 'selected' : '' }}>Batal</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pasien <span class="text-danger">*</span></label>
                        <select name="pasien_id" class="form-select" required>
                            <option value="">-- Pilih Pasien --</option>
                            @foreach($pasiens as $pasien)
                            <option value="{{ $pasien->id }}" {{ old('pasien_id', $antrian->pasien_id) == $pasien->id ? 'selected' : '' }}>
                                {{ $pasien->nama }} ({{ $pasien->nik }})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $antrian->tanggal->format('Y-m-d')) }}" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Keluhan <span class="text-danger">*</span></label>
                    <textarea name="keluhan" class="form-control" rows="4" required>{{ old('keluhan', $antrian->keluhan) }}</textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.antrian.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
