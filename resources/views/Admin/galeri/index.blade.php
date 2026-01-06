@extends('admin.layouts.app')
@section('title', 'Data Galeri')
@section('page_title', 'Data Galeri')
@section('page_subtitle', 'Kelola galeri foto Puskesmas')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4 class="fw-bold text-primary">Data Galeri</h4>
    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Galeri
    </a>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card card-soft">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Judul Kegiatan</th>
                    <th>Jumlah Foto</th>
                    <th>Preview</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeris as $index => $galeri)
                <tr>
                    <td>{{ $galeris->firstItem() + $index }}</td>
                    <td><strong>{{ $galeri->judul_kegiatan }}</strong></td>
                    <td><span class="badge bg-info">{{ $galeri->fotos->count() }} foto</span></td>
                    <td>
                        @if($galeri->fotos->count() > 0)
                        <div class="d-flex gap-1">
                            @foreach($galeri->fotos->take(3) as $foto)
                            <img src="{{ asset('storage/' . $foto->foto) }}" alt="Foto" class="rounded" style="height: 35px; width: 35px; object-fit: cover;">
                            @endforeach
                            @if($galeri->fotos->count() > 3)
                            <span class="badge bg-secondary d-flex align-items-center">+{{ $galeri->fotos->count() - 3 }}</span>
                            @endif
                        </div>
                        @else
                        <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $galeri->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.galeri.show', $galeri) }}" class="btn btn-outline-info btn-sm">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('admin.galeri.edit', $galeri) }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.galeri.destroy', $galeri) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus galeri ini beserta semua fotonya?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">Belum ada data galeri</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $galeris->links() }}
</div>
@endsection