<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $queries = Language::query();
        $queries->when(request('search'), function ($query) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        });
        $languages = $queries->paginate(10)->withQueryString();
        return view('dashboard.admin.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.language.create');
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
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('Language', 'public');
        }

        Language::create($data);

        return redirect()->route('admin.language.index')->with('success', 'Language created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $language = Language::where('slug', $slug)->firstOrFail();
        return view('dashboard.admin.language.show', compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        return view('dashboard.admin.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string',
            'icon' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($language->image && Storage::disk('public')->exists($language->image)) {
                Storage::disk('public')->delete($language->image);
            }
            $data['image'] = $request->file('image')->store('Language', 'public');
        }

        $language->update($data);

        return redirect()->route('admin.language.index')->with('success', 'Language updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        if ($language->image && Storage::disk('public')->exists($language->image)) {
            Storage::disk('public')->delete($language->image);
        }
        $language->delete();

        return redirect()->route('admin.language.index')->with('success', 'Language deleted successfully.');
    }
}
