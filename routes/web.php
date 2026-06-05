<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\MahasiswaRegisterController;

use App\Http\Controllers\Mahasiswa\DashboardMahasiswaController;
use App\Http\Controllers\Mentor\MentorDashboardController;
use App\Http\Controllers\Mentor\UploadProyekMentorController;
use App\Http\Controllers\Admin\AdminDashboardController;

use App\Http\Controllers\SkillController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;

use App\Http\Controllers\SyncPathController;

use App\Http\Controllers\Admin\SoalKepribadianController;
use App\Http\Controllers\Admin\KategoriKepribadianController;

use App\Models\MahasiswaProfile;
use App\Models\HasilTes;

/*
|--------------------------------------------------------------------------
| TEST RELASI
|--------------------------------------------------------------------------
*/
Route::get('/tes-relasi', function () {
    $profile = MahasiswaProfile::first();
    dd($profile->jurusan->nama_jurusan);
});

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing.index');
});

/*
|--------------------------------------------------------------------------
| PILIH ROLE
|--------------------------------------------------------------------------
*/
Route::view('/pilih-role', 'auth.pilih_role')->name('pilih.role');

/*
|--------------------------------------------------------------------------
| REGISTER MAHASISWA
|--------------------------------------------------------------------------
*/
Route::get('/daftar-mahasiswa', [MahasiswaRegisterController::class, 'create'])
    ->name('daftar.mahasiswa');

Route::post('/daftar-mahasiswa', [MahasiswaRegisterController::class, 'store'])
    ->name('daftar.mahasiswa.store');

/*
|--------------------------------------------------------------------------
| REGISTER MENTOR
|--------------------------------------------------------------------------
*/
Route::get('/daftar-mentor', [AuthController::class, 'showMentorRegister'])
    ->name('daftar.mentor');

Route::post('/daftar-mentor', [AuthController::class, 'registerMentor'])
    ->name('mentor.register');

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.process');

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/mahasiswa/dashboard', [DashboardMahasiswaController::class, 'index'])
    ->middleware('auth')
    ->name('mahasiswa.dashboard');

Route::get('/mentor/dashboard', [MentorDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('mentor.dashboard');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| SKILLS
|--------------------------------------------------------------------------
*/
Route::get('/skills', [SkillController::class, 'index'])
    ->name('skills.index');

/*
|--------------------------------------------------------------------------
| SYNPATH (TES ARAH KARIR) 🚀
|--------------------------------------------------------------------------
*/
Route::get('/syncpath', [SyncPathController::class, 'start'])
    ->middleware('auth')
    ->name('syncpath.start');
Route::get('/syncpath', [SyncPathController::class, 'start'])->name('syncpath.start');
Route::get('/syncpath/question/{number?}', [SyncPathController::class, 'question'])->name('syncpath.question');
Route::post('/syncpath/submit/{question_id}', [SyncPathController::class, 'submit'])->name('syncpath.submit');
Route::get('/syncpath/result', [SyncPathController::class, 'result'])->name('syncpath.result');    

/*
|--------------------------------------------------------------------------
| UPLOAD PROYEK MENTOR
|--------------------------------------------------------------------------
*/
Route::get('/mentor/upload-proyek', [UploadProyekMentorController::class, 'create'])
    ->middleware('auth')
    ->name('mentor.upload.proyek');

Route::post('/mentor/upload-proyek', [UploadProyekMentorController::class, 'store'])
    ->middleware('auth')
    ->name('mentor.upload.proyek.store');

Route::get('/mentor/upload-proyek/edit/{id}', [UploadProyekMentorController::class, 'edit'])
    ->middleware('auth')
    ->name('mentor.upload.proyek.edit');

Route::put('/mentor/upload-proyek/update/{id}', [UploadProyekMentorController::class, 'update'])
    ->middleware('auth')
    ->name('mentor.upload.proyek.update');

Route::get('/mentor/upload-proyek/show/{id}', [UploadProyekMentorController::class, 'show'])
    ->middleware('auth')
    ->name('mentor.upload.proyek.show');

Route::delete('/mentor/upload-proyek/delete/{id}', [UploadProyekMentorController::class, 'destroy'])
    ->middleware('auth')
    ->name('mentor.upload.proyek.delete');

/*
|--------------------------------------------------------------------------
| TEST SYSTEM (GENERAL)
|--------------------------------------------------------------------------
*/
Route::get('/tes/{slug}', [TestController::class, 'show'])
    ->middleware('auth')
    ->name('tes.show');

Route::post('/tes/{slug}', [TestController::class, 'submit'])
    ->middleware('auth')
    ->name('tes.submit');

Route::get('/tes/{slug}/result', [TestController::class, 'result'])
    ->middleware('auth')
    ->name('tes.result');

/*
|--------------------------------------------------------------------------
| SKILL TEST
|--------------------------------------------------------------------------
*/
Route::get('/pilih-tes-skill', [SkillController::class, 'index'])
    ->name('tes.skill');

Route::get('/skill/{skill}/soal/{nomor?}', [QuestionController::class, 'show'])
    ->name('skill.soal');

Route::post('/skill/{skill}/soal/{nomor}', [QuestionController::class, 'submit'])
    ->name('skill.submit');

/*
|--------------------------------------------------------------------------
| HASIL TES
|--------------------------------------------------------------------------
*/
Route::get('/hasil-tes/{hasilTes}', function (HasilTes $hasilTes) {

    $detailSkill = $hasilTes->detailSkills()->with('skill')->first();

    return view('mahasiswa.hasil_tes', compact('hasilTes', 'detailSkill'));

})->name('hasil.tes');

/*
|--------------------------------------------------------------------------
| ADMIN SOAL KEPRIBADIAN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/admin/soal-kepribadian', [SoalKepribadianController::class, 'index'])
        ->name('soal.index');

    Route::get('/admin/soal-kepribadian/create', [SoalKepribadianController::class, 'create'])
        ->name('soal.create');

    Route::post('/admin/soal-kepribadian/store', [SoalKepribadianController::class, 'store'])
        ->name('soal.store');

    Route::get('/admin/soal-kepribadian/edit/{id}', [SoalKepribadianController::class, 'edit'])
        ->name('soal.edit');

    Route::put('/admin/soal-kepribadian/update/{id}', [SoalKepribadianController::class, 'update'])
        ->name('soal.update');

    Route::delete('/admin/soal-kepribadian/delete/{id}', [SoalKepribadianController::class, 'destroy'])
        ->name('soal.delete');
});

/*
|--------------------------------------------------------------------------
| KATEGORI KEPRIBADIAN
|--------------------------------------------------------------------------
*/
Route::get('/admin/kategori-kepribadian', [KategoriKepribadianController::class, 'index'])
    ->name('kategori.index');