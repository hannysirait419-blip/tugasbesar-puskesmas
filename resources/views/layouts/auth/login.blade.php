<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIPUS Puskesmas</title>
    <!-- Pakai link CSS langsung biar nggak perlu ribet sama Vite/NPM -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .login-container { margin-top: 80px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .btn-success { background-color: #28a745; border: none; padding: 10px; font-weight: bold; }
        .btn-success:hover { background-color: #218838; }
        .brand-logo { color: #28a745; font-weight: bold; font-size: 2rem; }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="text-center mb-4">
                <div class="brand-logo">SIPUS</div>
                <p class="text-muted">Sistem Informasi Puskesmas</p>
            </div>
            
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="text-center mb-4">Silahkan Masuk</h5>

                    <!-- Menampilkan Error jika login gagal -->
                    @if($errors->any())
                        <div class="alert alert-danger py-2 small">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <!-- Pesan sukses jika baru daftar -->
                    @if(session('success'))
                        <div class="alert alert-success py-2 small">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('login.proses') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label small" for="remember">Ingat Saya</label>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Masuk</button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="small text-muted">Belum punya akun? <a href="{{ route('register') }}" class="text-success text-decoration-none fw-bold">Daftar Sekarang</a></p>
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