<?php

use App\Http\Controllers\addPoinController;
use App\Http\Controllers\adminApproveController;
use App\Http\Controllers\authController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CekKaryaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailJurusanController;
use App\Http\Controllers\FutureController;
use App\Http\Controllers\GuruProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KaryaSiswaController;
use App\Http\Controllers\kategoriBeritaController;
use App\Http\Controllers\kategoriKaryaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\NilaiExportController;
use App\Http\Controllers\NilaiUlanganController;
use App\Http\Controllers\profileGuruController;
use App\Http\Controllers\profileSiswaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaProfileController;
use App\Http\Controllers\UlanganController;
use App\Http\Controllers\siswaUploadKaryaController;
use App\Http\Controllers\TentangJurusanController;
use App\Http\Controllers\UserAproveController;
use App\Http\Controllers\UsersController;
use App\Models\guru_profile;
use App\Models\nilai_ulangan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-jurusan', [DetailJurusanController::class, 'index'])->name('detail.jurusan');
Route::get('/berita', [BeritaController::class, 'all'])->name('berita.all');
Route::get('/karya', [KaryaSiswaController::class, 'all'])->name('karya.all');
Route::get('/karya/{karya}', [KaryaSiswaController::class, 'show'])->name('karya.show');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/tentang-jurusan/{slug}', [LessonController::class, 'show'])->name('lesson.show');


Route::get('/kontak', function (){
    return view('kontak');
});


Route::post('/contact', [KontakController::class, 'send'])->name('contact.send');

// ================= Authentication ====================== //
Route::get('/login',[authController::class,'login_view'])->name('login');
Route::post('/login_post',[authController::class,'login'])->name('login.post');
Route::get('/registrasi',[authController::class,'registrasi_view'])->name('registrasi_form');
Route::post('/registrasi_post',[authController::class,'registrasi'])->name('registrasi.post');
Route::post('/logout',[authController::class,'logout'])->name('logout');
Route::get('/password/request', [authController::class,'requestForm']);
Route::post('/password/send-code', [authController::class,'sendCode'])->name('send.code');
Route::get('/password/verify', [authController::class,'verifyForm'])->name('verify.form');
Route::post('/password/reset', [authController::class,'resetPassword'])->name('reset.password');


Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('guru', GuruProfileController::class);
    Route::resource('siswa', SiswaProfileController::class);
    Route::resource('kelas', KelasController::class)->parameters([
        'kelas' => 'kelas'
    ]);
    Route::resource('karya', KaryaSiswaController::class)->except(['show'])->parameters(['karya' => 'karya']);
    Route::resource('kategoriKarya', kategoriKaryaController::class);
    Route::post('/karya/isPublised/{karya}', [KaryaSiswaController::class,'isPublish'])->name('karya.isPublised');
    Route::post('/karya/unPublised/{karya}', [KaryaSiswaController::class,'unPublish'])->name('karya.unPublised');
    Route::resource('user', UsersController::class);
    Route::get('/approved',[adminApproveController::class,'index'])->name('approved');
    Route::post('/user/{id}/approve', [adminApproveController::class, 'approve'])->name('user.approve');
    Route::post('/user/{id}/reject', [adminApproveController::class, 'reject'])->name('user.reject');
    Route::resource('berita', BeritaController::class)->except(['index', 'show'])->parameters(['berita' => 'berita']);;
    Route::get('berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::resource('kategoriBerita', kategoriBeritaController::class);
    Route::post('/users/{user}/add-point', [addPoinController::class, 'addPoin'])->name('users.addPoint');
    Route::delete('/users/{user}/delete-point', [addPoinController::class, 'decrement'])->name('users.deletePoint');
    Route::get('/users/addPoint',[addPoinController::class,'indexAddPoint'])->name('users.indexAddPoint');
    Route::resource('future', FutureController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('lesson', LessonController::class)->except(['show'])->parameters(['lesson' => 'lesson']);
});




Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::resource('/profileGuru', profileGuruController::class);
    Route::get('karya/siswa/{karya}', [CekKaryaController::class,'show'])->name('karya.siswa.show');
    Route::get('karya/index', [CekKaryaController::class,'index'])->name('karya.siswa.index');
});



Route::middleware(['auth'])->prefix('siswa')->name('siswa.')->group(function () {

    Route::get('/profile', [SiswaController::class, 'create'])->name('profile');
    Route::post('/profile/store', [SiswaController::class, 'store'])->name('siswa_profile.store');
    Route::resource('karya', siswaUploadKaryaController::class);
    Route::resource('/profileSiswa',profileSiswaController::class);

});

Route::middleware(['auth','role:guru'])->group(function () {
        Route::resource('ulangans', UlanganController::class);
        Route::patch('ulangans/{ulangan}/toggle-active', [UlanganController::class, 'toggleActive'])->name('ulangans.toggle-active');
        Route::post('/ulangan/{ulangan}/nilai', [NilaiUlanganController::class, 'store'])->name('nilai.store');
        Route::put('/nilai/{id}', [NilaiUlanganController::class, 'update'])->name('nilai.update');
        Route::get('/ulangans/{ulanganId}/nilai/edit', [NilaiUlanganController::class, 'edit'])->name('nilai.edit');
        Route::get('/nilai/ulangan/{ulanganId}', [NilaiUlanganController::class, 'show'])->name('nilai.show');
        Route::post('/nilai/update-massal', [NilaiUlanganController::class, 'bulkUpdate'])->name('nilai.bulkUpdate');
        Route::get('/nilai/export-excel/{ulanganId}', [NilaiExportController::class, 'export'])->name('nilai.export');
        Route::post('/nilai/import/{ulangan_id}', [NilaiUlanganController::class, 'importNilai'])->name('nilai.import');

});

Route::middleware(['auth','role:siswa'])->group(function () {
    Route::get('my-ulangans', [UlanganController::class, 'myUlangans'])->name('ulangans.my-ulangans');
    Route::get('ulangans/{ulangan}/access', [UlanganController::class, 'access'])->name('ulangans.access');
    Route::get('/nilai', [NilaiUlanganController::class, 'index'])->name('nilai.index');
    Route::get('/nilai/{ulanganId}', [NilaiUlanganController::class, 'showNilai'])->name('nilai.showNilai');
});






Route::get('ulangans/{ulangan}', [UlanganController::class, 'show'])->name('ulangans.show');

