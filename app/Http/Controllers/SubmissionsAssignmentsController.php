<?php

namespace App\Http\Controllers;

use App\Models\Assignments;
use App\Models\SubmissionsAssignments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class SubmissionsAssignmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $kelas_id = Auth::user()->kelas->id;
        $assignments = Assignments::where('kelas_id', $kelas_id)->get();
        return view('dashboard.siswa.submissions.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($assignment_id)
    {
        $assignments = Assignments::findOrFail($assignment_id);
        return view('dashboard.siswa.submissions.create', compact('assignments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $assignment_id)
    {
        $request->validate([
            'link' => 'nullable|url',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $submission = SubmissionsAssignments::create([
            'user_id' => Auth::id(),
            'assignment_id' => $assignment_id,
            'link' => $request->link,
        ]);

        if ($request->hasFile('file')) {
            $submission->file = $request->file('file')->store('submissions_file', 'public');
            $submission->save();
        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos', []) as $photo) {
                $path = $photo->store('submission_photos', 'public');
                $submission->photos()->create(['photo_path' => $path]);
            }
        }

        return redirect()->route('submissions.index')->with('success', 'Submission created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(SubmissionsAssignments $submissionsAssignments)
    {

    }
    public function showSubmission(Assignments $assignment)
    {
        $user = FacadesAuth::user();

        $assignment->load('kelas', 'photos');

       $submission = $assignment->submissions()
    ->where('user_id', $user->id)
    ->with('photos')
    ->orderBy('created_at', 'desc') // yang terbaru di atas
    ->get();

        return view('dashboard.siswa.submissions.show', compact('assignment', 'submission'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubmissionsAssignments $submissionsAssignments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubmissionsAssignments $submissionsAssignments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubmissionsAssignments $submissionsAssignments)
    {
        //
    }
}
