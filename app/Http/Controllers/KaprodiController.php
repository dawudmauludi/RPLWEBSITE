<?php

namespace App\Http\Controllers;

use App\Models\Kaprodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kaprodis = Kaprodi::all();
        return view('dashboard.admin.kaprodi.index', compact('kaprodis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jumlahData = Kaprodi::all()->count();
        if ($jumlahData >= 1) {
            return redirect()->route('admin.kaprodi.index')->with('error', 'Data kaprodi sudah ada, tidak bisa menambahkan lagi');
        }
        return view('dashboard.admin.kaprodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slogan' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('kaprodi', 'public');
        }
        Kaprodi::create($data);

        return redirect()->route('admin.kaprodi.index')->with('success', 'Kaprodi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kaprodi $kaprodi)
    {
        return view('dashboard.admin.kaprodi.show', compact('kaprodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kaprodi $kaprodi)
    {
        return view('dashboard.admin.kaprodi.edit', compact('kaprodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kaprodi $kaprodi)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slogan' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($kaprodi->image && Storage::disk('public')->exists($kaprodi->image)) {
                Storage::disk('public')->delete($kaprodi->image);
            }
            $data['image'] = $request->file('image')->store('kaprodi', 'public');
        }
        $kaprodi->update($data);

        return redirect()->route('admin.kaprodi.index')->with('success', 'Kaprodi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kaprodi $kaprodi)
    {
        if ($kaprodi->image && Storage::disk('public')->exists($kaprodi->image)) {
            Storage::disk('public')->delete($kaprodi->image);
        }
        $kaprodi->delete();

        return redirect()->route('admin.kaprodi.index')->with('success', 'Kaprodi deleted successfully.');
    }
}
