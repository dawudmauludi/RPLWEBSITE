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
    public function index(Request $request)
    {
        $query = berita::query();

        if ($request->filled('search')) {
            $query->where('judul', 'LIKE', '%' . $request->search . '%');
        }

        $beritas = $query->paginate(4);
        $categories = category_berita::all();
        return view('dashboard.admin.berita.index', compact('beritas', 'categories'));
    }

   // app/Http/Controllers/BeritaController.php

public function all(Request $request)
{
    $query = Berita::query();
    $categories = Category_berita::all();

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('judul', 'like', '%' . $request->search . '%')
              ->orWhere('isi', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('category_berita_id')) {
        $query->where('category_berita_id', $request->category_berita_id);
    }

    $beritas = $query->latest()->paginate(9)->withQueryString();

    if ($request->ajax()) {
        return view('berita._list', compact('beritas'))->render();
    }

    return view('berita.all', compact('beritas', 'categories'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

         if (!Auth::user()->hasRole('admin')) {
            abort(403);
        }
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
    $files = collect($request->file('gambar_berita'));
    $gambarPaths = [];

    $files->each(function ($gambar) use (&$gambarPaths) {
        $path = $gambar->store('gambar_berita', 'public');
        $gambarPaths[] = $path;
    });

    $berita->gambar_berita = json_encode($gambarPaths);
    $berita->save();
}

        return redirect()->route('admin.berita.index')->with('success', 'Berita created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
          
         $berita = Berita::where('slug', $slug)->firstOrFail();
          $beritas = Berita::where('id', '!=', $berita->id)
                    ->latest() // Urutkan dari terbaru
                    ->take(6)  // Ambil 6 berita
                    ->get();
        $categories = category_berita::all();
         return view('dashboard.admin.berita.show', compact('berita','beritas','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(berita $berita)
    {
         if (!Auth::user()->hasRole('admin')) {
            abort(403);
        }

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
        return redirect()->route('admin.berita.index')->with('success', 'Berita updated successfully.');
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
        return redirect()->route('admin.berita.index')->with('success', 'Berita dan semua gambar terkait berhasil dihapus.');
    }

}
