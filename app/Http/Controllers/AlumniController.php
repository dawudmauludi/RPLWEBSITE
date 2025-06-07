<?php

namespace App\Http\Controllers;

use App\Models\alumni_profile;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumniProfile.alumni_profile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $user = auth()->user();



    if (alumni_profile::where('user_id', $user->id)->exists()) {
        return redirect()->back()->withErrors(['error' => 'Profil alumni sudah pernah dibuat.']);
    }

    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'nisn' => 'required|string|max:20|unique:siswa_profiles',
        'jenkel' => 'required|in:laki-laki,perempuan',
        'telepon' => 'required|string|max:20',
        'alamat' => 'required|string',
        'tahun_lulus' => 'required|integer',
        'tempat_lahir' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
        'foto' => 'required|image|max:2048',
         'latitude' => 'required',
        'longitude' => 'required',
    ]);

    // Upload foto ke folder storage/app/public/foto_siswa
    $path = $request->file('foto')->store('foto_alumni', 'public');


    // Simpan data ke database
    alumni_profile::create([
        'user_id' => $user->id,
        'nama' => $validated['nama'],
        'nisn' => $validated['nisn'],
        'jenkel' => $validated['jenkel'],
        'telepon' => $validated['telepon'],
        'alamat' => $validated['alamat'],
        'tahun_lulus' => $validated['tahun_lulus'],
        'tempat_lahir' => $validated['tempat_lahir'],
        'tanggal_lahir' => $validated['tanggal_lahir'],
        'agama' => $validated['agama'],
        'foto' => $path,
        'latitude' => $validated['latitude'],
        'longitude' => $validated['longitude'],
    ]);

    return redirect(url('/'))->with('success', 'Profil alumni berhasil disimpan.');
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
