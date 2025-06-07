<?php

namespace App\Http\Controllers;

use App\Models\category_karya;
use App\Models\dokumentasi_karya;
use App\Models\fiturKarya;
use App\Models\karya_siswa;
use App\Models\kelas;
use App\Models\tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KaryaSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        return view('dashboard.admin.karya.index', compact('karyas'));
    }

    public function all()
    {
        $validated = request()->validate([
            'search' => 'nullable|string|max:255',
            'kelas' => 'nullable|integer|exists:kelas,id'
        ]);

            $search = $validated['search'] ?? null;
            $kelas = $validated['kelas'] ?? null;

        $query = karya_siswa::query()->with(['category', 'dokumentasi', 'tools', 'fiturKarya', 'user.siswaProfile.kelas'])->where('is_publised', true);

        if ($search = request('search')) {
            $query->where(function ($q) use ($search) {
               $q->where('judul', 'like', "%".substr($search, 0, 100)."%");
            });
        }

        if ($kelas = request('kelas')) {
            $query->whereHas('user.siswaProfile.kelas', function ($q) use ($kelas) {
                $q->where('id', $kelas);
            });
        }
        $kelas = kelas::all();
        $karyas = $query->latest()->paginate(9)->withQueryString();

        return view('karya.all', compact('karyas', 'kelas'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'category_karya_id' => 'required|exists:category_karyas,id',
        'judul' => 'required|string',
        'deskripsi' => 'required|string',
        'link' => 'required',
        'gambar_karya' => 'required|image',
        'gambar_dokumentasi.*' => 'image|nullable',
         'tools.*' => 'nullable|string|max:255',
        'fiturs' => 'nullable|array',
        'fiturs.*.penjelasan' => 'required|string',
    ]);

    // Simpan gambar karya utama
    $gambarKaryaPath = $request->file('gambar_karya')->store('karya', 'public');

    // Simpan data karya
    $karya = karya_siswa::create([
        'user_id' => auth()->id(),
        'category_karya_id' => $request->category_karya_id,
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'link' => $request->link,
        'gambar_karya' => $gambarKaryaPath,
    ]);

    // Simpan dokumentasi (jika ada)
    if ($request->hasFile('gambar_dokumentasi')) {
    $files = collect($request->file('gambar_dokumentasi'));

    $files->each(function ($gambar) use ($karya) {
        $path = $gambar->store('dokumentasi', 'public');

        dokumentasi_karya::create([
            'karya_siswa_id' => $karya->id,
            'gambar' => $path,
        ]);
    });
    }

   $tools = json_decode($request->tools, true);
    if (!empty($tools)) {
        foreach ($tools as $tool) {
            tools::create([
                'karya_siswa_id' => $karya->id,
                'nama' => $tool,
            ]);
        }
    }

        if ($request->fiturs) {
    foreach ($request->fiturs as $fitur) {
        if (!empty($fitur['penjelasan'])) {
            fiturKarya::create([
                'karya_siswa_id' => $karya->id,
                'penjelasan' => $fitur['penjelasan'],
            ]);
        }
    }
}


     return redirect()->route('admin.karya.index')->with('success', 'Karya created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(karya_siswa $karya)
    {

        $karya = karya_siswa::with(['category', 'dokumentasi', 'tools', 'fiturKarya'])->findOrFail($karya->id);
        return view('karya.detail', compact('karya'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(karya_siswa $karya)
    {
         if (!Auth::user()->hasRole('admin')) {
            abort(403);
        }
          $categories = category_karya::all();
            return view('dashboard.admin.karya.edit', compact('karya', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, karya_siswa $karya)
    {
         if (!Auth::user()->hasRole('admin')) {
            abort(403);
        }
          $request->validate([
        'category_karya_id' => 'required|exists:category_karyas,id',
        'judul' => 'required|string',
        'deskripsi' => 'required|string',
        'link' => 'required',
        'gambar_karya' => 'required|image',
        'gambar_dokumentasi.*' => 'image|nullable',
         'tools.*' => 'nullable|string|max:255',
        'fiturs' => 'nullable|array',
        'fiturs.*.penjelasan' => 'required|string',
    ]);

    // Simpan gambar karya utama

    if($request->hasFile('gambar_karya')){
        Storage::disk('public')->delete($karya->gambar_karya);

        $gambarKaryaPath = $request->file('gambar_karya')->store('karya', 'public');
        $karya->gambar_karya = $gambarKaryaPath;
    }

    // Simpan data karya
      $karya->update([
        'category_karya_id' => $request->category_karya_id,
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'link' => $request->link,
        'gambar_karya' => $karya->gambar_karya, // update jika diganti
    ]);



    // Simpan dokumentasi (jika ada)
    if ($request->hasFile('gambar_dokumentasi')) {
        foreach ($request->file('gambar_dokumentasi') as $gambar) {
            $path = $gambar->store('dokumentasi','public');
            dokumentasi_karya::create([
                'karya_siswa_id' => $karya->id,
                'gambar' => $path,
            ]);
        }
    }

    tools::where('karya_siswa_id', $karya->id)->delete();

   $tools = json_decode($request->tools, true);
    if (!empty($tools)) {
        foreach ($tools as $tool) {
            tools::create([
                'karya_siswa_id' => $karya->id,
                'nama' => $tool,
            ]);
        }
    }

    fiturKarya::where('karya_siswa_id', $karya->id)->delete();

        if ($request->fiturs) {
    foreach ($request->fiturs as $fitur) {
        if (!empty($fitur['penjelasan'])) {
            fiturKarya::create([
                'karya_siswa_id' => $karya->id,
                'penjelasan' => $fitur['penjelasan'],
            ]);
        }
    }
}
        return redirect()->route('admin.karya.index')->with('success', 'Karya berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(karya_siswa $karya)
    {
         if (!Auth::user()->hasRole('admin')) {
            abort(403);
        }

        if($karya->gambar_karya){
            Storage::disk('public')->delete($karya->gambar_karya);
        }

        foreach($karya->dokumentasi as $dokumentasi){
            if($dokumentasi->gambar){
                Storage::disk('public')->delete($dokumentasi->gambar);
            }
        }

        $karya->tools()->delete();

        $karya->fiturKarya()->delete();

        $karya->delete();
        return redirect()->route('admin.karya.index')->with('success', 'Karya deleted successfully.');
    }


    public function isPublish(Request $request, karya_siswa $karya){
        if(!Auth::user()->hasRole('admin')){
            abort(403);
        }
        $karya->update([
            'is_publised' => true,
        ]);

        return redirect()->back()->with('success', 'Karya berhasil di publish');
    }
public function unPublish(Request $request, karya_siswa $karya){
        if(!Auth::user()->hasRole('admin')){
            abort(403);
        }
        $karya->update([
            'is_publised' => false,
        ]);

        return redirect()->back()->with('success', 'Karya berhasil di unPublish');
    }
}
