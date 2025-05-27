@extends('layouts.masterDashboard')
@section('title', 'Daftar Ulangan')

@section('content')
<div class="max-w-4xl mx-auto mt-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-primary px-6 py-4">
            <h3 class="text-white text-xl font-semibold">Daftar Ulangan Kelas Anda</h3>
        </div>

        <div class="p-6">
            @if($ulanganList->isEmpty())
                <div class="text-gray-600">Belum ada ulangan tersedia.</div>
            @else
                <ul class="space-y-4">
                    @foreach ($ulanganList as $ulangan)
                        <li class="flex items-center justify-between bg-gray-100 p-4 rounded hover:bg-gray-200 transition">
                            <span class="text-gray-800 font-medium">{{ $ulangan->judul }}</span>
                            <a href="{{ route('nilai.showNilai', $ulangan->id) }}" class="bg-primary hover:bg-primary-dark text-white px-4 py-2 text-sm rounded shadow">
                                Lihat Nilai
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
