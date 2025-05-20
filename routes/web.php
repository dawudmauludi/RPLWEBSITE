<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/detail-jurusan', function () {
    return view('detail_jurusan');
});
