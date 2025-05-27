@extends('layouts.masterDashboard')
@section('title', 'Nilai Ulangan')

@section('content')
<div class="max-w-4xl mx-auto mt-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="flex justify-between items-center bg-primary px-6 py-4">
            <h3 class="text-white text-xl font-semibold">Nilai Ulangan: {{ $ulangan->judul }}</h3>
            <a href="{{ route('nilai.index') }}" class="inline-flex items-center bg-gray-100 text-gray-700 px-3 py-1.5 rounded hover:bg-gray-200 transition">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="p-6 overflow-x-auto">
            @if($nilaiList->isEmpty())
                <div class="text-gray-500">Belum ada nilai yang tersedia.</div>
            @else
                <table class="min-w-full text-sm text-center border border-gray-300">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="py-3 px-4 border border-gray-300">Nama Siswa</th>
                            <th class="py-3 px-4 border border-gray-300">Kelas</th>
                            <th class="py-3 px-4 border border-gray-300">Nilai</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($nilaiList as $nilai)
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4 border border-gray-300">{{ $nilai->user->nama }}</td>
                                <td class="py-3 px-4 border border-gray-300">{{ $nilai->user->kelas->nama ?? '-' }}</td>
                                <td class="py-3 px-4 border border-gray-300">{{ $nilai->nilai }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
