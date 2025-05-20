<?php

use App\Http\Controllers\authController;
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


Route::get('/login',[authController::class,'login_view']);
Route::post('/login_post',[authController::class,'login'])->name('login.post');
Route::get('/registrasi',[authController::class,'registrasi_view'])->name('registrasi_form');
Route::post('/registrasi_post',[authController::class,'registrasi'])->name('registrasi.post');
Route::post('/logout',[authController::class,'logout'])->name('logout');


Route::get('/dashboard', function () {
    $user = Auth::user();
    if($user->hasRole('admin')) {
        return view('dashboard.admin');
    } elseif ($user->hasRole('guru')) {
        return view('dashboard.guru');
    } elseif ($user->hasRole('siswa')) {
        return view('dashboard.siswa');
    } else {
        abort(403, 'Unauthorized');
    }
})->name('dashboard')->middleware('auth');
