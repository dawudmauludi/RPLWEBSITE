<?php

namespace App\Http\Controllers;

use App\Models\alumni_profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class profileAlumniController extends Controller
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
           if (Auth::user()->alumniProfile->id != $id) {
        abort(403, 'Unauthorized action.');
        }
        $alumni = alumni_profile::findOrFail($id);
        return view('alumniProfile.profile', compact('alumni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         if (Auth::user()->alumniProfile->id != $id) {
        abort(403, 'Unauthorized action.');
        }
        $alumni = alumni_profile::findOrFail($id);
         $users = User::whereHasRole('alumni')->where(function ($q) use ($alumni) {
                $q->whereDoesntHave('alumniProfile')->orWhere('id', $alumni->user_id);
            })->get();
        return view('alumniProfile.profile', compact('alumni', 'users', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $alumni = alumni_profile::findOrFail($id);
        
         $request->validate([
            'user_id' => 'required|exists:users,id|unique:siswa_profiles,user_id,' . $alumni->id,
            'nama' => 'required',
            'nisn' => 'required|unique:alumni_profiles,nisn,' . $alumni->id,
            'jenkel' => 'required|in:Laki-laki,Perempuan',
            'telepon' => 'required',
            'tahun_lulus' => 'required|integer',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($alumni->foto && Storage::disk('public')->exists($alumni->foto)) {
                Storage::disk('public')->delete($alumni->foto);
            }
            $data['foto'] = $request->file('foto')->store('alumni_siswa', 'public');
        }

        $alumni->update($data);

        return redirect()->back()->with('success', 'Data alumni berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
