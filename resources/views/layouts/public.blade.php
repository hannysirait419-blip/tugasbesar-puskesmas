<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Puskesmas Sehat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f9f8;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background: linear-gradient(90deg, #1b8f6a, #2dbfa4);
        }
        .navbar-brand {
            font-weight: bold;
            color: #fff !important;
        }
        footer {
            background: #1b8f6a;
            color: #fff;
            margin-top: 80px;
        }
        .section-title {
            border-left: 6px solid #1b8f6a;
            padding-left: 12px;
            font-weight: bold;
        }

        .navbar .nav-link {
            color: #e8f5f1;
            margin-left: 12px;
            font-weight: 500;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #ffffff;
            border-bottom: 2px solid #ffffff;
        }

    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">
            🏥 Puskesmas Sehat
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarPublic">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarPublic">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('profil*') ? 'active' : '' }}" 
                    href="{{ route('profile.index') }}">
                        Profil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('layanan*') ? 'active' : '' }}" href="#">
                        Layanan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pengumuman*') ? 'active' : '' }}"
                       href="{{ route('Pengumuman.index') }}">
                        Pengumuman
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('galeri*') ? 'active' : '' }}" 
                    href="{{ route('galeri.index') }}">
                        Galeri
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('kontak*') ? 'active' : '' }}" href="#">
                        Kontak
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>


<div class="container my-5">
    @yield('content')
</div>

<footer class="py-4 text-center">
    <small>© {{ date('Y') }} Puskesmas Sehat — Pelayanan Kesehatan Masyarakat</small>
</footer>

</body>
</html>
