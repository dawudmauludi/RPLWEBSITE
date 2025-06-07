<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Skill;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
                $query = Jobs::query();

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_pekerjaan', 'LIKE', '%' . $search . '%')
                  ->orWhere('nama_perusahaan', 'LIKE', '%' . $search . '%')
                  ->orWhere('lokasi', 'LIKE', '%' . $search . '%');
            });
        }

        // Filter by job type
        if ($request->has('filter_tipe') && $request->filter_tipe != '') {
            $query->where('tipe_pekerjaan', $request->filter_tipe);
        }

        // Filter by work location
        if ($request->has('filter_tempat') && $request->filter_tempat != '') {
            $query->where('tempat_kerja', $request->filter_tempat);
        }

        // Order by latest
        $query->orderBy('created_at', 'desc');

        // Paginate results
        $jobs = $query->paginate(10);

        // Preserve query parameters in pagination
        $jobs->appends($request->query());




        return view('dashboard.admin.Jobsheet.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.Jobsheet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_pekerjaan' => 'required|string',
            'nama_perusahaan' => 'required|string',
            'lokasi' => 'required|string',
            'tipe_pekerjaan' => 'required|string',
            'tempat_kerja' => 'required|string',
            'deskripsi_pekerjaan' => 'required|string',
            'gaji' => 'required|string',
            'link_pendaftaran' =>'required|string',
            'waktu_pekerjaan' => 'required|string',
            'skills' => 'nullable|string|max:255',
        ]);

         $data = $request->all();

      $slug = Str::slug($data['nama_pekerjaan']);
        $originalSlug = $slug;
        $counter = 1;
        while (Jobs::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        $data['slug'] = $slug;

        $gambarJobs =$request->file('image')->store('gambar Jobs', 'public');

        $createJobs = Jobs::create([
            'user_id' => auth()->user()->id,
            'nama_pekerjaan' => $validate['nama_pekerjaan'],
            'nama_perusahaan' => $validate['nama_perusahaan'],
            'lokasi' => $validate['lokasi'],
            'tipe_pekerjaan' => $validate['tipe_pekerjaan'],
            'tempat_kerja' => $validate['tempat_kerja'],
            'deskripsi_pekerjaan' => $validate['deskripsi_pekerjaan'],
            'gaji' => $validate['gaji'],
            'link_pendaftaran' => $validate['link_pendaftaran'],
            'waktu_pekerjaan' => $validate['waktu_pekerjaan'],
            'image' => $gambarJobs,
            'slug' => $slug
        ]);

         $skills = json_decode($request->skills, true);
    if (!empty($skills)) {
        foreach ($skills as $skill) {
            Skill::create([
                'jobsheet_id' => $createJobs->id,
                'name' => $skill,
            ]);
        }
    }

    return redirect()->route('admin.jobs.index')->with('success', 'Jobsheet berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jobs $jobs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobs $job)
    {
         if (!Auth::user()->hasRole('admin')) {
            abort(403);
        }

         $job->load('skill');
        return view('dashboard.admin.Jobsheet.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jobs $job)
    {
          if (!Auth::user()->hasRole('admin')) {
            abort(403);
        }
          $request->validate([
        'nama_pekerjaan' => 'required|string',
            'nama_perusahaan' => 'required|string',
            'lokasi' => 'required|string',
            'tipe_pekerjaan' => 'required|string',
            'tempat_kerja' => 'required|string',
            'deskripsi_pekerjaan' => 'required|string',
            'gaji' => 'required|string',
            'link_pendaftaran' =>'required|string',
            'waktu_pekerjaan' => 'required|string',
            'skills.*' => 'nullable|string|max:255',
    ]);

     $data = $request->except(['skills', 'image']);

     if ($job->nama_pekerjaan != $request->nama_pekerjaan) {
    $slug = Str::slug($data['nama_pekerjaan']);
    $originalSlug = $slug;
    $counter = 1;
    while (Jobs::where('slug', $slug)->where('id', '!=', $job->id)->exists()) {
        $slug = $originalSlug . '-' . $counter++;
    }
    $data['slug'] = $slug;
}


    // Simpan gambar karya utama
if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($job->image) {
            Storage::disk('public')->delete($job->image);
        }
        $data['image'] = $request->file('image')->store('gambar Jobs', 'public');
    }

    // Simpan data karya
       $job->update($data);



    Skill::where('jobsheet_id', $job->id)->delete();

// Proses skills
// Ganti bagian penanganan skills dengan:
$skills = [];
if (!empty($request->skills)) {
    $decoded = json_decode($request->skills, true);

    if (json_last_error() === JSON_ERROR_NONE) {
        $skills = $decoded;
    } else {
        // Fallback untuk format lama (harusnya tidak terjadi jika JS sudah diperbaiki)
        $skills = array_filter(array_map('trim', explode(',', $request->skills)));
    }

    // Pastikan jobs->id tersedia
    if (!$job->id) {
        throw new \Exception("Job ID tidak valid");
    }

    foreach ($skills as $skill) {
        Skill::create([
            'jobsheet_id' => $job->id,
            'name' => $skill
        ]);
    }
}

        return redirect()->route('admin.jobs.index')->with('success', 'Jobs berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobs $jobs)
    {
        //
    }
}
