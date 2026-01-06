@extends('admin.layouts.app')
@section('title', 'Edit Berita')
@section('page_title', 'Edit Berita')
@section('page_subtitle', 'Perbarui berita')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-soft p-4">
            <h5 class="fw-bold mb-4">Form Edit Berita</h5>

            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">Judul Berita <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $berita->judul) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Konten <span class="text-danger">*</span></label>
                    <textarea name="konten" class="form-control" rows="8" required>{{ old('konten', $berita->konten) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Gambar</label>
                    @if($berita->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar berita" class="img-thumbnail" style="max-height: 150px;">
                        <small class="d-block text-muted">Gambar saat ini</small>
                    </div>
                    @endif
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar. Format: JPG, PNG, JPEG. Max: 2MB</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
