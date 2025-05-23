<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\category_berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = berita::all();
        $categories = category_berita::all();
        return view('dashboard.admin.berita.index', compact('beritas', 'categories'));
    }

    public function home(Request $request)
    {
        $sort = $request->query('sort', 'desc');
        $beritas = Berita::orderBy('created_at', $sort)->paginate(6);
        $categories = category_berita::all();
        return view('home', compact('beritas', 'categories', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category_berita::all();
        return view('dashboard.admin.berita.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_berita_id' => 'required|exists:category_beritas,id',
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $data = $validated;
        $data['exerpt'] = Str::limit(strip_tags($data['isi']), 100);

        $slug = Str::slug($data['judul']);
        $originalSlug = $slug;
        $counter = 1;
        while (berita::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        $data['slug'] = $slug;
        $data['user_id'] = Auth::id();

        $berita = berita::create($data);

        if ($request->hasFile('gambar_berita')) {
            $gambarPaths = [];
            foreach ($request->file('gambar_berita') as $gambar) {
                $path = $gambar->store('gambar_berita', 'public');
                $gambarPaths[] = $path;
            }
            $berita->gambar_berita = json_encode($gambarPaths);
            $berita->save();
        }

        return redirect()->route('berita.index')->with('success', 'Berita created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(berita $berita)
    {

         return view('dashboard.admin.berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(berita $berita)
    {
            $categories = category_berita::all();
            return view('dashboard.admin.berita.edit', compact('berita', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, berita $berita)
    {
        $rules = [
            'category_berita_id' => 'required|exists:category_beritas,id',
            'judul' => 'required',
            'isi' => 'required',
        ];

        $validated = $request->validate($rules);

        $data = $validated;
        $data['exerpt'] = Str::limit(strip_tags($data['isi']), 100);

        $slug = Str::slug($data['judul']);
        $originalSlug = $slug;
        $counter = 1;
        while (berita::where('slug', $slug)->where('id', '!=', $berita->id)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        $data['slug'] = $slug;
        $data['user_id'] = Auth::id();

        if ($request->hasFile('gambar_berita')) {
            if ($berita->gambar_berita) {
                $oldImages = json_decode($berita->gambar_berita, true);
                if (is_array($oldImages)) {
                    foreach ($oldImages as $oldImage) {
                        if (Storage::disk('public')->exists($oldImage)) {
                            Storage::disk('public')->delete($oldImage);
                        }
                    }
                }
            }
            $gambarPaths = [];
            foreach ($request->file('gambar_berita') as $gambar) {
                $path = $gambar->store('gambar_berita', 'public');
                $gambarPaths[] = $path;
            }
            $data['gambar_berita'] = json_encode($gambarPaths);
        }
        $berita->update($data);
        return redirect()->route('berita.index')->with('success', 'Berita updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(berita $berita)
    {
        if ($berita->gambar_berita) {
            $gambarPaths = json_decode($berita->gambar_berita, true);
            if (is_array($gambarPaths)) {
                foreach ($gambarPaths as $path) {
                    if (Storage::disk('public')->exists($path)) {
                        Storage::disk('public')->delete($path);
                    }
                }
            }
        }
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita dan semua gambar terkait berhasil dihapus.');
    }

}
