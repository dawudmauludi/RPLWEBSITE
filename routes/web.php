<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruProfileController;
use App\Http\Controllers\kategoriKaryaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaProfileController;
use App\Http\Controllers\UserAproveController;
use App\Http\Controllers\UsersController;
use App\Models\guru_profile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [BeritaController::class, 'home'])->name('berita.home');
Route::get('/home', [BeritaController::class, 'home'])->name('berita.home');



Route::get('/detail-jurusan', function () {
    return view('detail_jurusan');
});

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

Route::get('/berita', [BeritaController::class, 'all'])->name('berita.all');

Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('guru', GuruProfileController::class);
    Route::resource('siswa', SiswaProfileController::class);
    Route::resource('kelas', KelasController::class)->parameters([
        'kelas' => 'kelas'
    ]);

    Route::resource('user', UsersController::class);
    Route::get('/approved',[UserAproveController::class,'index'])->name('approved');
    Route::post('/user/{id}/approve', [UserAproveController::class, 'approve'])->name('user.approve');
    Route::post('/user/{id}/reject', [UserAproveController::class, 'reject'])->name('user.reject');

    Route::resource('berita', BeritaController::class)->except(['index', 'show'])->parameters(['berita' => 'berita']);;
    Route::get('berita', [BeritaController::class, 'index'])->name('berita.index');

});




Route::middleware(['auth'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/',[UserAproveController::class,'index'])->name('approved');
    Route::post('/guru/user/{id}/approve', [UserAproveController::class, 'approve'])->name('user.approve');
    Route::post('/guru/user/{id}/reject', [UserAproveController::class, 'reject'])->name('user.reject');
    Route::resource('kategoriKarya', kategoriKaryaController::class);
});


Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/siswa/profile', [SiswaController::class, 'create'])->name('siswa.profile');
    Route::post('/siswa/profile/store', [SiswaController::class, 'store'])->name('siswa_profile.store');
});
