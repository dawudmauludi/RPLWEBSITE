<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\siswa_profile;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = siswa_profile::with('user', 'kelas');

        if ($search = request('search')) {
            $query->where(function ($q) use ($search) {
            $q->where('nama', 'like', '%' . $search . '%')
              ->orWhere('nisn', 'like', '%' . $search . '%');
            });
        }

        $siswa = $query->paginate(10)->withQueryString();

        return view('dashboard.admin.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->hasRole('siswa') && !Auth::user()->hasRole('admin')) {
            abort(403);
        }

        $users = User::whereHasRole('siswa')->whereDoesntHave('siswaProfile')->where('status', 'approved')->get();
        $kelas = kelas::all();
        return view('dashboard.admin.siswa.create', compact('users', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()->hasRole('siswa') && !Auth::user()->hasRole('admin')) {
            abort(403);
        }

        $request->validate([
            'user_id' => 'required|exists:users,id|unique:siswa_profiles,user_id',
            'kelas_id' => 'required|exists:kelas,id',
            'nama' => 'required',
            'nisn' => 'required',
            'jenkel' => 'required',
            'telepon' => 'required',
            'no_absen' => 'required|integer',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        siswa_profile::create($data);

        return redirect()->route('admin.siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(siswa_profile $siswa)
    {

        return view('dashboard.admin.siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(siswa_profile $siswa)
    {

        if (!Auth::user()->hasRole('siswa') && !Auth::user()->hasRole('admin')) {
            abort(403);
        }

        $users = User::whereHasRole('siswa')->where(function ($q) use ($siswa) {
                $q->whereDoesntHave('siswaProfile')->orWhere('id', $siswa->user_id);
            })->get();
        $kelas = Kelas::all();
        return view('dashboard.admin.siswa.edit', compact('siswa', 'users', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, siswa_profile $siswa)
    {
        if (!Auth::user()->hasRole('siswa') && !Auth::user()->hasRole('admin')) {
            abort(403);
        }

        $request->validate([
            'user_id' => 'required|exists:users,id|unique:siswa_profiles,user_id,' . $siswa->id,
            'kelas_id' => 'required|exists:kelas,id',
            'nama' => 'required',
            'nisn' => 'required|unique:siswa_profiles,nisn,' . $siswa->id,
            'jenkel' => 'required|in:Laki-laki,Perempuan',
            'telepon' => 'required',
            'alamat' => 'required',
            'no_absen' =>'required|integer',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
                Storage::disk('public')->delete($siswa->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        $siswa->update($data);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(siswa_profile $siswa)
    {
        if (!Auth::user()->hasRole('guru') && !Auth::user()->hasRole('admin')) {
            abort(403);
        }

        if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
            Storage::disk('public')->delete($siswa->foto);
        }
        $siswa->delete();
        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa dan foto berhasil dihapus.');
    }
}
