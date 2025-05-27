<?php

namespace App\Http\Controllers;

use App\Exports\NilaiUlanganExport;
use App\Models\ulangan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NilaiExportController extends Controller
{
    public function export($ulanganId)
    {
        $ulangan = ulangan::findOrFail($ulanganId);
        $fileName = 'nilai_' . str_replace(' ', '_', strtolower($ulangan->judul)) . '.xlsx';
        return Excel::download(new NilaiUlanganExport($ulanganId), $fileName);
    }
}
