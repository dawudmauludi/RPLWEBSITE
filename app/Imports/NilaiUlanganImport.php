<?php

namespace App\Imports;

use App\Models\nilai_ulangan;
use App\Models\NilaiUlangan;
use App\Models\siswa_profile;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class NilaiUlanganImport implements ToCollection, WithHeadingRow
{
    protected $ulangan_id;

    public function __construct($ulangan_id)
    {
        $this->ulangan_id = $ulangan_id;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Cari siswa berdasarkan nama di SiswaProfile
            $siswaProfile = siswa_profile::where('nama', $row['nama'])->first();

            if (!$siswaProfile) {
                // Jika tidak ditemukan, skip baris ini atau bisa buat handling lain
                continue;
            }

            // Dapatkan user_id dari siswaProfile (asumsi ada relasi user)
            $user_id = $siswaProfile->user_id;

            // Cek data nilai ulangan sudah ada atau belum
            $nilaiUlangan = nilai_ulangan::where('ulangan_id', $this->ulangan_id)
                ->where('user_id', $user_id)
                ->first();

            if ($nilaiUlangan) {
                // Update nilai
                $nilaiUlangan->nilai = $row['nilai'];
                $nilaiUlangan->save();
            } else {
                // Insert data baru
                nilai_ulangan::create([
                    'ulangan_id' => $this->ulangan_id,
                    'user_id' => $user_id,
                    'nilai' => $row['nilai'],
                ]);
            }
        }
    }
}
