<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jobsAlumniController extends Controller
{
    public function index(Request $request){
         if (!Auth::user()->hasRole('alumni')) {
            abort(403);
        }
        $query = Jobs::with('skill');
    
    // Search functionality
    if ($request->filled('search')) {
        $query->where(function($q) use ($request) {
            $q->where('nama_pekerjaan', 'like', '%' . $request->search . '%')
              ->orWhere('nama_perusahaan', 'like', '%' . $request->search . '%');
        });
    }
    
    // Filter by location
    if ($request->filled('lokasi')) {
        $query->where('lokasi', $request->lokasi);
    }
    
    // Filter by job type
    if ($request->filled('tipe_pekerjaan')) {
        $query->where('tipe_pekerjaan', $request->tipe_pekerjaan);
    }
    
    $jobs = $query->latest()->paginate(12);
    
    // Statistics
    $totalJobs = Jobs::count();
    $activeJobs = Jobs::where('created_at', '>=', now()->subDays(30))->count();
    $companiesCount = Jobs::distinct('nama_perusahaan')->count();
    $similarJobs = Jobs::where('nama_pekerjaan', 'like', '%'. $request->search. '%')->get();
    
    // Filter options
    $locations = Jobs::distinct()->pluck('lokasi')->filter();
    $jobTypes = Jobs::distinct()->pluck('tipe_pekerjaan')->filter();
    
    return view('Jobalumni.all', compact(
        'jobs', 'totalJobs', 'activeJobs', 'companiesCount', 
        'locations', 'jobTypes','similarJobs'
    ));
    }


    public function show($slug){
          $job = Jobs::with('skill')
                  ->where('slug', $slug)
                  ->firstOrFail();
    $similarJobs = Jobs::all();

        return view('Jobalumni.detail', compact('job','similarJobs'));
    }
}
