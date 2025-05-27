@extends('layouts.masterDashboard')
@section('title', 'Nilai Ulangan')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-primary px-6 py-4 text-white flex justify-between items-center">
            <h2 class="text-lg font-semibold">Nilai Ulangan: {{ $ulangan->judul }}</h2>
            <a href="{{ route('ulangans.show', $ulangan->id ?? '') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded hover:bg-gray-300 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali
            </a>
        </div>

        <div class="p-6">
            @if ($nilaiList->isEmpty())
                <div class="bg-yellow-100 text-yellow-800 p-4 rounded text-sm">
                    Belum ada nilai yang tersedia.
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 border border-gray-300 text-sm">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left font-medium border border-gray-300">Nama Siswa</th>
                                <th class="px-6 py-3 text-left font-medium border border-gray-300">Kelas</th>
                                <th class="px-6 py-3 text-center font-medium border border-gray-300">Nilai</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($nilaiList as $nilai)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 border border-gray-300">{{ $nilai->user->nama }}</td>
                                    <td class="px-6 py-4 border border-gray-300">{{ $nilai->user->kelas->nama ?? '-' }}</td>
                                    <td class="px-6 py-4 border border-gray-300 text-center">{{ $nilai->nilai }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
