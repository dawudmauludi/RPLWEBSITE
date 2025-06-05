<?php

namespace App\Http\Controllers;

use App\Models\like_ulasan;
use App\Models\ulasan_alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['ulasan' => 'required|string']);

        ulasan_alumni::create([
            'user_id' => Auth::user()->id,
            'ulasan' => $request->ulasan,
        ]);

        return redirect()->back()->with('success', 'Ulasan ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ulasan_alumni $ulasan_alumni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ulasan_alumni $ulasan_alumni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ulasan_alumni $ulasan_alumni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ulasan = ulasan_alumni::findOrFail($id);
        $user = Auth::user();

        if ($user->role === 'admin' || $ulasan->user_id == $user->id) {
            $ulasan->like()->delete(); // delete likes first
            $ulasan->delete();
            return redirect()->back()->with('success', 'Ulasan dihapus!');
        }

        return redirect()->back()->with('error', 'Tidak diizinkan!');
    }

    public function toggleLike($id)
    {
        $ulasan = ulasan_alumni::findOrFail($id);
        $userId = Auth::user()->id;

        $existing = like_ulasan::where('ulasan_alumni_id', $id)->where('user_id', $userId)->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['liked' => false]);
        } else {
            like_ulasan::create([
                'ulasan_alumni_id' => $id,
                'user_id' => $userId,
            ]);
            return response()->json(['liked' => true]);
        }
    }
}
