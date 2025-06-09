@extends('layouts.masterDashboard')
@section('title', 'Tugas Saya')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6">Tugas Saya</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($assignments as $assignment)
            @php
                $now = \Carbon\Carbon::now('Asia/Jakarta');
                $dueDate = \Carbon\Carbon::parse($assignment->due_date)->setTimezone('Asia/Jakarta')->endOfDay();
                $isLate = $now->gt($dueDate);
            @endphp


            <div class="bg-white rounded-xl shadow-md p-5 flex flex-col justify-between h-full">
                <div>
                    <h2 class="text-lg font-semibold mb-2 text-gray-800">{{ $assignment->title }}</h2>

                    <p class="text-sm text-gray-600 mb-4">
                        <strong>Batas Waktu:</strong> {{ $dueDate->format('d M Y H:i') }}
                        @if ($isLate)
                            <span class="ml-2 text-xs text-red-600 font-semibold">(Terlambat)</span>
                        @else
                            <span class="ml-2 text-xs text-green-600 font-semibold">(Masih bisa dikumpulkan)</span>
                        @endif
                    </p>

                    <a href="{{ route('assignments.submission.show', $assignment->id) }}"
                       class="text-blue-600 hover:underline text-sm">
                        📄 Lihat Detail Tugas
                    </a>
                </div>

                <div class="mt-4">
                    @if ($isLate)
                        <button class="w-full bg-gray-300 text-gray-600 font-semibold py-2 px-4 rounded-lg cursor-not-allowed" disabled>
                            Waktu pengumpulan telah berakhir
                        </button>
                    @else
                        <a href="{{ route('submissions.create', $assignment->id) }}"
                           class="w-full inline-block text-center bg-primary hover:bg-primary-dark text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                            ✔ Kumpulkan Tugas
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
