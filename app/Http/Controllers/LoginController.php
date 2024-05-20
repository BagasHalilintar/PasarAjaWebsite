<?php

namespace App\Http\Controllers;


use App\Models\WebUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $user = WebUser::where('email', $request->email)->first();
// dd($user);
        if ($user && Hash::check($request->password, $user->password)) {
            // Auth::login($user);
            return redirect('/layouts/index')->with('success', 'Pengguna berhasil didaftarkan. Silakan login.');
        }else{

        return back()->with('error', 'Username atau Password Salah, Coba Lagi');
        }
    }



    // Proses logout
    public function logout()
    {
        // Auth::logout();

        return redirect()->route('loginview');
    }
}
