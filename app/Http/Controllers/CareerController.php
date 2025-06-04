<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $queries = Career::query();
        $queries->when(request('search'), function ($query) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        });
        $careers = $queries->paginate(10)->withQueryString();

        return view('dashboard.admin.career.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.career.create');
        
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
            $data['image'] = $request->file('image')->store('career', 'public');
        }

        Career::create($data);

        return redirect()->route('admin.career.index')->with('success', 'career created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
          $career = Career::where('slug', $slug)->firstOrFail();
        return view('dashboard.admin.career.show', compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        return view('dashboard.admin.career.edit', compact('career'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Career $career)
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
            if ($career->image && Storage::disk('public')->exists($career->image)) {
                Storage::disk('public')->delete($career->image);
            }
            $data['image'] = $request->file('image')->store('career', 'public');
        }
        $career->update($data);

        return redirect()->route('admin.career.index')->with('success', 'Carrer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
         if ($career->image && Storage::disk('public')->exists($career->image)) {
            Storage::disk('public')->delete($career->image);
        }
        $career->delete();

        return redirect()->route('admin.career.index')->with('success', 'career deleted successfully.');
    }
}
