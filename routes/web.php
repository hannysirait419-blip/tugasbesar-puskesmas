<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Import Controller Utama
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// USER controllers
use App\Http\Controllers\User\ProfilController as UserProfilController;
use App\Http\Controllers\User\BeritaController as UserBeritaController;
use App\Http\Controllers\User\GaleriController as UserGaleriController;
use App\Http\Controllers\User\PengumumanController as UserPengumumanController;

// ADMIN controllers
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\PengumumanController as AdminPengumumanController;
use App\Http\Controllers\Admin\ProfilWebController as AdminProfilWebController;
use App\Http\Controllers\Admin\PasienController as AdminPasienController;
use App\Http\Controllers\Admin\AntrianController as AdminAntrianController;
use App\Http\Controllers\Admin\ObatController as AdminObatController;

/*
|--------------------------------------------------------------------------
| 1. AREA TAMU (Belum Login)
|--------------------------------------------------------------------------
| Jika belum login, pengunjung hanya bisa melihat halaman Login & Register.
*/
Route::middleware('guest')->group(function () {
    // Jika akses alamat utama tapi belum login, langsung dilempar ke login
    Route::get('/', function () {
        return redirect()->route('login');
    });

    // TAMBAHKAN KODE INI DI SINI UNTUK MENGHILANGKAN ERROR REDIRECT
    Route::get('/berita-detail/{id}', function() {
        return redirect()->route('berita.index');
    })->name('berita.show');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.proses');
});

/*
|--------------------------------------------------------------------------
| 2. AREA TERKUNCI (Wajib Login)
|--------------------------------------------------------------------------
| Semua route di bawah ini hanya bisa dibuka jika sudah login.
*/
Route::middleware(['auth'])->group(function () {

    // --- HALAMAN UTAMA WEBSITE ---
    // Sekarang setelah login, alamat "/" akan menampilkan Beranda (HomeController)
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Halaman Publik Website (Hanya bisa dilihat setelah login)
    Route::get('/profil', [UserProfilController::class, 'index'])->name('profil');
    Route::get('/berita', [App\Http\Controllers\User\BeritaController::class, 'index'])->name('berita.index');
    // Tambahkan Galeri & Pengumuman jika controllernya sudah ada:
    // Route::get('/galeri', [UserGaleriController::class, 'index'])->name('galeri.index');
    // Route::get('/pengumuman', [UserPengumumanController::class, 'index'])->name('pengumuman.index');
    Route::get('/galeri', [UserGaleriController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/{id}', [UserGaleriController::class, 'show'])->name('galeri.show');
    Route::get('/pengumuman', [UserPengumumanController::class, 'index'])->name('pengumuman.index');
    Route::get('/pengumuman/{id}', [UserPengumumanController::class, 'show'])->name('pengumuman.show');
    // --- LOGOUT ---
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // --- DASHBOARD DISPATCHER ---
    // Tombol untuk mengarahkan ke halaman internal (Portal Warga / Admin Panel)
    Route::get('/dashboard', function () {
        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.dashboard');
    })->name('dashboard');

    // --- AREA USER (Portal Warga) ---
    Route::get('/user/dashboard', function () {
        return view('User.user'); 
    })->name('user.dashboard');

    // --- AREA ADMIN (Panel Manajemen) ---
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('Admin.dashboard'); 
        })->name('dashboard');

        Route::resource('berita', AdminBeritaController::class);
        Route::resource('galeri', AdminGaleriController::class);
        Route::delete('/galeri/foto/{foto}', [AdminGaleriController::class, 'destroyFoto'])->name('galeri.foto.destroy');
        Route::resource('pengumuman', AdminPengumumanController::class);
        Route::get('/profil-website', [AdminProfilWebController::class, 'index'])->name('profilweb.index');
        
        // New Admin Routes
        Route::resource('pasien', AdminPasienController::class);
        Route::resource('antrian', AdminAntrianController::class);
        Route::patch('/antrian/{antrian}/status', [AdminAntrianController::class, 'updateStatus'])->name('antrian.status');
        Route::resource('obat', AdminObatController::class);
    });

    // Profile Settings (Bawaan)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});