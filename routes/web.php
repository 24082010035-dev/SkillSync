<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\MahasiswaRegisterController;
use App\Http\Controllers\Mahasiswa\DashboardMahasiswaController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Mentor\MentorDashboardController;
use App\Models\MahasiswaProfile;

Route::get('/tes-relasi', function () {

    $profile = MahasiswaProfile::first();

    dd(
        $profile->jurusan->nama_jurusan
    );
});

/*
| LANDING PAGE
*/

Route::get('/', function () {
    return view('landing.index');
});

/*
| PILIH ROLE
*/

Route::view('/pilih-role', 'auth.pilih_role')
    ->name('pilih.role');

/*
| REGISTER MAHASISWA
*/

Route::get('/daftar-mahasiswa', [MahasiswaRegisterController::class, 'create'])
    ->name('daftar.mahasiswa');

Route::post('/daftar-mahasiswa', [MahasiswaRegisterController::class, 'store'])
    ->name('daftar.mahasiswa.store');

/*
| REGISTER MENTOR
*/

Route::get('/daftar-mentor', [AuthController::class, 'showMentorRegister'])
    ->name('daftar.mentor');

Route::post('/daftar-mentor', [AuthController::class, 'registerMentor'])
    ->name('mentor.register');

/*
| LOGIN
*/

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->name('login.process');

/*
| LOGOUT
*/

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
| DASHBOARD
*/

Route::get('/mahasiswa/dashboard', [DashboardMahasiswaController::class, 'index'])
    ->middleware('auth')
    ->name('mahasiswa.dashboard');

Route::get('/mentor/dashboard', [MentorDashboardController::class, 'index'])
    ->middleware('auth');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('auth');

/*
| Pilih Tes
*/
Route::get('/mahasiswa/pilih-tes', function () {
    return view('mahasiswa.pilih_tes');
})->middleware('auth')->name('pilih.tes');

Route::get('/mahasiswa/tes-kepribadian', function () {
    return "Halaman Tes Kepribadian";
})->middleware('auth')->name('tes.kepribadian');

Route::get('/mahasiswa/tes-skill', function () {
    return "Halaman Tes Skill";
})->middleware('auth')->name('tes.skill');