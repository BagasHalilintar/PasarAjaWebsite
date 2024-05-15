<?php

namespace App\Http\Controllers;


use App\Models\WebUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)

    {
        // Validasi input pengguna
        $request->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Buat pengguna baru berdasarkan input
        $user = WebUser::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Jika pengguna berhasil dibuat, arahkan ke halaman login dengan pesan sukses
        if ($user) {
            return redirect('/layouts/index')->with('success', 'Pengguna berhasil didaftarkan. Silakan login.');
            // echo 'User Berhasil Login';
        }

        // Jika terjadi kesalahan, kembali ke halaman pendaftaran dengan pesan error
        // return back()->withErrors(['error' => 'Gagal membuat pengguna. Silakan coba lagi.']);
    }



    // Proses logout
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
