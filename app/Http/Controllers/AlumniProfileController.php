<?php

namespace App\Http\Controllers;

use App\Models\alumni_profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = alumni_profile::with('user');

        if ($search = request('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nisn', 'like', '%' . $search . '%');
            });
        }

        $alumni = $query->paginate(10)->withQueryString();

        return view('dashboard.admin.alumni.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereHasRole('alumni')
            ->whereDoesntHave('alumniProfile')
            ->where('status', 'approved')
            ->get();
        return view('dashboard.admin.alumni.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:alumni_profiles,user_id',
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|max:20|unique:alumni_profiles,nisn',
            'tahun_lulus' => 'required|integer',
            'jenkel' => 'required|in:Laki-laki,Perempuan',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
            'foto' => 'required|image|max:2048',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('alumni', 'public');
        }

        alumni_profile::create($data);

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni profile created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(alumni_profile $alumni)
    {
        return view('dashboard.admin.alumni.show', compact('alumni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(alumni_profile $alumni)
    {
        $users = User::whereHasRole('siswa')->where(function ($q) use ($alumni) {
                $q->whereDoesntHave('siswaProfile')->orWhere('id', $alumni->user_id);
            })->get();
        return view('dashboard.admin.alumni.edit', compact('alumni', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, alumni_profile $alumni)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|max:20|unique:alumni_profiles,nisn,' . $alumni->id,
            'tahun_lulus' => 'required|integer',
            'jenkel' => 'required|in:Laki-laki,Perempuan',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
            'foto' => 'nullable|image|max:2048',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('foto')) {
            if ($alumni->foto && Storage::disk('public')->exists($alumni->foto)) {
                Storage::disk('public')->delete($alumni->foto);
            }
            $data['foto'] = $request->file('foto')->store('alumni', 'public');
        }

        $alumni->update($data);

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(alumni_profile $alumni_profile)
    {
        if ($alumni_profile->foto && Storage::disk('public')->exists($alumni_profile->foto)) {
            Storage::disk('public')->delete($alumni_profile->foto);
        }
        $alumni_profile->delete();

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni profile deleted successfully.');
    }
}
