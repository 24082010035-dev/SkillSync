<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MahasiswaProfile;
use App\Models\MentorProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Jurusan;

class AuthController extends Controller
{
    // =========================
    // HALAMAN REGISTER MAHASISWA
    // =========================
    public function showMahasiswaRegister()
    {
        $jurusan = Jurusan::all();

    return view('auth.daftar_mahasiswa', compact('jurusan'));
    }

    // =========================
    // PROSES REGISTER MAHASISWA
    // =========================
    public function registerMahasiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jurusan_id' => 'required',
            'angkatan' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // simpan user
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa',
        ]);
       

        // simpan profile mahasiswa
        MahasiswaProfile::create([
            'user_id' => $user->id,
            'jurusan_id' => $request->jurusan_id,
            'angkatan' => $request->angkatan,
        ]);

        return redirect('/login');
    }

    // =========================
    // HALAMAN REGISTER MENTOR
    // =========================
    public function showMentorRegister()
    {
        return view('auth.daftar_mentor');
    }

    // =========================
    // PROSES REGISTER MENTOR
    // =========================
    public function registerMentor(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'institusi' => 'required',
            'bidang_keahlian' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // simpan user
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mentor',
        ]);
        

        // simpan profile mentor
        MentorProfile::create([
            'user_id' => $user->id,
            'institusi' => $request->institusi,
            'bidang_keahlian' => $request->bidang_keahlian,
        ]);

        return redirect('/login')
            ->with('success', 'Registrasi mentor berhasil, silakan login.');
    }

    // =========================
    // HALAMAN LOGIN
    // =========================
    public function showLogin()
    {
        return view('auth.login_form');
    }

    // =========================
    // PROSES LOGIN
    // =========================
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {

            $request->session()->regenerate();

            // cek role
            if (Auth::user()->role == 'admin') {
                return redirect('/admin/dashboard');
            }

            if (Auth::user()->role == 'mentor') {
                return redirect('/mentor/dashboard');
            }

            if (Auth::user()->role == 'mahasiswa') {
                return redirect('/mahasiswa/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    // =========================
    // LOGOUT
    // =========================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}