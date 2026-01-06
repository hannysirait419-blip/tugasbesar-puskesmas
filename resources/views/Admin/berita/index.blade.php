@extends('admin.layouts.app')
@section('title', 'Data Berita')
@section('page_title', 'Data Berita')
@section('page_subtitle', 'Kelola berita Puskesmas')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4 class="fw-bold text-primary">Data Berita</h4>
    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Berita
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
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritas as $index => $berita)
                <tr>
                    <td>{{ $beritas->firstItem() + $index }}</td>
                    <td>
                        <strong>{{ $berita->judul }}</strong>
                        <br><small class="text-muted">{{ Str::limit($berita->konten, 60) }}</small>
                    </td>
                    <td>
                        @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar" class="rounded" style="height: 40px; width: 60px; object-fit: cover;">
                        @else
                        <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $berita->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus berita ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">Belum ada data berita</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $beritas->links() }}
</div>
@endsection
