<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\siswa_profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class profileSiswaController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = siswa_profile::findOrFail($id);
        $kelas = kelas::all();
        return view('siswaProfile.profile', compact('student','kelas'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $student = siswa_profile::findOrFail($id);
         $users = User::whereHasRole('siswa')->where(function ($q) use ($student) {
                $q->whereDoesntHave('siswaProfile')->orWhere('id', $student->user_id);
            })->get();
        $kelas = kelas::all();
        return view('siswaProfile.profile', compact('student', 'users', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = siswa_profile::findOrFail($id);
        
         $request->validate([
            'user_id' => 'required|exists:users,id|unique:siswa_profiles,user_id,' . $student->id,
            'kelas_id' => 'required|exists:kelas,id',
            'nama' => 'required',
            'nisn' => 'required|unique:siswa_profiles,nisn,' . $student->id,
            'jenkel' => 'required|in:Laki-laki,Perempuan',
            'telepon' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($student->foto && Storage::disk('public')->exists($student->foto)) {
                Storage::disk('public')->delete($student->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        $student->update($data);

        return redirect()->back()->with('success', 'Data siswa berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
