<?php

namespace App\Http\Controllers;

use App\Models\master_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MasterImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $master_images = master_image::paginate(6);
        return view('dashboard.admin.master_image.index', compact('master_images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.master_image.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|in:beranda,jurusan,mapel',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('MasterFoto', 'public');
        }

        master_image::create($data);

        return redirect()->route('admin.master_image.index')->with('success', 'Image uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(master_image $master_image)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(master_image $master_image)
    {
        return view('dashboard.admin.master_image.edit', compact('master_image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, master_image $master_image)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|in:beranda,jurusan,mapel',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($master_image->image && Storage::disk('public')->exists($master_image->image)) {
                Storage::disk('public')->delete($master_image->image);
            }
            $data['image'] = $request->file('image')->store('MasterFoto', 'public');
        }

        $master_image->update($data);

        return redirect()->route('admin.master_image.index')->with('success', 'Image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(master_image $master_image)
    {
        if ($master_image->image && Storage::disk('public')->exists($master_image->image)) {
            Storage::disk('public')->delete($master_image->image);
        }
        $master_image->delete();

        return redirect()->route('admin.master_image.index')->with('success', 'Image deleted successfully.');
    }
}
