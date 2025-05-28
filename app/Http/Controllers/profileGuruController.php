<?php

namespace App\Http\Controllers;

use App\Models\guru_profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class profileGuruController extends Controller
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
        return view('guruProfile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $user = auth()->user();



    if (guru_profile::where('user_id', $user->id)->exists()) {
        return redirect()->back()->withErrors(['error' => 'Profil guru sudah pernah dibuat.']);
    }

    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'nip' => 'required|max:20|unique:guru_profiles',
        'jenkel' => 'required|in:laki-laki,perempuan',
        'telepon' => 'required|string|max:20',
        'alamat' => 'required|string',
        'mapel' => 'required|string',
        'tempat_lahir' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
        'foto' => 'required|image|max:2048',
    ]);

    // Upload foto ke folder storage/app/public/foto_siswa
    $path = $request->file('foto')->store('foto_siswa', 'public');

    // Simpan data ke database
    guru_profile::create([
        'user_id' => $user->id,
        'nama' => $validated['nama'],
        'nip' => $validated['nip'],
        'jenkel' => $validated['jenkel'],
        'telepon' => $validated['telepon'],
        'alamat' => $validated['alamat'],
        'mapel' => $validated['mapel'],
        'tempat_lahir' => $validated['tempat_lahir'],
        'tanggal_lahir' => $validated['tanggal_lahir'],
        'agama' => $validated['agama'],
        'foto' => $path,
    ]);

    return redirect(url('/'))->with('success', 'Profil guru berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $gurus = guru_profile::where('user_id', $user->id)->first();

        if(!$gurus){
            return redirect()->route('guru.profileGuru.create')->with('user_id', $user->id);
        }
        return view('guruProfile.profile', compact('gurus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gurus = guru_profile::findOrFail($id);
         $users = User::whereHasRole('guru')->where(function ($q) use ($gurus) {
                $q->whereDoesntHave('guruProfile')->orWhere('id', $gurus->user_id);
            })->get();
        return view('guruProfile.profile', compact('users', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gurus = guru_profile::findOrFail($id);

         $request->validate([
            'user_id' => 'required|exists:users,id|unique:guru_profiles,user_id,' . $gurus->id,
            'nama' => 'required',
            'nip' => 'required|unique:guru_profiles,nip,' . $gurus->id,
            'jenkel' => 'required|in:Laki-laki,Perempuan',
            'telepon' => 'required',
            'alamat' => 'required',
            'mapel' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($gurus->foto && Storage::disk('public')->exists($gurus->foto)) {
                Storage::disk('public')->delete($gurus->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto_guru', 'public');
        }

        $gurus->update($data);

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
