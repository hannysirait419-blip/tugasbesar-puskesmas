@extends('admin.layouts.app')
@section('title', 'Antrian')
@section('page_title', 'Antrian / Janji')
@section('page_subtitle', 'Kelola antrian dan janji pasien')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h4 class="fw-bold text-primary">Antrian Hari Ini</h4>
    <a href="{{ route('admin.antrian.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Antrian
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
                    <th>No. Antrian</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal</th>
                    <th>Keluhan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($antrians as $antrian)
                <tr>
                    <td><span class="badge bg-primary">{{ $antrian->nomor_antrian }}</span></td>
                    <td>{{ $antrian->pasien->nama ?? '-' }}</td>
                    <td>{{ $antrian->tanggal->format('d/m/Y') }}</td>
                    <td>{{ Str::limit($antrian->keluhan, 50) }}</td>
                    <td>
                        @switch($antrian->status)
                            @case('menunggu')
                                <span class="badge bg-warning text-dark">Menunggu</span>
                                @break
                            @case('dipanggil')
                                <span class="badge bg-info">Dipanggil</span>
                                @break
                            @case('selesai')
                                <span class="badge bg-success">Selesai</span>
                                @break
                            @case('batal')
                                <span class="badge bg-danger">Batal</span>
                                @break
                        @endswitch
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="dropdown">
                                <i class="bi bi-arrow-repeat"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><h6 class="dropdown-header">Ubah Status</h6></li>
                                <li>
                                    <form action="{{ route('admin.antrian.status', $antrian) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="menunggu">
                                        <button class="dropdown-item">Menunggu</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.antrian.status', $antrian) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="dipanggil">
                                        <button class="dropdown-item">Dipanggil</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.antrian.status', $antrian) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="selesai">
                                        <button class="dropdown-item">Selesai</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="{{ route('admin.antrian.status', $antrian) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="batal">
                                        <button class="dropdown-item text-danger">Batal</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <a href="{{ route('admin.antrian.edit', $antrian) }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.antrian.destroy', $antrian) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Hapus antrian ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">Belum ada antrian</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $antrians->links() }}
</div>
@endsection
