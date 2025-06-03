<?php

namespace App\Http\Controllers;

use App\Models\karya_siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekKaryaController extends Controller
{

    public function index()
    {
         $query = karya_siswa::query();

        if ($search = request('search')) {
            $query->where(function ($q) use ($search) {
            $q->where('judul', 'like', "%{$search}%")
              ->orWhere('judul', 'like', "%{$search}%");
            });
        }

        $karyas = $query->paginate(10)->withQueryString();

        return view('dashboard.guru.karya.index', compact('karyas'));
    }


    public function show(karya_siswa $karya)
    {
        if(!Auth::user()->hasRole('guru')){
            abort(403);
        }

        $karya = karya_siswa::with(['category', 'dokumentasi', 'tools', 'fiturKarya'])->findOrFail($karya->id);
        return view('dashboard.guru.karya.show', compact('karya'));
        
    }
}
