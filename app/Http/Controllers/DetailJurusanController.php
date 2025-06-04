<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Development;
use App\Models\Jurusan;
use App\Models\Language;
use App\Models\Lesson;
use Illuminate\Http\Request;

class DetailJurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        $lessons = Lesson::all();
        $languages = Language::all();
        $careers = Career::all();
        $developments = Development::with(['listDevelopment'])->get();
        return view('detail_jurusan', compact('jurusans', 'lessons', 'developments','languages','careers'));
    }
}
