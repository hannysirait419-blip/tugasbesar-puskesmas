<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f3f8f6;
            font-family: 'Segoe UI', sans-serif;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(90deg, #2ecc71, #27ae60);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .nav-link {
            color: #eafaf1 !important;
            font-weight: 500;
        }

        .nav-link.active,
        .nav-link:hover {
            color: #ffffff !important;
            text-decoration: underline;
        }

        /* Container */
        .content-wrapper {
            padding: 24px;
        }

        /* Sidebar */

        .sidebar {
            width: 260px;
            min-height: calc(100vh - 60px);
            background-color: #ffffff;
            border-right: 1px solid #e6e6e6;
        }

        .sidebar h6 {
            font-size: 12px;
            text-transform: uppercase;
            color: #95a5a6;
            margin-top: 20px;
        }

        .sidebar .nav-link {
            color: #2d3436;
            padding: 10px 16px;
            border-radius: 8px;
            font-weight: 500;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #e8f5ee;
            color: #27ae60;
        }

        /* Content */
        .content {
            padding: 24px;
            width: 100%;
        }
    </style>
</head>
<body>

{{-- TOP NAVBAR --}}
<div class="topbar d-flex align-items-center justify-content-between px-4">
    <strong>🏥 Sistem Informasi Puskesmas</strong>

    <div class="dropdown">
        <a class="text-white dropdown-toggle" href="#" data-bs-toggle="dropdown">
            Admin
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
        </ul>
    </div>
</div>

<div class="d-flex">

    {{-- SIDEBAR --}}
    <aside class="sidebar p-3">

        <h6>Menu Utama</h6>
        <ul class="nav flex-column gap-1">

            <li class="nav-item">
                <a href="/admin/dashboard"
                   class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/pengumuman"
                   class="nav-link {{ request()->is('admin/pengumuman*') ? 'active' : '' }}">
                    Pengumuman
                </a>
            </li>

            <li class="nav-item">
                <a href="/admin/galeri"
                   class="nav-link {{ request()->is('admin/galeri*') ? 'active' : '' }}">
                    Galeri Kegiatan
                </a>
            </li>

        </ul>

        <h6>Manajemen</h6>
        <ul class="nav flex-column gap-1">

            <li class="nav-item">
                <a href="#" class="nav-link">
                    Petugas
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    Laporan
                </a>
            </li>

        </ul>

    </aside>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark px-4">
    <a class="navbar-brand" href="/admin/dashboard">
        🏥 PUSKESMAS
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarAdmin">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarAdmin">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                   href="/admin/dashboard">
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/pengumuman*') ? 'active' : '' }}"
                   href="/admin/pengumuman">
                    Pengumuman
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/galeri*') ? 'active' : '' }}"
                   href="/admin/galeri">
                    Galeri
                </a>
            </li>

        </ul>

        {{-- USER --}}
        <div class="dropdown">
            <a class="btn btn-outline-light dropdown-toggle"
               href="#" role="button"
               data-bs-toggle="dropdown">
                Admin
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="#">
                        Profil
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="#">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- CONTENT --}}
<div class="content-wrapper">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
