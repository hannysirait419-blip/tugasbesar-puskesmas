<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Warga - SIPUS</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body { background-color: #f0fdf4; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .puskesmas-bg { min-height: 100vh; padding-top: 40px; }
        .puskesmas-card { background: white; border: 1px solid #d1fae5; border-radius: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
        .btn-emerald { background-color: white; color: #064e3b; border: 1px solid #ecfdf5; font-weight: 600; padding: 0.5rem 1.5rem; border-radius: 1rem; transition: 0.3s; }
        .btn-emerald:hover { background-color: #ecfdf5; }
        .service-box { border-radius: 1.25rem; padding: 1.25rem; border: 1px solid; transition: 0.2s; cursor: pointer; }
        .service-box:hover { transform: translateY(-3px); }
        .text-emerald-900 { color: #064e3b; }
        .text-emerald-700 { color: #065f46; opacity: 0.8; }
    </style>
</head>
<body>

<div class="puskesmas-bg">
    <div class="container" style="max-width: 1100px;">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h1 class="h3 fw-bold text-emerald-900 mb-1">Portal Warga</h1>
                <p class="small text-emerald-700">Halo, <strong>{{ auth()->user()->username }}</strong> • role: <span class="badge bg-success">USER</span></p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-emerald shadow-sm">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                </button>
            </form>
        </div>

        <div class="row g-4">
            <!-- Layanan Cepat -->
            <div class="col-md-7">
                <div class="puskesmas-card p-4 h-100">
                    <h5 class="fw-bold text-emerald-900 mb-4">Layanan Cepat</h5>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="service-box bg-success bg-opacity-10 border-success border-opacity-10">
                                <div class="fw-bold text-emerald-900 small">Daftar Berobat</div>
                                <div class="text-emerald-700 mt-1" style="font-size: 0.75rem;">Ambil nomor antrean</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="service-box bg-info bg-opacity-10 border-info border-opacity-10">
                                <div class="fw-bold text-emerald-900 small">Riwayat</div>
                                <div class="text-emerald-700 mt-1" style="font-size: 0.75rem;">Kunjungan & resep</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="service-box bg-warning bg-opacity-10 border-warning border-opacity-10">
                                <div class="fw-bold text-emerald-900 small">Jadwal Poli</div>
                                <div class="text-emerald-700 mt-1" style="font-size: 0.75rem;">Lihat jam layanan</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="service-box bg-white border-light shadow-sm">
                                <div class="fw-bold text-emerald-900 small">Profil</div>
                                <div class="text-emerald-700 mt-1" style="font-size: 0.75rem;">Data peserta</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi -->
            <div class="col-md-5">
                <div class="puskesmas-card p-4 h-100">
                    <h5 class="fw-bold text-emerald-900 mb-3">Informasi Hari Ini</h5>
                    <ul class="list-unstyled text-emerald-700 small lh-lg">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Gunakan menu <b>Daftar Berobat</b> untuk mengambil antrean</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Pastikan data diri benar sebelum konfirmasi</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Jika butuh bantuan, hubungi loket pendaftaran</li>
                    </ul>
                    <div class="mt-4 p-3 rounded-4 bg-light text-center">
                        <small class="text-muted">Layanan Call Center: <br><strong>(021) 123-4567</strong></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>