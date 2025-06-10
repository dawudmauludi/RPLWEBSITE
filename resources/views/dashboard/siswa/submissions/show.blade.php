@extends('layouts.masterDashboard')

@section('title', 'Detail Tugas')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50">
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800">
                Detail Tugas
            </h1>
            <div class="w-24 h-1 bg-black mx-auto rounded-full"></div>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden mb-8 border border-gray-100">
            <div class="bg-primary px-8 py-6">
                <h2 class="text-3xl font-bold text-white flex items-center gap-3">
                    <div class="bg-white bg-opacity-20 rounded-full p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    {{ $assignment->title }}
                </h2>
            </div>

            <div class="p-8 space-y-6">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="bg-blue-500 rounded-xl p-3 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Instruksi Tugas</h3>
                            <div class="prose max-w-none text-gray-700 leading-relaxed">
                                {!! $assignment->instructions !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @php
                        $now = \Carbon\Carbon::now('Asia/Jakarta');
                        $dueDate = \Carbon\Carbon::parse($assignment->due_date)->setTimezone('Asia/Jakarta')->endOfDay();
                        $isLate = $now->gt($dueDate);
                        $timeLeft = $now->diffForHumans($dueDate, true);
                    @endphp

                    <div class="bg-gradient-to-r from-red-50 to-pink-50 rounded-2xl p-6 border {{ $isLate ? 'border-red-200' : 'border-orange-200' }}">
                        <div class="flex items-center gap-4 mb-3">
                            <div class="bg-{{ $isLate ? 'red' : 'orange' }}-500 rounded-xl p-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-800">Batas Waktu</h4>
                                <p class="text-{{ $isLate ? 'red' : 'orange' }}-600 font-semibold">
                                    {{ \Carbon\Carbon::parse($assignment->due_date)->setTimezone('Asia/Jakarta')->endOfDay()->format('d M Y H:i') }}
                                </p>
                                @if (!$isLate)
                                    <p class="text-sm text-gray-600 mt-1">Sisa waktu: {{ $timeLeft }}</p>
                                @else
                                    <p class="text-sm text-red-600 font-medium mt-1">⚠️ Waktu telah berakhir</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-200">
                        <div class="flex items-center gap-4">
                            <div class="bg-green-500 rounded-xl p-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-800">Kelas</h4>
                                <p class="text-green-600 font-semibold text-lg">{{ $assignment->kelas->nama ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($assignment->link || $assignment->file)
                    <div class="bg-gradient-to-r from-yellow-50 to-amber-50 rounded-2xl p-6 border border-yellow-200">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="bg-yellow-500 rounded-xl p-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-gray-800">Lampiran Tugas</h4>
                        </div>

                        <div class="space-y-3">
                            @if ($assignment->link)
                                <div class="flex items-center gap-3 p-4 bg-white rounded-xl border border-yellow-200 hover:shadow-md transition-all duration-200">
                                    <div class="bg-blue-100 rounded-lg p-2">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                        </svg>
                                    </div>
                                    <a href="{{ $assignment->link }}"
                                       class="text-blue-600 hover:text-blue-800 font-medium underline transition-colors flex-1"
                                       target="_blank">
                                        {{ $assignment->link }}
                                    </a>
                                </div>
                            @endif

                            @if ($assignment->file)
                                <div class="flex items-center gap-3 p-4 bg-white rounded-xl border border-yellow-200 hover:shadow-md transition-all duration-200">
                                    <div class="bg-green-100 rounded-lg p-2">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <a href="{{ asset('storage/' . $assignment->file) }}"
                                       class="text-green-600 hover:text-green-800 font-medium underline transition-colors flex-1"
                                       target="_blank">
                                        Download File Tugas
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                @if ($assignment->photos && $assignment->photos->count())
                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl p-6 border border-purple-200">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="bg-purple-500 rounded-xl p-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-bold text-gray-800">Galeri Foto</h4>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($assignment->photos as $photo)
                                <div class="group relative overflow-hidden rounded-xl shadow hover:shadow-lg transition-all duration-300">
                                    <img
                                        src="{{ asset('storage/' . $photo->photo_path) }}"
                                        class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300 cursor-pointer"
                                        alt="Foto Tugas"
                                        onclick="openModal('{{ asset('storage/' . $photo->photo_path) }}')"
                                    >
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden mb-8 border border-gray-100">
            <div class="bg-gradient-to-r from-teal-600 to-cyan-600 px-8 py-6">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <div class="bg-white bg-opacity-20 rounded-full p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    History Pengumpulan Tugas Kamu
                </h2>
            </div>

            <div class="p-8">
                @php
                    $now = \Carbon\Carbon::now('Asia/Jakarta');
                    $dueDate = \Carbon\Carbon::parse($assignment->due_date)->setTimezone('Asia/Jakarta')->endOfDay();
                    $isLate = $now->gt($dueDate);
                @endphp

                @if ($submission->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="w-full bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-200">
                            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                            </svg>
                                            Link Tugas
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            File Tugas
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            Foto Tugas
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider border-b border-gray-200">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Waktu Submit
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($submission as $index => $sub)
                                <tr class="hover:bg-gray-50 transition-colors duration-200 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-25' }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($sub->link)
                                            <a href="{{ $sub->link }}" target="_blank"
                                               class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium underline transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                                </svg>
                                                Lihat Link
                                            </a>
                                        @else
                                            <span class="text-gray-400 italic">Tidak ada link</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($sub->file)
                                            <a href="{{ asset('storage/' . $sub->file) }}" target="_blank"
                                               class="inline-flex items-center gap-2 text-green-600 hover:text-green-800 font-medium underline transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                Download
                                            </a>
                                        @else
                                            <span class="text-gray-400 italic">Tidak ada file</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($sub->photos && $sub->photos->count())
                                            <div class="flex flex-wrap gap-2">
                                                @foreach ($sub->photos as $photo)
                                                    <div class="relative group">
                                                        <img
                                                            src="{{ asset('storage/' . $photo->photo_path) }}"
                                                            alt="Photo"
                                                            class="w-16 h-16 rounded-lg object-cover cursor-pointer border-2 border-gray-200 hover:border-purple-300 transition-all duration-200 hover:shadow-lg"
                                                            onclick="openModal('{{ asset('storage/' . $photo->photo_path) }}')"
                                                        >
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-gray-400 italic">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <div class="bg-blue-100 rounded-full p-1">
                                                <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <span class="text-gray-700 font-medium">
                                                {{ $sub->created_at->timezone('Asia/Jakarta')->format('d M Y H:i') }}
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="bg-gray-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Pengumpulan</h3>
                        <p class="text-gray-500 mb-6">Kamu belum mengumpulkan tugas ini.</p>

                        @if ($isLate)
                            <div class="inline-flex items-center gap-3 bg-gray-100 text-gray-600 font-semibold py-4 px-8 rounded-2xl cursor-not-allowed">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.966-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                Waktu pengumpulan telah berakhir
                            </div>
                        @else
                            <a href="{{ route('submissions.create', $assignment->id) }}"
                               class="inline-flex items-center gap-3 bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white font-semibold py-4 px-8 rounded-2xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Kumpulkan Tugas Sekarang
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('submissions.index') }}"
               class="inline-flex items-center gap-3 bg-white hover:bg-gray-50 text-gray-700 font-semibold px-8 py-4 rounded-2xl shadow-lg border border-gray-200 transition-all duration-200 hover:shadow-xl transform hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Daftar Tugas
            </a>
        </div>
    </div>


    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
        <span class="absolute top-5 right-5 text-white cursor-pointer text-3xl font-bold" onclick="closeModal()">&times;</span>
        <img id="modalImage" src="" alt="Large Photo" class="max-w-full max-h-full rounded">
    </div>

    <script>
        function openModal(src) {
            document.getElementById('modalImage').src = src;
            document.getElementById('imageModal').classList.remove('hidden');
        }
        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.getElementById('modalImage').src = '';
        }

        // Optional: tutup modal jika klik di luar gambar
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target.id === 'imageModal') {
                closeModal();
            }
        });
    </script>

</div>
@endsection
