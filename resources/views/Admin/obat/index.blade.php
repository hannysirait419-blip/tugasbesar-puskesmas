@extends('admin.layouts.app')
@section('title', 'Data Obat')
@section('page_title', 'Data Obat')
@section('page_subtitle', 'Kelola stok obat Puskesmas')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4 class="fw-bold text-primary">Data Obat</h4>
    <a href="{{ route('admin.obat.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Obat
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
                    <th>Kode</th>
                    <th>Nama Obat</th>
                    <th>Jenis</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($obats as $obat)
                <tr>
                    <td><code>{{ $obat->kode }}</code></td>
                    <td>{{ $obat->nama }}</td>
                    <td>{{ $obat->jenis ?? '-' }}</td>
                    <td>{{ $obat->satuan }}</td>
                    <td>
                        @if($obat->stok <= 10)
                        <span class="badge bg-danger">{{ $obat->stok }}</span>
                        @elseif($obat->stok <= 50)
                        <span class="badge bg-warning text-dark">{{ $obat->stok }}</span>
                        @else
                        <span class="badge bg-success">{{ $obat->stok }}</span>
                        @endif
                    </td>
                    <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.obat.edit', $obat) }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.obat.destroy', $obat) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus data obat ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Belum ada data obat</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $obats->links() }}
</div>
@endsection
