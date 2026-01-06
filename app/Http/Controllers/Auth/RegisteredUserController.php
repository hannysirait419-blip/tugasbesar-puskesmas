<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Tampilkan halaman register.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Proses pendaftaran akun.
     */
    public function store(Request $request): RedirectResponse
    {
       
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Simpan ke database
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'user', // Set default role sebagai user
        ]);

        event(new Registered($user));

        // Langsung login setelah daftar
        Auth::login($user);

        // Arahkan ke dashboard
        return redirect()->route('dashboard');
    }
}