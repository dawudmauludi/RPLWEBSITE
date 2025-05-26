<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\category_berita;
use App\Models\karya_siswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'desc');
        $beritas = berita::orderBy('created_at', $sort)->paginate(6);
        $categories = category_berita::all();
        $karyas = karya_siswa::with(['category', 'dokumentasi', 'tools', 'fiturKarya'])->latest()->paginate(6);
        return view('home', compact('beritas', 'categories', 'sort', 'karyas'));
    }
}
