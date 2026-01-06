<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Admin Puskesmas')</title>

  <!-- Bootstrap + Icons (CDN, tanpa Vite) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    :root{
      --puskesmas:#0ea5a4;       /* teal */
      --puskesmas-dark:#0b7f7e;
      --soft:#f4fbfb;
    }
    body{ background: #f6f8fb; }
    .brand{ background: linear-gradient(135deg,var(--puskesmas),var(--puskesmas-dark)); }
    .sidebar{ width: 260px; min-height: 100vh; }
    .sidebar .nav-link{ color:#eafefe; opacity:.92; border-radius:12px; padding:.55rem .75rem; }
    .sidebar .nav-link:hover{ background: rgba(255,255,255,.12); opacity:1; }
    .sidebar .nav-link.active{ background: rgba(255,255,255,.18); opacity:1; }
    .content-wrap{ min-height: 100vh; }
    .card-soft{ background: white; border: 0; border-radius: 18px; box-shadow: 0 8px 24px rgba(16,24,40,.08); }
    .badge-soft{ background: var(--soft); color: var(--puskesmas-dark); border: 1px solid rgba(14,165,164,.18); }
    .kpi-icon{
      width: 44px; height: 44px; border-radius: 14px;
      display:flex; align-items:center; justify-content:center;
      background: var(--soft); color: var(--puskesmas-dark);
      border: 1px solid rgba(14,165,164,.18);
      font-size: 1.25rem;
    }
    .btn-puskesmas{ background: var(--puskesmas); border:0; }
    .btn-puskesmas:hover{ background: var(--puskesmas-dark); }
  </style>

  @stack('css')
</head>
<body>
  <div class="d-flex">
    <!-- SIDEBAR -->
    <aside class="sidebar brand text-white p-3">
      <div class="d-flex align-items-center gap-2 mb-4">
        <div class="bg-white text-dark rounded-3 d-flex align-items-center justify-content-center" style="width:42px;height:42px">
          <i class="bi bi-hospital"></i>
        </div>
        <div>
          <div class="fw-bold">Admin Puskesmas</div>
          <small class="opacity-75">Panel Manajemen</small>
        </div>
      </div>

      <nav class="nav flex-column gap-1">
        <a class="nav-link active" href="{{ route('admin.dashboard') }}">
          <i class="bi bi-grid-1x2-fill me-2"></i> Dashboard
        </a>
        <a class="nav-link" href="{{ route('admin.berita.index') }}">
          <i class="bi bi-newspaper me-2"></i> Berita
        </a>
        <a class="nav-link" href="{{ route('admin.pengumuman.index') }}">
          <i class="bi bi-megaphone-fill me-2"></i> Pengumuman
        </a>
        <a class="nav-link" href="{{ route('admin.galeri.index') }}">
          <i class="bi bi-images me-2"></i> Galeri
        </a>
        <a class="nav-link" href="#">
          <i class="bi bi-people-fill me-2"></i> Pasien
        </a>
        <a class="nav-link" href="#">
          <i class="bi bi-calendar2-check-fill me-2"></i> Antrian/Janji
        </a>
        <a class="nav-link" href="#">
          <i class="bi bi-capsule-pill me-2"></i> Obat
        </a>
        <a class="nav-link" href="#">
          <i class="bi bi-gear-fill me-2"></i> Pengaturan
        </a>
      </nav>

      <hr class="border-white border-opacity-25 my-4">

      <div class="small opacity-75">
        © {{ date('Y') }} Puskesmas
      </div>
    </aside>

    <!-- CONTENT -->
    <main class="flex-grow-1 content-wrap">
      <!-- TOPBAR -->
      <div class="bg-white border-bottom">
        <div class="container-fluid py-3 px-4 d-flex align-items-center justify-content-between">
          <div>
            <div class="fw-semibold">@yield('page_title','Dashboard')</div>
            <small class="text-muted">@yield('page_subtitle','Ringkasan aktivitas dan data harian')</small>
          </div>

          <div class="d-flex align-items-center gap-3">
            <span class="badge badge-soft rounded-pill px-3 py-2">
              <i class="bi bi-clock me-1"></i> {{ now()->format('d M Y') }}
            </span>

            <div class="dropdown">
              <button class="btn btn-light border rounded-pill px-3" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle me-1"></i> Admin
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Pengaturan</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button class="dropdown-item text-danger" type="submit">
                      <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid p-4">
        @yield('content')
      </div>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  @stack('js')
</body>
</html>
