<?php

use App\Http\Controllers\authController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/detail-jurusan', function () {
    return view('detail_jurusan');
});

Route::get('/login',[authController::class,'login_view']);
Route::post('/login_post',[authController::class,'login'])->name('login.post');
Route::get('/registrasi',[authController::class,'registrasi_view'])->name('registrasi_form');
Route::post('/registrasi_post',[authController::class,'registrasi'])->name('registrasi.post');