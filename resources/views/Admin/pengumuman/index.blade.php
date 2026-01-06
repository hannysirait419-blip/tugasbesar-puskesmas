@extends('admin.layouts.app')
@section('title', 'Data Pengumuman')
@section('page_title', 'Data Pengumuman')
@section('page_subtitle', 'Kelola pengumuman Puskesmas')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4 class="fw-bold text-primary">Data Pengumuman</h4>
    <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Pengumuman
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
                    <th>Isi</th>
                    <th>File</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengumumans as $index => $pengumuman)
                <tr>
                    <td>{{ $pengumumans->firstItem() + $index }}</td>
                    <td><strong>{{ $pengumuman->judul }}</strong></td>
                    <td><small class="text-muted">{{ Str::limit($pengumuman->isi, 50) }}</small></td>
                    <td>
                        @if($pengumuman->file)
                        <a href="{{ asset('storage/' . $pengumuman->file) }}" target="_blank" class="btn btn-outline-info btn-sm">
                            <i class="bi bi-file-earmark"></i> Lihat
                        </a>
                        @else
                        <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $pengumuman->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.pengumuman.edit', $pengumuman) }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.pengumuman.destroy', $pengumuman) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus pengumuman ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">Belum ada data pengumuman</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $pengumumans->links() }}
</div>
@endsection