@extends('layouts.masterDashboard')
@section('title', 'Edit Nilai')

@section('content')
<div class="max-w-6xl mx-auto p-6 mt-10 bg-white shadow-lg rounded-lg">
    <form action="{{ route('nilai.bulkUpdate') }}" method="POST">
        @csrf
        <input type="hidden" name="ulangan_id" value="{{ $ulangan->id }}">

        <h2 class="text-xl font-semibold text-gray-800 mb-6">
            Edit Nilai Ulangan: <span class="text-primary font-bold">{{ $ulangan->judul }}</span>
        </h2>

        @if($ulangan->nilaiUlangans->isEmpty())
            <div class="text-gray-500">Belum ada data nilai.</div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-200 text-sm text-center">
                    <thead class="bg-gray-100 text-gray-700 font-semibold">
                        <tr>
                            <th class="px-4 py-3 border border-gray-300">No</th>
                            <th class="px-4 py-3 border border-gray-300 text-left">Nama Siswa</th>
                            <th class="px-4 py-3 border border-gray-300 text-left">Kelas</th>
                            <th class="px-4 py-3 border border-gray-300">Nilai</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($ulangan->nilaiUlangans as $index => $nilai)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 border border-gray-300">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 border border-gray-300 text-left">{{ $nilai->user->nama }}</td>
                                <td class="px-4 py-3 border border-gray-300 text-left">
                                    {{ $nilai->user->kelas->nama ?? '-' }}
                                </td>
                                <td class="px-4 py-3 border border-gray-300">
                                    <input
                                        type="number"
                                        name="nilai[{{ $nilai->id }}]"
                                        value="{{ $nilai->nilai }}"
                                        class="w-24 text-center border border-gray-300 rounded py-1 px-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        min="0"
                                        max="100"
                                        required
                                    />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-md shadow">
                    💾 Simpan Nilai
                </button>
            </div>
        @endif
    </form>
</div>
@endsection
