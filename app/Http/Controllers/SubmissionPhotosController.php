<?php

namespace App\Http\Controllers;

use App\Models\Assignments;
use App\Models\Submission_Photos;
use App\Models\SubmissionsAssignments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Assign;

class SubmissionPhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($assignment_id)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $assignment_id)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Submission_Photos $submission_Photos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission_Photos $submission_Photos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submission_Photos $submission_Photos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission_Photos $submission_Photos)
    {
        //
    }
}
