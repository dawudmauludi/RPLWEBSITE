<?php

namespace App\Http\Controllers;

use App\Models\category_berita;
use App\Models\category_karya;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class kategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $query = category_berita::query();

        if ($search = request('search')) {
            $query->where(function ($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%");
            });
        }

        $kategoris = $query->paginate(20)->withQueryString();

        return view('dashboard.admin.kategoriBerita.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('dashboard.admin.kategoriBerita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nama' => 'required|string|max:255',
    ]);

    $data = $request->all();

      $slug = Str::slug($data['nama']);
        $originalSlug = $slug;
        $counter = 1;
        while (category_berita::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        $data['slug'] = $slug;

        $berita= category_berita::create($data);
    return redirect()->route('admin.kategoriBerita.index')->with('success', 'kategori berhasil ditambahkan.');
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
          $kategori = category_berita::findOrFail($id);
        return view('dashboard.admin.kategoriBerita.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = category_berita::findOrFail($id);
         $request->validate([
        'nama' => 'required|string|max:255',
    ]);

    $data = $request->all();

      $slug = Str::slug($data['nama']);
        $originalSlug = $slug;
        $counter = 1;
        while (category_berita::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        $data['slug'] = $slug;

        $kategori->update($data);
    
    return redirect()->route('admin.kategoriBerita.index')->with('success', 'kategori berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $kategori = category_berita::findOrFail($id);
        $kategori->delete();
        return redirect()->route('admin.kategoriBerita.index')->with('success', 'kategori berhasil dihapus.');
    }
}
