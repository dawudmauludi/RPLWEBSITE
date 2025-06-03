<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $queries = Lesson::query();
        $queries->when(request('search'), function ($query) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        });
        $lessons = $queries->paginate(10)->withQueryString();

        return view('dashboard.admin.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.lesson.create');
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
            $data['image'] = $request->file('image')->store('lessons', 'public');
        }

        Lesson::create($data);

        return redirect()->route('admin.lesson.index')->with('success', 'Lesson created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $lesson = Lesson::where('slug', $slug)->firstOrFail();
        return view('dashboard.admin.lesson.show', compact('lesson'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        return view('dashboard.admin.lesson.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
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
            if ($lesson->image && Storage::disk('public')->exists($lesson->image)) {
                Storage::disk('public')->delete($lesson->image);
            }
            $data['image'] = $request->file('image')->store('lessons', 'public');
        }
        $lesson->update($data);

        return redirect()->route('admin.lesson.index')->with('success', 'Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        if ($lesson->image && Storage::disk('public')->exists($lesson->image)) {
            Storage::disk('public')->delete($lesson->image);
        }
        $lesson->delete();

        return redirect()->route('admin.lesson.index')->with('success', 'Lesson deleted successfully.');
    }
}
