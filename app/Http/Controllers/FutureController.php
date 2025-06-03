<?php

namespace App\Http\Controllers;

use App\Models\Future;
use Illuminate\Http\Request;

class FutureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Future::query();

        if ($search = request('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        }

        $futures = $query->paginate(10)->withQueryString();

        return view('dashboard.admin.future.index', compact('futures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.future.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
        ]);

        Future::create([
            'name' => $request->name,
            'description' => $request->description,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.future.index')->with('success', 'Future created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Future $future)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Future $future)
    {
        return view('dashboard.admin.future.edit', compact('future'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Future $future)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
        ]);

        $future->update([
            'name' => $request->name,
            'description' => $request->description,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.future.index')->with('success', 'Future updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Future $future)
    {
        $future->delete();
        return redirect()->route('admin.future.index')->with('success', 'Future deleted successfully.');
    }
}
