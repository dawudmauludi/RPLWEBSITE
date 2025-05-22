<?php

namespace App\Http\Controllers;

use App\Models\guru_profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = guru_profile::with('user')->get();
        return view('dashboard.admin.guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereHasRole('guru')->whereDoesntHave('guruProfile')->where('status', 'approved')->get();
        return view('dashboard.admin.guru.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:guru_profiles,user_id',
            'nama' => 'required',
            'nip' => 'required',
            'jenkel' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_guru', 'public');
        }

        guru_profile::create($data);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(guru_profile $guru)
    {
        return view('dashboard.admin.guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(guru_profile $guru)
    {
         return view('dashboard.admin.guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, guru_profile $guru)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:guru_profiles,user_id,' . $guru->id,
            'nama' => 'required',
            'nip' => 'required|unique:guru_profiles,nip,' . $guru->id,
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
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto_guru', 'public');
        }

        $guru->update($data);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(guru_profile $guru)
    {
       if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }
        $guru->delete();
        return redirect()->route('admin.guru.index')->with('success', 'Data guru dan foto berhasil dihapus.');
    }
}
