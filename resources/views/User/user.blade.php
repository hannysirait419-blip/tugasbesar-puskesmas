<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Warga - SIPUS Puskesmas</title>
    <!-- Link Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body { background-color: #f0fdf4; font-family: 'Segoe UI', sans-serif; }
        .puskesmas-bg { min-height: 100vh; padding-top: 50px; }
        .puskesmas-card { background: white; border: 1px solid #d1fae5; border-radius: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .btn-logout { background-color: white; color: #064e3b; border: 1px solid #d1fae5; font-weight: 600; padding: 0.5rem 1.2rem; border-radius: 12px; transition: 0.3s; }
        .btn-logout:hover { background-color: #f0fdf4; color: #dc3545; border-color: #f5c2c7; }
        .service-box { border-radius: 1.25rem; padding: 1.25rem; border: 1px solid; transition: 0.3s; cursor: pointer; height: 100%; }
        .service-box:hover { transform: translateY(-5px); box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .text-emerald-900 { color: #064e3b; }
        .text-emerald-700 { color: #065f46; opacity: 0.8; }
    </style>
</head>
<body>

<div class="puskesmas-bg">
    <div class="container" style="max-width: 1000px;">
        
        <!-- HEADER SECTION -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h1 class="h2 fw-bold text-emerald-900 mb-1">Portal Warga</h1>
                <p class="text-emerald-700">
                    Halo, <strong>{{ auth()->user()->username }}</strong> 
                    <span class="badge bg-success bg-opacity-10 text-success ms-2 px-3">Role: USER</span>
                </p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-logout shadow-sm">
                    <i class="bi bi-box-arrow-right me-2"></i>Keluar
                </button>
            </form>
        </div>

        <div class="row g-4">
            <!-- LAYANAN CEPAT -->
            <div class="col-md-7">
                <div class="puskesmas-card p-4">
                    <h5 class="fw-bold text-emerald-900 mb-4"><i class="bi bi-grid-fill me-2"></i>Layanan Cepat</h5>
                    <div class="row g-3">
                        <!-- Daftar Berobat -->
                        <div class="col-6">
                            <div class="service-box bg-success bg-opacity-10 border-success border-opacity-10">
                                <div class="fw-bold text-emerald-900">Daftar Berobat</div>
                                <div class="text-emerald-700 small mt-1">Ambil nomor antrean online</div>
                            </div>
                        </div>
                        <!-- Riwayat -->
                        <div class="col-6">
                            <div class="service-box bg-info bg-opacity-10 border-info border-opacity-10">
                                <div class="fw-bold text-emerald-900">Riwayat</div>
                                <div class="text-emerald-700 small mt-1">Lihat kunjungan & resep</div>
                            </div>
                        </div>
                        <!-- Jadwal Poli -->
                        <div class="col-6">
                            <div class="service-box bg-warning bg-opacity-10 border-warning border-opacity-10">
                                <div class="fw-bold text-emerald-900">Jadwal Poli</div>
                                <div class="text-emerald-700 small mt-1">Cek jam layanan dokter</div>
                            </div>
                        </div>
                        <!-- Profil -->
                        <div class="col-6">
                            <div class="service-box bg-white border-light shadow-sm">
                                <div class="fw-bold text-emerald-900">Profil Saya</div>
                                <div class="text-emerald-700 small mt-1">Update data diri & BPJS</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- INFORMASI SECTION -->
            <div class="col-md-5">
                <div class="puskesmas-card p-4 h-100">
                    <h5 class="fw-bold text-emerald-900 mb-3"><i class="bi bi-info-circle-fill me-2"></i>Informasi Hari Ini</h5>
                    <div class="list-group list-group-flush small">
                        <div class="list-group-item bg-transparent border-0 px-0 py-2">
                            <i class="bi bi-check2-circle text-success me-2"></i> Gunakan menu <b>Daftar Berobat</b> untuk mengambil antrean.
                        </div>
                        <div class="list-group-item bg-transparent border-0 px-0 py-2">
                            <i class="bi bi-check2-circle text-success me-2"></i> Pastikan data profil sudah sesuai kartu identitas.
                        </div>
                        <div class="list-group-item bg-transparent border-0 px-0 py-2">
                            <i class="bi bi-check2-circle text-success me-2"></i> Layanan darurat hubungi: <b>119</b>
                        </div>
                    </div>
                    
                    <div class="mt-auto pt-4">
                        <div class="p-3 rounded-4 bg-light text-center small text-muted">
                            Puskesmas melayani dengan Profesional & Empati
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>