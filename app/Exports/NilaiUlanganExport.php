<?php

namespace App\Exports;

use App\Models\nilai_ulangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NilaiUlanganExport implements FromCollection, WithHeadings
{
     protected $ulanganId;

    public function __construct($ulanganId)
    {
        $this->ulanganId = $ulanganId;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $nilaiList = nilai_ulangan::with(['user.siswaprofile', 'user.kelas'])
            ->where('ulangan_id', $this->ulanganId)
            ->get();

        $sorted = $nilaiList->sortBy(function ($nilai) {
            return $nilai->user->siswaprofile->no_absen ?? 9999;
        });

        return $sorted->map(function ($nilai) {
            return [
                'no_absen' => $nilai->user->siswaprofile->no_absen ?? '-',
                'nama' => $nilai->user->siswaProfile->nama,
                'kelas' => $nilai->user->kelas->nama ?? '-',
                'nilai' => $nilai->nilai,
                'status' => $nilai->nilai >= 75 ? 'Lulus' : 'Tidak Lulus',
            ];
        })->values();
    }

    public function headings(): array
    {
        return [
            'no_absen',
            'nama',
            'kelas',
            'nilai',
            'status',
        ];
    }
}
