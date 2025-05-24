<?php

namespace App\Http\Controllers;

use App\Models\category_karya;
use Illuminate\Http\Request;

class kategoriKaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $query = category_karya::query();

        if ($search = request('search')) {
            $query->where(function ($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%");
            });
        }

        $kategoris = $query->paginate(20)->withQueryString();

        return view('dashboard.guru.kategoriKarya.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('dashboard.guru.kategoriKarya.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required|string|max:255',
    ]);

    $kategori = category_karya::create([
        'nama' => $request->nama,
    ]);
    $kategori->save();
    return redirect()->route('guru.kategoriKarya.index')->with('success', 'kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $kategori = category_karya::findOrFail($id);
        return view('dashboard.guru.kategoriKarya.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = category_karya::findOrFail($id);
         $request->validate([
        'nama' => 'required|string|max:255',
    ]);

    $data = $request->all();

    $kategori->update($data);
    
    return redirect()->route('guru.kategoriKarya.index')->with('success', 'kategori berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $kategori = category_karya::findOrFail($id);
        $kategori->delete();
        return redirect()->route('guru.kategoriKarya.index')->with('success', 'kategori berhasil dihapus.');
    }
}
