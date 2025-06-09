<?php

namespace App\Http\Controllers;

use App\Models\Assignments;
use App\Models\kelas;
use App\Models\SubmissionsAssignments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignments = Assignments::with('kelas', 'photos')->get();
        return view('dashboard.guru.assignments.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $kelases = kelas::all();
        return view('dashboard.guru.assignments.create', compact('kelases'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
   {
        $request->validate([
            'title' => 'required|string|max:255',
            'instructions' => 'nullable|string',
            'due_date' => 'required|date',
            'link' => 'nullable|url',
            'pdf_path' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
            'kelas_id' => 'required|exists:kelas,id',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $assignment = Assignments::create([
            'title' => $request->title,
            'instructions' => $request->instructions,
            'due_date' => $request->due_date,
            'link' => $request->link,
            'kelas_id' => $request->kelas_id,
        ]);

        if ($request->hasFile('file')) {
            $assignment->file = $request->file('file')->store('assignment_files', 'public');
        }

        $assignment->save();

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('assignment_photos', 'public');
                $assignment->photos()->create(['photo_path' => $path]);
            }
        }

        return redirect()->route('assignments.index')->with('success', 'Tugas berhasil dibuat.');
    }


    public function showSubmissions($kelas_id)
    {
        $assignments = Assignments::where('kelas_id', $kelas_id)->with('submissions')->get();
        return view('dashboard.siswa.submissions.show_submissions', compact('assignments'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Assignments $assignment)
    {
     $assignment->load('kelas');

$query = SubmissionsAssignments::where('assignment_id', $assignment->id)
    ->with(['user', 'photos']);

if ($search = request('search')) {
    $query->whereHas('user', function ($q) use ($search) {
        $q->where('name', 'like', '%' . substr($search, 0, 100) . '%');
    });
}

// Simpan hasil query pencarian ke variabel `$submissions`
$submissions = $query->orderBy('created_at', 'desc')->paginate(9)->withQueryString();

return view('dashboard.guru.assignments.show', compact('assignment', 'submissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignments $assignment)
    {
        $kelases = kelas::all();
        return view('dashboard.guru.assignments.edit', compact('assignment', 'kelases'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assignments $assignment)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'instructions' => 'required|string',
            'due_date' => 'required|date',
            'kelas_id' => 'required|exists:kelas,id',
            'link' => 'nullable|url',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
        ]);

        $assignment->update([
            'title' => $request->title,
            'instructions' => $request->instructions,
            'due_date' => $request->due_date,
            'kelas_id' => $request->kelas_id,
            'link' => $request->link,
        ]);

        if ($request->hasFile('file')) {
            if ($assignment->file) {
                Storage::delete($assignment->file);
            }
            $assignment->file = $request->file('file')->store('assignment_files', 'public');
        }

        if ($request->hasFile('photos')) {
            foreach ($assignment->photos as $photo) {
                Storage::delete($photo->photo_path);
                $photo->delete();
            }

            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('assignment_photos', 'public');
                $assignment->photos()->create(['photo_path' => $path]);
            }
        }

        $assignment->save();

        return redirect()->route('assignments.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignments $assignment)
    {
        if ($assignment->photos) {
            foreach ($assignment->photos as $photo) {
                Storage::delete($photo->photo_path);
            }

            $assignment->photos()->delete();
        }

        if ($assignment->file) {
            Storage::delete($assignment->file);
        }

        $assignment->submissions()->delete();
        $assignment->delete();

        return redirect()->route('assignments.index')->with('success', 'Tugas berhasil dihapus.');
    }
}
