<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\DashboardController;
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


Route::get('/login',[authController::class,'login_view'])->name('login');
Route::post('/login_post',[authController::class,'login'])->name('login.post');
Route::get('/registrasi',[authController::class,'registrasi_view'])->name('registrasi_form');
Route::post('/registrasi_post',[authController::class,'registrasi'])->name('registrasi.post');
Route::post('/logout',[authController::class,'logout'])->name('logout');





Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');



