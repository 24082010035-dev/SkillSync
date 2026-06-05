<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    // tampil halaman login
    public function index()
    {
        return view('auth.login');
    }

    // proses login
    public function authenticate(Request $request)
    {
        // validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // remember me
        $remember = $request->has('remember');

        // cek login
        if (Auth::attempt($credentials, $remember)) {

            // regenerate session
            $request->session()->regenerate();

            // ambil data user login
            $user = Auth::user();

            // simpan session
            session([
                'nama_user' => $user->nama,
                'role_user' => $user->role,
            ]);

            // simpan cookie 30 hari
           Cookie::queue('user_email', $user->email, 60 * 24 * 30);

            // redirect sesuai role
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard')
                    ->with('success', 'Login berhasil!');
            }

            if ($user->role === 'mentor') {
                return redirect('/mentor/dashboard')
                    ->with('success', 'Login berhasil!');
            }

            if ($user->role === 'mahasiswa') {
                return redirect('/mahasiswa/dashboard')
                    ->with('success', 'Login berhasil!');
            }
            // kalau role tidak ada
            Auth::logout();

            return back()->withErrors([
                'email' => 'Role tidak dikenali.',
            ]);
        }

        // login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}