<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('dashboard.admin.jurusan.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jumlahData = Jurusan::all()->count();
        if ($jumlahData >= 1) {
            return redirect()->route('admin.jurusan.index')->with('error', 'Data Jurusan sudah ada, tidak bisa menambahkan lagi');
        }
        return view('dashboard.admin.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'other_name' => 'required|string',
            'slogan' => 'required|string',
            'isi' => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('jurusan', 'public');
        }
        Jurusan::create($data);

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        return view('dashboard.admin.jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'other_name' => 'required|string',
            'slogan' => 'required|string',
            'isi' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($jurusan->image && Storage::disk('public')->exists($jurusan->image)) {
                Storage::disk('public')->delete($jurusan->image);
            }
            $data['image'] = $request->file('image')->store('jurusan', 'public');
        }

        $jurusan->update($data);

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        if ($jurusan->image && Storage::disk('public')->exists($jurusan->image)) {
            Storage::disk('public')->delete($jurusan->image);
        }
        $jurusan->delete();

        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan deleted successfully.');
    }
}
