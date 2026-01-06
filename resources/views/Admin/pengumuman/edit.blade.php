@extends('admin.layouts.app')
@section('title', 'Edit Pengumuman')
@section('page_title', 'Edit Pengumuman')
@section('page_subtitle', 'Perbarui pengumuman')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-soft p-4">
            <h5 class="fw-bold mb-4">Form Edit Pengumuman</h5>

            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.pengumuman.update', $pengumuman) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">Judul Pengumuman <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $pengumuman->judul) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Isi Pengumuman <span class="text-danger">*</span></label>
                    <textarea name="isi" class="form-control" rows="6" required>{{ old('isi', $pengumuman->isi) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">File Lampiran</label>
                    @if($pengumuman->file)
                    <div class="mb-2">
                        <a href="{{ asset('storage/' . $pengumuman->file) }}" target="_blank" class="btn btn-outline-info btn-sm">
                            <i class="bi bi-file-earmark me-1"></i> Lihat File Saat Ini
                        </a>
                    </div>
                    @endif
                    <input type="file" name="file" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file. Format: PDF, DOC, DOCX, JPG, PNG. Max: 2MB</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
