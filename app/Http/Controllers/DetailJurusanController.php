<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class DetailJurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('detail_jurusan', compact('jurusans'));
    }
}
