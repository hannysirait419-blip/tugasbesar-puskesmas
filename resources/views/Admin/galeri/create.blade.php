@extends('admin.layouts.app')
@section('title', 'Tambah Galeri')
@section('page_title', 'Tambah Galeri')
@section('page_subtitle', 'Tambah galeri foto baru')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-soft p-4">
            <h5 class="fw-bold mb-4">Form Tambah Galeri</h5>

            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Judul Kegiatan <span class="text-danger">*</span></label>
                    <input type="text" name="judul_kegiatan" class="form-control" value="{{ old('judul_kegiatan') }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Upload Foto <span class="text-danger">*</span></label>
                    <input type="file" name="fotos[]" class="form-control" accept="image/*" multiple required>
                    <small class="text-muted">Pilih beberapa foto sekaligus. Format: JPG, PNG, JPEG. Max: 2MB per file</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
