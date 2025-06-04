<?php

namespace App\Http\Controllers;

use App\Models\Development;
use App\Models\ListDevelopment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class DevelopmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $query = Development::query();

        if ($search = request('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        }

        $developments = $query->paginate(10)->withQueryString();

        return view('dashboard.admin.development.index', compact('developments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.development.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string',
            'icon' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'listDevelopment' => 'nullable|array',
            'listDevelopment.*.name' => 'required|string',
        ]);


        $data = $request->all();

         $slug = Str::slug($data['name']);
        $originalSlug = $slug;
        $counter = 1;
        while (Development::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('Development', 'public');
        }

       $development= Development::create($data);


        if ($request->listDevelopment) {
    foreach ($request->listDevelopment as $list) {
        if (!empty($list['name'])) {
            ListDevelopment::create([
                'development_id' => $development->id,
                'name' => $list['name'],
            ]);
        }
    }
          }

        return redirect()->route('admin.development.index')->with('success','Development Berhasil Di buat');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
         $development = Development::with(['listDevelopment'])->where('slug', $slug)->firstOrFail();
        return view('dashboard.admin.development.show', compact('development'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Development $development)
    {
        return view('dashboard.admin.development.edit', compact('development'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Development $development)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string',
            'icon' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'listDevelopment' => 'nullable|array',
            'listDevelopment.*.name' => 'required|string',
        ]);


        $data = $request->all();

         $slug = Str::slug($data['name']);
        $originalSlug = $slug;
        $counter = 1;
        while (Development::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('Development', 'public');
        }

       $development->update($data);


        $development->listDevelopment()->delete();

        if ($request->listDevelopment) {
            foreach ($request->listDevelopment as $list) {
                if (!empty($list['name'])) {
                    ListDevelopment::create([
                        'development_id' => $development->id,
                        'name' => $list['name'],
                    ]);
                }
            }
        }

        return redirect()->route('admin.development.index')->with('success','Development Berhasil Di buat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Development $development)
    {
        if ($development->image && Storage::disk('public')->exists($development->image)) {
            Storage::disk('public')->delete($development->image);
        }
        $development->delete();
        $development->listDevelopment()->delete();

        return redirect()->route('admin.development.index')->with('success', 'Lesson deleted successfully.');
    }
}
