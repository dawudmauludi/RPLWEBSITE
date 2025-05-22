<?php

use App\Http\Controllers\authController;
<<<<<<< Updated upstream
<<<<<<< Updated upstream
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruProfileController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaProfileController;
use App\Http\Controllers\UserAproveController;
use App\Models\guru_profile;
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/detail-jurusan', function () {
    return view('detail_jurusan');
});

<<<<<<< Updated upstream
<<<<<<< Updated upstream



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

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('guru', GuruProfileController::class);
    Route::resource('siswa', SiswaProfileController::class);
     Route::resource('kelas', KelasController::class)->parameters([
        'kelas' => 'kelas' 
    ]);
});

Route::middleware(['auth', 'role:siswa'])->group(function () {
   Route::get('/siswa/profile',[SiswaController::class,'create'])->name('siswa.profile');
   Route::post('/siswa/profile/store',[SiswaController::class,'store'])->name('siswa_profile.store');
});


Route::middleware(['auth'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/',[UserAproveController::class,'index'])->name('approved');
    Route::post('/guru/user/{id}/approve', [UserAproveController::class, 'approve'])->name('user.approve');
    Route::post('/guru/user/{id}/reject', [UserAproveController::class, 'reject'])->name('user.reject');
});





=======
Route::get('/login',[authController::class,'login_view']);
Route::post('/login_post',[authController::class,'login'])->name('login.post');
Route::get('/registrasi',[authController::class,'registrasi_view'])->name('registrasi_form');
Route::post('/registrasi_post',[authController::class,'registrasi'])->name('registrasi.post');
>>>>>>> Stashed changes
=======
Route::get('/login',[authController::class,'login_view']);
Route::post('/login_post',[authController::class,'login'])->name('login.post');
Route::get('/registrasi',[authController::class,'registrasi_view'])->name('registrasi_form');
Route::post('/registrasi_post',[authController::class,'registrasi'])->name('registrasi.post');
>>>>>>> Stashed changes
