<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Tampilkan Halaman Login
    public function showLogin() {
        return view('auth.login');
    }

    // 2. Tampilkan Halaman Register
    public function showRegister() {
        return view('auth.register');
    }

    // 3. Proses Login
    public function login(Request $request) {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);

        // Coba Login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect berdasarkan role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            
            return redirect()->intended('/'); 
        }

        // Jika gagal, balikkan ke login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password yang Anda masukkan salah!',
        ])->withInput(); 
    }

    // 4. Proses Register
    public function register(Request $request)
    {
        // Validasi form
        $request->validate([
            'username' => 'required|string|unique:users|min:3|max:20',
            'password' => 'required|min:6|confirmed', 
        ]);

        // Simpan ke database
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'user', 
        ]);

        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan masuk menggunakan akun baru Anda.');
    }

    // 5. Proses Logout
    public function logout(Request $request) {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Setelah logout kembali ke halaman login
        return redirect('/login')->with('success', 'Anda telah berhasil keluar.');
    }
}