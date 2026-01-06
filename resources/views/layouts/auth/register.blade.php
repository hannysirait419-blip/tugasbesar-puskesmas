<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - SIPUS Puskesmas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .register-container { margin-top: 60px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .btn-success { background-color: #28a745; border: none; padding: 10px; font-weight: bold; }
        .btn-success:hover { background-color: #218838; }
        .brand-logo { color: #28a745; font-weight: bold; font-size: 2rem; }
    </style>
</head>
<body>

<div class="container register-container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="text-center mb-4">
                <div class="brand-logo">SIPUS</div>
                <p class="text-muted">Sistem Informasi Puskesmas</p>
            </div>
            
            <div class="card">
                <div class="card-header bg-white border-0 pt-4">
                    <h5 class="text-center fw-bold">Daftar Akun Baru</h5>
                </div>
                <div class="card-body p-4">
                    
                    <!-- Menampilkan Error jika registrasi gagal -->
                    @if($errors->any())
                        <div class="alert alert-danger py-2 small">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('register.proses') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Pilih username" value="{{ old('username') }}" required autofocus>
                            <div class="form-text" style="font-size: 0.75rem;">Username akan digunakan untuk login.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Daftar Sekarang</button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="small text-muted">Sudah punya akun? <a href="{{ route('login') }}" class="text-success text-decoration-none fw-bold">Login di sini</a></p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4 text-muted small">
                &copy; 2026 SIPUS - Pelayanan Profesional & Empati
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>