<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Puskesmas')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f6faf9;
            color: #2d3436;
        }

        .navbar {
            backdrop-filter: blur(10px);
        }

        .hero {
            padding: 140px 0 100px;
            background:
                radial-gradient(circle at top left, #e8f8f5, transparent 60%),
                radial-gradient(circle at bottom right, #d1f2eb, transparent 60%);
        }

        .badge-health {
            background: #eafaf6;
            color: #0f9b8e;
            font-weight: 500;
        }

        .section-title {
            font-weight: 700;
        }

        .service-card {
            border: none;
            border-radius: 20px;
            padding: 30px;
            background: white;
            transition: all .3s ease;
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 45px rgba(0,0,0,.08);
        }

        .service-icon {
            font-size: 32px;
            color: #0f9b8e;
            margin-bottom: 15px;
        }

        .info-strip {
            background: linear-gradient(90deg, #0f9b8e, #2ecc71);
            color: white;
            border-radius: 25px;
            padding: 40px;
        }

        footer {
            background: #ffffff;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-success" href="/">Puskesmas</a>
        <ul class="navbar-nav ms-auto gap-3">
            <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="/profil">Profil</a></li>
            <li class="nav-item"><a class="nav-link" href="/berita">Berita</a></li>
            <li class="nav-item"><a class="nav-link" href="/pengumuman">Pengumuman</a></li>
            <li class="nav-item"><a class="nav-link" href="/galeri">Galeri</a></li>
        </ul>
    </div>
</nav>

@yield('content')

<footer class="py-4 mt-5">
    <div class="container text-center text-muted">
        © {{ date('Y') }} Puskesmas — Pelayanan Kesehatan Masyarakat
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
