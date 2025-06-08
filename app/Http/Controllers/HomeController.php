<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\category_berita;
use App\Models\Future;
use App\Models\Jurusan;
use App\Models\Kaprodi;
use App\Models\karya_siswa;
use App\Models\Lesson;
use App\Models\master_image;
use App\Models\ulasan_alumni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'desc');
        $beritas = berita::orderBy('created_at', $sort)->paginate(6);
        $categories = category_berita::all();
        $karyas = karya_siswa::with(['category', 'dokumentasi', 'tools', 'fiturKarya'])->where('is_publised', true)->latest()->paginate(6);
        $futures = Future::all();
        $jurusans = Jurusan::all();
        $lessons = Lesson::all();
        $kaprodis = Kaprodi::all();
        $ulasans = ulasan_alumni::with(['user', 'like'])->latest()->get();
        $master_images = master_image::all();

        return view('home', compact(
            'beritas', 'categories', 'sort', 'karyas',
            'futures', 'jurusans', 'lessons', 'kaprodis', 'ulasans', 'master_images'
        ));
    }
}
