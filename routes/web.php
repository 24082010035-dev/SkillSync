<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\MahasiswaRegisterController;
use App\Http\Controllers\Mahasiswa\DashboardMahasiswaController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Mentor\MentorDashboardController;
use App\Models\MahasiswaProfile;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\QuestionController;
use App\Models\HasilTes;
use App\Http\Controllers\Admin\SoalKepribadianController;
use App\Http\Controllers\Admin\KategoriKepribadianController;


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

Route::get('/skills', [SkillController::class, 'index'])
    ->name('skills.index');
/*
| Pilih Tes
*/
Route::get('/mahasiswa/pilih-tes', function () {
    return view('mahasiswa.pilih_tes');
})->middleware('auth')->name('pilih.tes');

Route::get('/mahasiswa/tes-kepribadian', function () {
    return "Halaman Tes Kepribadian";
})->middleware('auth')->name('tes.kepribadian');

Route::get('/pilih-tes-skill', [SkillController::class, 'index'])
    ->name('tes.skill');

Route::get('/skill/{skill}/soal/{nomor?}', [QuestionController::class, 'show'])
    ->name('skill.soal');

Route::post('/skill/{skill}/soal/{nomor}', [QuestionController::class, 'submit'])
    ->name('skill.submit');

Route::get('/hasil-tes/{hasilTes}', function (App\Models\HasilTes $hasilTes) {

    $detailSkill = $hasilTes->detailSkills()->with('skill')->first();

    return view('mahasiswa.hasil_tes', compact(
        'hasilTes',
        'detailSkill'
    ));

})->name('hasil.tes');

/*
| kelola soal kepribadian (admin)
*/
Route::middleware('auth')->group(function () {

    Route::get(
        '/admin/soal-kepribadian',
        [SoalKepribadianController::class, 'index']
    )->name('soal.index');

    Route::get(
        '/admin/soal-kepribadian/create',
        [SoalKepribadianController::class, 'create']
    )->name('soal.create');

    Route::post(
        '/admin/soal-kepribadian/store',
        [SoalKepribadianController::class, 'store']
    )->name('soal.store');

    Route::get(
        '/admin/soal-kepribadian/edit/{id}',
        [SoalKepribadianController::class, 'edit']
    )->name('soal.edit');

    Route::put(
        '/admin/soal-kepribadian/update/{id}',
        [SoalKepribadianController::class, 'update']
    )->name('soal.update');

    Route::delete(
        '/admin/soal-kepribadian/delete/{id}',
        [SoalKepribadianController::class, 'destroy']
    )->name('soal.delete');
});
Route::get(
    '/admin/soal-kepribadian',
    [SoalKepribadianController::class, 'index']
)->middleware('auth')
 ->name('soal.index');

 Route::get(
    '/admin/kategori-kepribadian',
    [KategoriKepribadianController::class, 'index']
)->name('kategori.index');


