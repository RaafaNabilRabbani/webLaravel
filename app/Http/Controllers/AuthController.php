<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Menampilkan form register
    public function showRegister()
    {
        return view('auth.register');
    }

    // 2. Memproses data dari form register
    public function processRegister(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        // Simpan user ke database dengan password yang dienkripsi (Hash)
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Setelah sukses mendaftar, arahkan ke halaman login
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // 3. Menampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // 4. Memproses pencocokan data login
    public function processLogin(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Coba login dengan mencocokkan email & password di database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home'); // Jika berhasil, masuk ke home
        }

        // Jika gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // 5. Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}