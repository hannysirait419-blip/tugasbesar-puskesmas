@extends('Admin.layouts.app') {{-- Pastikan path-nya benar ke folder Admin/layouts/app --}}

@section('title', 'Dashboard - Admin Puskesmas')
@section('page_title', 'Dashboard Utama')
@section('page_subtitle', 'Selamat datang kembali, ' . auth()->user()->username)

@section('content')
<div class="row g-4">
    <!-- Card Statistik 1 -->
    <div class="col-md-3">
        <div class="card card-soft p-4">
            <div class="d-flex align-items-center gap-3">
                <div class="kpi-icon">
                    <i class="bi bi-newspaper"></i>
                </div>
                <div>
                    <div class="small text-muted">Total Berita</div>
                    <div class="h4 fw-bold mb-0">12</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Statistik 2 -->
    <div class="col-md-3">
        <div class="card card-soft p-4">
            <div class="d-flex align-items-center gap-3">
                <div class="kpi-icon">
                    <i class="bi bi-megaphone"></i>
                </div>
                <div>
                    <div class="small text-muted">Pengumuman</div>
                    <div class="h4 fw-bold mb-0">5</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan konten lainnya di sini -->
    <div class="col-12 mt-4">
        <div class="card card-soft p-4">
            <h5>Aktivitas Terbaru</h5>
            <p class="text-muted small">Daftar kegiatan yang baru saja dilakukan di sistem.</p>
            <table class="table table-hover mt-3">
                <thead class="table-light">
                    <tr>
                        <th>Waktu</th>
                        <th>Aktivitas</th>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Baru saja</td>
                        <td>Login ke sistem</td>
                        <td>{{ auth()->user()->username }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection