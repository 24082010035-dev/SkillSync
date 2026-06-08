<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\MahasiswaRegisterController;
use App\Http\Controllers\Mahasiswa\DashboardMahasiswaController;
use App\Http\Controllers\Admin\AdminDashboardController;

use App\Http\Controllers\Mentor\PenilaianProjectController;


use App\Http\Controllers\Mentor\MentorDashboardController;
use App\Models\MahasiswaProfile;

use App\Http\Controllers\SkillController;
use App\Http\Controllers\QuestionController;
use App\Models\HasilTes;
use App\Http\Controllers\Admin\SoalKepribadianController;
use App\Http\Controllers\Admin\KategoriKepribadianController;

use App\Models\SoalKepribadian;
use App\Http\Controllers\KepribadianController;

use App\Http\Controllers\SyncPathController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Mentor\UploadProyekMentorController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SyncInsightController;
use App\Http\Controllers\SyncCareerMatchController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\Admin\PertanyaanKepribadianController;
use App\Http\Controllers\Admin\OpsiKepribadianController;
use App\Http\Controllers\Admin\BobotKepribadianController;
use App\Http\Controllers\Admin\SkillManagementController;

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
    ->middleware('auth')
    ->name('mentor.dashboard');
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('auth')
     ->name('admin.dashboard');

Route::get('/skills', [SkillController::class, 'index'])
    ->name('skills.index');
/*
| Pilih Tes
*/
Route::get('/mahasiswa/pilih-tes', function () {
    return view('mahasiswa.pilih_tes');
})->middleware('auth')->name('pilih.tes');


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
Route::get('/skill/{skill}/start', [QuestionController::class, 'start'])
    ->name('skill.start');

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

Route::get('/mahasiswa/tes-kepribadian', [KepribadianController::class, 'start'])
    ->middleware('auth')
    ->name('tes.kepribadian.start');
 Route::get('/mahasiswa/tes-kepribadian/{nomor?}', [KepribadianController::class, 'show'])
    ->middleware('auth')
    ->name('tes.kepribadian');
Route::post('/mahasiswa/tes-kepribadian/{nomor}', [KepribadianController::class, 'submit'])
    ->middleware('auth')
    ->name('tes.kepribadian.submit');
Route::get(
    '/hasil-kepribadian/{hasilTes}',
    [KepribadianController::class, 'hasil']
)->middleware('auth')
 ->name('hasil.kepribadian');

Route::get(
    '/admin/kategori-kepribadian/create',
    [KategoriKepribadianController::class, 'create']
)->name('kategori.create');

Route::post(
    '/admin/kategori-kepribadian/store',
    [KategoriKepribadianController::class, 'store']
)->name('kategori.store');

Route::get(
    '/admin/kategori-kepribadian/edit/{id}',
    [KategoriKepribadianController::class, 'edit']
)->name('kategori.edit');

Route::put(
    '/admin/kategori-kepribadian/update/{id}',
    [KategoriKepribadianController::class, 'update']
)->name('kategori.update');

Route::delete(
    '/admin/kategori-kepribadian/delete/{id}',
    [KategoriKepribadianController::class, 'destroy']
)->name('kategori.delete');

Route::get(
    '/admin/pertanyaan-kepribadian',
    [PertanyaanKepribadianController::class, 'index']
)->name('pertanyaan.index');

Route::get(
    '/admin/pertanyaan-kepribadian/create',
    [PertanyaanKepribadianController::class, 'create']
)->name('pertanyaan.create');

Route::post(
    '/admin/pertanyaan-kepribadian/store',
    [PertanyaanKepribadianController::class, 'store']
)->name('pertanyaan.store');

Route::get(
    '/admin/pertanyaan-kepribadian/edit/{id}',
    [PertanyaanKepribadianController::class, 'edit']
)->name('pertanyaan.edit');

Route::put(
    '/admin/pertanyaan-kepribadian/update/{id}',
    [PertanyaanKepribadianController::class, 'update']
)->name('pertanyaan.update');

Route::delete(
    '/admin/pertanyaan-kepribadian/delete/{id}',
    [PertanyaanKepribadianController::class, 'destroy']
)->name('pertanyaan.delete');

Route::get(
    '/admin/opsi-kepribadian',
    [OpsiKepribadianController::class, 'index']
)->name('opsi.index');

Route::get(
    '/admin/opsi-kepribadian/create',
    [OpsiKepribadianController::class, 'create']
)->name('opsi.create');

Route::post(
    '/admin/opsi-kepribadian/store',
    [OpsiKepribadianController::class, 'store']
)->name('opsi.store');

Route::get(
    '/admin/opsi-kepribadian/edit/{id}',
    [OpsiKepribadianController::class, 'edit']
)->name('opsi.edit');

Route::put(
    '/admin/opsi-kepribadian/update/{id}',
    [OpsiKepribadianController::class, 'update']
)->name('opsi.update');

Route::delete(
    '/admin/opsi-kepribadian/delete/{id}',
    [OpsiKepribadianController::class, 'destroy']
)->name('opsi.delete');

Route::delete(
    '/admin/opsi-kepribadian/delete/{id}',
    [OpsiKepribadianController::class, 'destroy']
)->name('opsi.delete');


Route::get(
    '/admin/bobot-kepribadian',
    [BobotKepribadianController::class, 'index']
)->name('bobot.index');

Route::get(
    '/admin/bobot-kepribadian/create',
    [BobotKepribadianController::class, 'create']
)->name('bobot.create');

Route::post(
    '/admin/bobot-kepribadian/store',
    [BobotKepribadianController::class, 'store']
)->name('bobot.store');

Route::get(
    '/admin/bobot-kepribadian/edit/{id}',
    [BobotKepribadianController::class, 'edit']
)->name('bobot.edit');

Route::put(
    '/admin/bobot-kepribadian/update/{id}',
    [BobotKepribadianController::class, 'update']
)->name('bobot.update');

Route::delete(
    '/admin/bobot-kepribadian/delete/{id}',
    [BobotKepribadianController::class, 'destroy']
)->name('bobot.delete');


/*
| kelola manajemen skill (admin)
*/
Route::get(
    '/admin/skill',
    [SkillManagementController::class, 'index']
)->name('skill.index');

Route::get(
    '/admin/skill/create',
    [SkillManagementController::class, 'create']
)->name('skill.create');

Route::post(
    '/admin/skill/store',
    [SkillManagementController::class, 'store']
)->name('skill.store');

Route::get(
    '/admin/skill/edit/{id}',
    [SkillManagementController::class, 'edit']
)->name('skill.edit');

Route::put(
    '/admin/skill/update/{id}',
    [SkillManagementController::class, 'update']
)->name('skill.update');

Route::delete(
    '/admin/skill/delete/{id}',
    [SkillManagementController::class, 'destroy']
)->name('skill.delete');


 /*
| SyncPath
*/
Route::get('/syncpath', [SyncPathController::class, 'start'])
    ->middleware('auth')
    ->name('syncpath.start');

Route::get('/syncpath/question/{number?}', [SyncPathController::class, 'question'])
    ->middleware('auth')
    ->name('syncpath.question');

Route::post('/syncpath/submit/{question_id}', [SyncPathController::class, 'submit'])
    ->middleware('auth')
    ->name('syncpath.submit');

Route::get('/syncpath/result', [SyncPathController::class, 'result'])
    ->middleware('auth')
    ->name('syncpath.result');

/*
|--------------------------------------------------------------------------
| KATEGORI KEPRIBADIAN
|--------------------------------------------------------------------------
*/
Route::get('/admin/kategori-kepribadian', [KategoriKepribadianController::class, 'index'])
    ->name('kategori.index');

//UPLOAD PROYEK
Route::get('/mahasiswa/upload-project', [ProjectController::class, 'create'])
    ->middleware('auth')
    ->name('project.create');

Route::post('/mahasiswa/upload-project', [ProjectController::class, 'store'])
    ->middleware('auth')
    ->name('project.store');    
Route::get('/mahasiswa/repository', [ProjectController::class, 'repository'])
    ->middleware('auth')

    ->name('repository.saya');
        
Route::get(
    '/mentor/project/{id}',
    [PenilaianProjectController::class, 'show']
)->name('mentor.project.show');

Route::post(
    '/mentor/project/{id}/nilai',
    [PenilaianProjectController::class, 'store']
)->name('mentor.project.nilai');    

Route::get('/mahasiswa/project/edit/{id}', [ProjectController::class, 'edit'])
    ->middleware('auth')
    ->name('project.edit');

Route::put('/mahasiswa/project/update/{id}', [ProjectController::class, 'update'])
    ->middleware('auth')
    ->name('project.update');   
Route::delete('/mahasiswa/project/delete/{id}', [ProjectController::class, 'destroy'])
    ->middleware('auth')
    ->name('project.delete');
/*
|--------------------------------------------------------------------------
| SYNCINSIGHT (Peta Kompetensi)
|--------------------------------------------------------------------------
*/
Route::get('/syncinsight', [SyncInsightController::class, 'index'])
    ->middleware('auth')
    ->name('syncinsight');


Route::post(
    '/project/{id}/kirim-mentor',
    [ProjectController::class, 'kirimKeMentor']
)->name('project.kirimMentor');

Route::get(
    '/syncinsight/export-pdf',
    [SyncInsightController::class, 'exportPdf']
)->name('syncinsight.export.pdf');

/*
|--------------------------------------------------------------------------
| SyncCreerMatch (Rekomendasi Career)
|--------------------------------------------------------------------------
*/
Route::get(
    '/synccareermatch',
    [SyncCareerMatchController::class, 'index']
)->name('synccareermatch');

/*
|--------------------------------------------------------------------------
| Kelola Soal Kompetensi
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\QuestionManagementController;

Route::get('/admin/soal-skill', [QuestionManagementController::class, 'index'])
    ->name('admin.soal.index');

Route::get('/admin/soal-skill/create', [QuestionManagementController::class, 'create'])
    ->name('admin.soal.create');

Route::post('/admin/soal-skill/store', [QuestionManagementController::class, 'store'])
    ->name('admin.soal.store');

Route::get('/admin/soal-skill/edit/{id}', [QuestionManagementController::class, 'edit'])
    ->name('admin.soal.edit');

Route::put('/admin/soal-skill/update/{id}', [QuestionManagementController::class, 'update'])
    ->name('admin.soal.update');

Route::delete('/admin/soal-skill/delete/{id}', [QuestionManagementController::class, 'destroy'])
    ->name('admin.soal.delete');

/*
|--------------------------------------------------------------------------
| User Manajement
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])
    ->prefix('admin')
    ->group(function () {

        Route::resource('users', UserController::class);

    });