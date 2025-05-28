<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\category_karya;
use App\Models\guru_profile;
use App\Models\karya_siswa;
use App\Models\siswa_profile;
use App\Models\ulangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
                'admin' => User::whereHasRole('admin')->count(),
                'guru' => User::whereHasRole('guru')->count(),
                'siswa' => User::whereHasRole('siswa')->count(),
            ];

            $statusApprove = [
                'pending' => User::where('status', 'pending')->count(),
                'disetujui' => User::where('status', 'approved')->count(),
                'ditolak' => User::where('status', 'rejected')->count(),
            ];

;

        $aktivitasBerita = collect();

    for ($i = 0; $i < 21; $i++) {
        $startOfWeek = Carbon::now('Asia/Jakarta')->subWeeks($i)->startOfWeek();
        $endOfWeek = Carbon::now('Asia/Jakarta')->subWeeks($i)->endOfWeek();

        $jumlah = berita::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();

        if ($jumlah > 0) {
            $aktivitasBerita->push([
                'minggu' => $startOfWeek->format('d M'),
                'jumlah' => $jumlah
            ]);
        }
    }

    $aktivitasBerita = $aktivitasBerita->reverse();


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
            $jumlahKaryaTerbaik = karya_siswa::count();

            $jumlahSiswa = User::whereHasRole('siswa')->count();

            $tanggalHariIni = Carbon::now();
            $ujianAktif = ulangan::where('mulai', '>', $tanggalHariIni)
            ->orderBy('mulai')
            ->get();

           $topSiswa = User::whereHas('roles', function ($query) {
                $query->where('name', 'siswa');
            })
            ->withCount('karyaSiswa')
            ->orderByDesc('karya_siswa_count')
            ->take(3)
            ->get();

            $karyaPerBulan = [];
            for ($i = 1; $i <= 12; $i++) {
                $karyaPerBulan[] = [
                    'bulan' => Carbon::create()->month($i)->format('M'),
                    'jumlah' => karya_siswa::whereMonth('created_at', $i)->count(),
                ];
            }


           $aktivitasKarya = collect();

            for ($i = 0; $i < 21; $i++) {
                $startOfWeek = Carbon::now('Asia/Jakarta')->subWeeks($i)->startOfWeek();
                $endOfWeek = Carbon::now('Asia/Jakarta')->subWeeks($i)->endOfWeek();

                $jumlah = karya_siswa::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();

                if ($jumlah > 0) {
                    $aktivitasKarya->push([
                        'minggu' => $startOfWeek->format('d M'),
                        'jumlah' => $jumlah
                    ]);
                }
            }

            $aktivitasKarya = $aktivitasKarya->reverse();




            return view('dashboard.guru.index', [
                'jumlahKaryaTerbaik' => $jumlahKaryaTerbaik,
                'jumlahSiswa' => $jumlahSiswa,
                'ujianAktif' => $ujianAktif,
                'topSiswa' => $topSiswa,
                'karyaPerBulan' => $karyaPerBulan,
                'aktivitasKarya' => $aktivitasKarya,
            ]);
        } elseif ($user->hasRole('siswa')) {

            $karyaSaya = $user->karyaSiswa()->latest()->take(3)->get();

            $kelasSiswa = $user->kelas;

            if(!$kelasSiswa){
                return redirect()->route('siswa.profile')->with('error', 'Anda belum memiliki kelas. Silakan lengkapi profil Anda terlebih dahulu.');
            }

            $ulanganKelas = Ulangan::where('kelas_id', $kelasSiswa->id)
                ->where('is_active', 1)
                ->get();


            $beritaHariIni = Berita::whereDate('created_at', Carbon::today('Asia/Jakarta'))->get();

            $karyaPerBulan = collect(range(1, 12))->map(function ($bulan) use ($user) {
                return [
                    'bulan' => Carbon::create()->month($bulan)->format('M'),
                    'jumlah' => $user->karyaSiswa()->whereMonth('created_at', $bulan)->count(),
                ];
            });

            return view('dashboard.siswa.index', [
                'karyaSaya' => $karyaSaya,
                'ulanganKelas' => $ulanganKelas,
                'beritaHariIni' => $beritaHariIni,
                'karyaPerBulan' => $karyaPerBulan,
            ]);
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
