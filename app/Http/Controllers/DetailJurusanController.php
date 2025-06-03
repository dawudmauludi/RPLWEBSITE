<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Lesson;
use Illuminate\Http\Request;

class DetailJurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        $lessons = Lesson::all();
        return view('detail_jurusan', compact('jurusans', 'lessons'));
    }
}
