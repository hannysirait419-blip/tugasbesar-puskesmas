@extends('admin.layouts.app')
@section('title', 'Data Pasien')
@section('page_title', 'Data Pasien')
@section('page_subtitle', 'Kelola data pasien Puskesmas')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4 class="fw-bold text-primary">Data Pasien</h4>
    <a href="{{ route('admin.pasien.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Pasien
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
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>L/P</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pasiens as $index => $pasien)
                <tr>
                    <td>{{ $pasiens->firstItem() + $index }}</td>
                    <td>{{ $pasien->nik }}</td>
                    <td>{{ $pasien->nama }}</td>
                    <td>{{ $pasien->tanggal_lahir->format('d/m/Y') }}</td>
                    <td>{{ $pasien->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $pasien->no_telepon ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.pasien.edit', $pasien) }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.pasien.destroy', $pasien) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus data pasien ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Belum ada data pasien</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $pasiens->links() }}
</div>
@endsection
