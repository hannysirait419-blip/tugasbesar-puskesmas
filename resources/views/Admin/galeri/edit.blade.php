@extends('admin.layouts.app')
@section('title', 'Edit Galeri')
@section('page_title', 'Edit Galeri')
@section('page_subtitle', 'Perbarui galeri dan kelola foto')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card card-soft p-4">
            <h5 class="fw-bold mb-4">Form Edit Galeri</h5>

            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <form action="{{ route('admin.galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label">Judul Kegiatan <span class="text-danger">*</span></label>
                    <input type="text" name="judul_kegiatan" class="form-control" value="{{ old('judul_kegiatan', $galeri->judul_kegiatan) }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Foto Saat Ini</label>
                    @if($galeri->fotos->count() > 0)
                    <div class="row g-2">
                        @foreach($galeri->fotos as $foto)
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="position-relative">
                                <img src="{{ asset('storage/' . $foto->foto) }}" alt="Foto" class="img-fluid rounded" style="height: 100px; width: 100%; object-fit: cover;">
                                <form action="{{ route('admin.galeri.foto.destroy', $foto) }}" method="POST" class="position-absolute top-0 end-0 m-1">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus foto ini?')">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-muted">Belum ada foto</p>
                    @endif
                </div>

                <div class="mb-4">
                    <label class="form-label">Tambah Foto Baru</label>
                    <input type="file" name="fotos[]" class="form-control" accept="image/*" multiple>
                    <small class="text-muted">Pilih beberapa foto sekaligus untuk ditambahkan. Format: JPG, PNG, JPEG. Max: 2MB per file</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
