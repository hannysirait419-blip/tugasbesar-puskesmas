@extends('admin.layouts.app')
@section('title', 'Detail Galeri')
@section('page_title', 'Detail Galeri')
@section('page_subtitle', 'Lihat foto-foto kegiatan')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <div>
        <h4 class="fw-bold text-primary">{{ $galeri->judul_kegiatan }}</h4>
        <small class="text-muted">{{ $galeri->created_at->format('d M Y') }} • {{ $galeri->fotos->count() }} foto</small>
    </div>
    <div>
        <a href="{{ route('admin.galeri.edit', $galeri) }}" class="btn btn-outline-primary">
            <i class="bi bi-pencil me-1"></i> Edit
        </a>
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card card-soft p-4">
    @if($galeri->fotos->count() > 0)
    <div class="row g-3">
        @foreach($galeri->fotos as $foto)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="position-relative">
                <a href="{{ asset('storage/' . $foto->foto) }}" target="_blank">
                    <img src="{{ asset('storage/' . $foto->foto) }}" alt="Foto" class="img-fluid rounded shadow-sm" style="height: 180px; width: 100%; object-fit: cover;">
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center text-muted py-5">
        <i class="bi bi-images" style="font-size: 3rem;"></i>
        <p class="mt-2">Belum ada foto dalam galeri ini</p>
    </div>
    @endif
</div>
@endsection
