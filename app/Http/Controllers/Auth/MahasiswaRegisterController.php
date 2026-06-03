<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Jurusan;
use App\Models\MahasiswaProfile;

use Illuminate\Support\Facades\Hash;

class MahasiswaRegisterController extends Controller
{
    // Menampilkan halaman form
   public function create()
    {
        $jurusan = Jurusan::all();

        return view('auth.daftar_mahasiswa', compact('jurusan'));
    }

    // Menyimpan data register
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'jurusan_id' => 'required',
            'angkatan' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Simpan ke tabel users
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa',
        ]);

        // Simpan ke tabel mahasiswa_profiles
        MahasiswaProfile::create([
            'user_id' => $user->id,
            'jurusan_id' => $request->jurusan_id,
            'angkatan' => $request->angkatan,
        ]);

        // Redirect ke login
        return redirect()->route('login');
    }
}