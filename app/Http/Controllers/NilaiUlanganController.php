<?php

namespace App\Http\Controllers;

use App\Exports\NilaiExport;
use App\Models\kelas;
use App\Models\nilai_ulangan;
use App\Models\siswa_profile;
use App\Models\ulangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Excel;

class NilaiUlanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       if (!Auth::user()->hasRole('siswa')) {
            abort(403);
        }

        $kelasId = Auth::user()->siswaprofile->kelas_id;

        $ulanganList = Ulangan::where('kelas_id', $kelasId)->get();

        return view('dashboard.siswa.nilai.index', compact('ulanganList'));
    }

     public function showNilai($ulanganId)
    {
        if (!Auth::user()->hasRole('siswa')) {
            abort(403);
        }

        $ulangan = Ulangan::with(['nilaiUlangans.user.siswaProfile'])->findOrFail($ulanganId);

        if ($ulangan->kelas_id !== Auth::user()->siswaprofile->kelas_id) {
            abort(403);
        }
           $nilaiList = $ulangan->nilaiUlangans()
                    ->with(['user.siswaprofile' => function($query) {
                        $query->orderBy('no_absen', 'asc');
                    }])
                    ->get()
                    ->sortBy(function($nilai) {
                        return $nilai->user->siswaprofile->no_absen;
                    });

        return view('dashboard.siswa.nilai.show', compact('ulangan', 'nilaiList',));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $ulanganId)
    {
        $ulangan = ulangan::findOrFail($ulanganId);

        if (!Auth::user()->hasRole('guru')) {
            abort(403);
        }

        $siswaList = User::whereHasRole('siswa')
        ->whereHas('siswaprofile', fn($q) => $q->where('kelas_id', $ulangan->kelas_id))
        ->get();


        foreach ($siswaList as $siswa) {
            nilai_ulangan::firstOrCreate([
                'ulangan_id' => $ulangan->id,
                'user_id' => $siswa->id
            ], [
                'nilai' => 0
            ]);
        }

        return redirect()->route('nilai.edit', ['ulanganId' => $ulangan->id]);
    }
    /**
     * Display the specified resource.
     */
    public function show($ulanganId)
    {
        if (!Auth::user()->hasRole('guru')) {
            abort(403);
        }
        $ulangan = Ulangan::with(['nilaiUlangans.user.siswaProfile'])->findOrFail($ulanganId);

         $nilaiList = $ulangan->nilaiUlangans()
                    ->with(['user.siswaprofile' => function($query) {
                        $query->orderBy('no_absen', 'asc');
                    }])
                    ->get()
                    ->sortBy(function($nilai) {
                        return $nilai->user->siswaprofile->no_absen;
                    });

        return view('dashboard.guru.nilai.show', compact('ulangan', 'nilaiList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ulanganId)
    {
        if (!Auth::user()->hasRole('guru')) {
            abort(403);
        }

        $ulangan = Ulangan::with(['nilaiUlangans.user'])->findOrFail($ulanganId);

        return view('dashboard.guru.nilai.edit', compact('ulangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->hasRole('guru')) {
            abort(403);
        }

        $nilai = nilai_ulangan::findOrFail($id);


        $nilai->update(['nilai' => $request->nilai]);
        $ulangan = Ulangan::findOrFail($request->input('ulangan_id'));
        return redirect()->route('ulangans.show', $ulangan)->with('success', 'Semua nilai berhasil diperbarui.');
    }

    public function bulkUpdate(Request $request)
    {
        if (!Auth::user()->hasRole('guru')) {
            abort(403);
        }

        foreach ($request->input('nilai', []) as $id => $value) {
            nilai_ulangan::where('id', $id)->update(['nilai' => $value]);
        }

        $ulangan = Ulangan::findOrFail($request->input('ulangan_id'));
        return redirect()->route('ulangans.show', $ulangan)->with('success', 'Semua nilai berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(nilai_ulangan $nilai_ulangan)
    {
        //
    }

   

}
