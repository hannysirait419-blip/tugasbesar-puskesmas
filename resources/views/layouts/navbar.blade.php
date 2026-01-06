<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- SISI KIRI: Menu Navigasi -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
    
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('home') }}" class="nav-link">
        <i class="fas fa-home"></i> Home
      </a>
    </li>

    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('galeri.index') }}" class="nav-link">Galeri</a>
    </li>

    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('pengumuman.index') }}" class="nav-link">Pengumuman</a>
    </li>
  </ul>

  <!-- SISI KANAN: User & Logout -->
  <ul class="navbar-nav ml-auto">
    <!-- Tombol Dashboard (Ke Portal Warga / Admin Panel) -->
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('dashboard') }}" class="nav-link text-success fw-bold">
        <i class="fas fa-tachometer-alt"></i> Dashboard
      </a>
    </li>

    <!-- Nama User & Logout Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i> {{ auth()->user()->username }}
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-header">Manajemen Akun</span>
        <div class="dropdown-divider"></div>
        
        <!-- Tombol Logout -->
        <a href="#" class="dropdown-item text-danger" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>

        <!-- Form Hidden Logout (Wajib di Laravel) -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
    </li>
  </ul>
</nav>