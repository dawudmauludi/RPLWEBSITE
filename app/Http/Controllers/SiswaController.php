<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\siswa_profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $kelas = kelas::all(); // Ambil semua kelas

        return view('siswaProfile.siswa_profile', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $user = auth()->user();

    

    // Cek apakah profil sudah pernah dibuat
    if (siswa_profile::where('user_id', $user->id)->exists()) {
        return redirect()->back()->withErrors(['error' => 'Profil siswa sudah pernah dibuat.']);
    }

    // Validasi input
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'nisn' => 'required|string|max:20|unique:siswa_profiles',
        'jenkel' => 'required|in:laki-laki,perempuan',
        'telepon' => 'required|string|max:20',
        'alamat' => 'required|string',
        'tempat_lahir' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
        'kelas_id' => 'required|exists:kelas,id',
        'foto' => 'required|image|max:2048',
    ]);

    // Upload foto ke folder storage/app/public/foto_siswa
    $path = $request->file('foto')->store('foto_siswa', 'public');

    // Simpan data ke database
    siswa_profile::create([
        'user_id' => $user->id,
        'nama' => $validated['nama'],
        'nisn' => $validated['nisn'],
        'jenkel' => $validated['jenkel'],
        'telepon' => $validated['telepon'],
        'alamat' => $validated['alamat'],
        'tempat_lahir' => $validated['tempat_lahir'],
        'tanggal_lahir' => $validated['tanggal_lahir'],
        'agama' => $validated['agama'],
        'kelas_id' => $validated['kelas_id'],
        'foto' => $path,
    ]);

    return redirect()->route('/')->with('success', 'Profil siswa berhasil disimpan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
