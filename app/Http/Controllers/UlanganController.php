<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\ulangan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UlanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Auth::user()->hasRole('guru|admin')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk melihat ulangan.');
        }

        $kelas = kelas::all();

        $ulangans = Ulangan::with(['creator', 'kelas'])
            ->when(Auth::user()->hasRole('guru'), function ($query) {
                return $query->where('created_by', Auth::user()->id);
            })
            ->where('judul', 'LIKE', "%{$request->query('search')}%")
            ->when($request->query('kelas_id'), function ($query, $kelasId) {
                return $query->where('kelas_id', $kelasId);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.guru.ulangans.index', compact('ulangans', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->hasRole('guru|admin')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk membuat ulangan.');
        }

        $kelas = kelas::all();
        return view('dashboard.guru.ulangans.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->hasRole('guru|admin')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk membuat ulangan.');
        }

        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'judul' => 'required|string|max:255',
            'link' => 'required|url|max:255',
            'deskripsi' => 'required|string',
            'mulai' => 'required|date|after_or_equal:today',
            'selesai' => 'required|date|after:mulai',
        ], [
            'mulai.after_or_equal' => 'Waktu mulai tidak boleh kurang dari hari ini',
            'selesai.after' => 'Waktu selesai harus setelah waktu mulai',
            'link.url' => 'Link harus berupa URL yang valid'
        ]);
        $mulai = Carbon::createFromFormat('Y-m-d\TH:i', $request->mulai, 'Asia/Jakarta')->setTimezone('UTC');
        $selesai = Carbon::createFromFormat('Y-m-d\TH:i', $request->selesai, 'Asia/Jakarta')->setTimezone('UTC');

        $ulangan = Ulangan::create([
            'created_by' => Auth::user()->id,
            'kelas_id' => $request->kelas_id,
            'judul' => $request->judul,
            'link' => $request->link,
            'deskripsi' => $request->deskripsi,
            'mulai' => $mulai,
            'selesai' => $selesai,
        ]);

        return redirect()->route('ulangans.index')->with('success', 'Ulangan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(ulangan $ulangan)
    // {
    //     //
    // }
    public function show(string $id)
    {
        $ulangan = Ulangan::with(['creator', 'kelas'])->findOrFail($id);

        if (Auth::user()->hasRole('siswa')) {
            if (!Auth::user()->kelas || Auth::user()->kelas->id !== $ulangan->kelas_id) {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk melihat ulangan ini.');
            }
        } elseif (Auth::user()->hasRole('guru')) {
            if ($ulangan->created_by !== Auth::user()->id) {
                return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk melihat ulangan ini.');
            }
        }

        return view('dashboard.siswa.ulangans.show', compact('ulangan'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    //public function edit(ulangan $ulangan)
     public function edit(string $id)
    {
        $ulangan = Ulangan::findOrFail($id);

        if (!Auth::user()->hasRole('admin') && $ulangan->created_by !== Auth::user()->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengedit ulangan ini.');
        }

        if (Carbon::now() < $ulangan->mulai && Carbon::now() > $ulangan->selesai) {
            return redirect()->back()->with('error', 'Ulangan yang sudah dimulai tidak dapat diedit.');
        }

        $kelas = Kelas::all();
        return view('dashboard.guru.ulangans.edit', compact('ulangan', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    //public function update(Request $request, ulangan $ulangan)
    public function update(Request $request, string $id)
    {
        $ulangan = Ulangan::findOrFail($id);

        if (!Auth::user()->hasRole('admin') && $ulangan->created_by !== Auth::user()->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengedit ulangan ini.');
        }

        if (Carbon::now() > $ulangan->mulai && Carbon::now() < $ulangan->selesai){
            return redirect()->back()->with('error', 'Ulangan yang sudah dimulai tidak dapat diedit.');
        }

        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'judul' => 'required|string|max:255',
            'link' => 'required|url|max:255',
            'deskripsi' => 'required|string',
            'mulai' => 'required|date|after_or_equal:today',
            'selesai' => 'required|date|after:mulai',
        ], [
            'mulai.after_or_equal' => 'Waktu mulai tidak boleh kurang dari hari ini',
            'selesai.after' => 'Waktu selesai harus setelah waktu mulai',
            'link.url' => 'Link harus berupa URL yang valid'
        ]);

         $mulai = Carbon::createFromFormat('Y-m-d\TH:i', $request->mulai, 'Asia/Jakarta')->setTimezone('UTC');
        $selesai = Carbon::createFromFormat('Y-m-d\TH:i', $request->selesai, 'Asia/Jakarta')->setTimezone('UTC');

        $ulangan->update([
            'kelas_id' => $request->kelas_id,
            'judul' => $request->judul,
            'link' => $request->link,
            'deskripsi' => $request->deskripsi,
            'mulai' => $mulai,
            'selesai' => $selesai,
        ]);

        return redirect()->route('ulangans.index')->with('success', 'Ulangan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(ulangan $ulangan)
    public function destroy(string $id)
    {
        $ulangan = Ulangan::findOrFail($id);

        if (!Auth::user()->hasRole('admin') && $ulangan->created_by !== Auth::user()->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus ulangan ini.');
        }

        if (Carbon::now() > $ulangan->mulai && Carbon::now() < $ulangan->selesai) {
            return redirect()->back()->with('error', 'Ulangan yang belum dimulai atau sudah selesai tidak dapat dihapus.');
        }

        $ulangan->delete();

        return redirect()->route('ulangans.index')->with('success', 'Ulangan berhasil dihapus.');
    }

    public function toggleActive(string $id)
    {
        $ulangan = Ulangan::findOrFail($id);

        // Check permission
        if (!Auth::user()->hasRole('admin') && $ulangan->created_by !== Auth::user()->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengubah status ulangan ini.');
        }

        if ($ulangan->is_active) {
            $ulangan->is_active = false;
        } else {
            $ulangan->is_active = true;
        }
        $ulangan->save();

        $status = $ulangan->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->back()->with('success', "Ulangan berhasil {$status}.");
    }

    public function myUlangans()
    {
        if (!Auth::user()->hasRole('siswa')) {
            return redirect()->back()->with('error', 'Halaman ini khusus untuk siswa.');
        }

        if (!Auth::user()->kelas) {
            return redirect()->back()->with('error', 'Anda belum terdaftar di kelas manapun.');
        }

        $ulangans = Ulangan::active()
            ->forKelas(Auth::user()->kelas->id)
            ->with(['creator', 'kelas'])
            ->orderBy('mulai', 'asc')
            ->get();

        return view('dashboard.siswa.ulangans.my-ulangans', compact('ulangans'));
    }

    public function access(string $id)
    {
        $ulangan = Ulangan::findOrFail($id);

        if (!Auth::user()->hasRole('siswa')) {
            return redirect()->back()->with('error', 'Halaman ini khusus untuk siswa.');
        }

        if (!Auth::user()->kelas || Auth::user()->kelas->id !== $ulangan->kelas_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengikuti ulangan ini.');
        }

        if (!$ulangan->is_available) {
            return redirect()->back()->with('error', 'Ulangan tidak tersedia saat ini.');
        }

        return redirect($ulangan->link);
    }
}
