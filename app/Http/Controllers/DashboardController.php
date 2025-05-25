<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\guru_profile;
use App\Models\siswa_profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $totalGuru = guru_profile::count();
            $totalSiswa = siswa_profile::count();
            $totalBerita = Berita::count();
            $totalUser = User::count();
            $approvePending = User::where('status', 'pending')->count();

            $pendaftaran = collect(range(1, 12))->map(function ($bulan) {
                $siswa = User::whereHas('roles', function ($query) {
                        $query->where('name', 'siswa');
                    })
                    ->whereMonth('created_at', $bulan)
                    ->count();
                $guru = User::whereHas('roles', function ($query) {
                        $query->where('name', 'guru');
                    })
                    ->whereMonth('created_at', $bulan)
                    ->count();
                return [
                    'bulan' => $bulan,
                    'siswa' => $siswa,
                    'guru' => $guru,
                ];
            });

            $distribusiUser = [
                'admin' => User::whereRoleIs('admin')->count(),
                'guru' => User::whereRoleIs('guru')->count(),
                'siswa' => User::whereRoleIs('siswa')->count(),
            ];

            $statusApprove = [
                'pending' => User::where('status', 'pending')->count(),
                'disetujui' => User::where('status', 'approved')->count(),
                'ditolak' => User::where('status', 'rejected')->count(),
            ];

            $aktivitasBerita = berita::select(
                DB::raw("WEEK(created_at) as minggu"),
                DB::raw("count(*) as jumlah")
            )
            ->groupBy(DB::raw("WEEK(created_at)"))
            ->get();

            return view('dashboard.admin.index', [
                'summary' => [
                    'guru' => $totalGuru,
                    'siswa' => $totalSiswa,
                    'berita' => $totalBerita,
                    'user' => $totalUser,
                    'approvePending' => $approvePending,
                ],
                'pendaftaranPerBulan' => $pendaftaran,
                'distribusiUser' => $distribusiUser,
                'statusApprove' => $statusApprove,
                'aktivitasBerita' => $aktivitasBerita,
            ]);
        } elseif ($user->hasRole('guru')) {
            return view('dashboard.guru.index');
        } elseif ($user->hasRole('siswa')) {
            return view('dashboard.siswa.index');
        } else {
            abort(403, 'Unauthorized');
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
