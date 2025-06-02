@extends('layouts.masterDashboard')
@section('title', 'Nilai Ulangan')
@section('content')

<!-- Include Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-purple-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('nilai.index') }}"
                       class="bg-white hover:bg-gray-50 text-gray-600 hover:text-purple-600 p-3 rounded-xl shadow-sm border border-gray-200 transition duration-200">
                        <i data-feather="arrow-left" class="w-5 h-5"></i>
                    </a>
                    <div>
                        <div class="flex items-center space-x-3 mb-2">
                            <div class="bg-purple-100 p-2 rounded-lg">
                                <i data-feather="award" class="w-6 h-6 text-purple-600"></i>
                            </div>
                            <h1 class="text-3xl font-bold text-gray-900">{{ $ulangan->judul }}</h1>
                        </div>
                        <p class="text-gray-600">Hasil Ulangan</p>
                    </div>
                </div>

                <!-- Date Info -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 px-4 py-3">
                    <div class="flex items-center space-x-2 text-gray-600">
                        <i data-feather="calendar" class="w-4 h-4"></i>
                        <span class="text-sm font-medium">{{ date('d M Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Overview for Students -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i data-feather="users" class="w-6 h-6 text-blue-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Peserta</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $nilaiList->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <i data-feather="trending-up" class="w-6 h-6 text-green-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Nilai Tertinggi</p>
                        <p class="text-2xl font-bold text-gray-900">
                            @if($nilaiList->isNotEmpty())
                                {{ number_format($nilaiList->max('nilai'), 0) }}
                            @else
                                -
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="bg-yellow-100 p-3 rounded-lg">
                        <i data-feather="bar-chart" class="w-6 h-6 text-yellow-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Rata-rata</p>
                        <p class="text-2xl font-bold text-gray-900">
                            @if($nilaiList->isNotEmpty())
                                {{ number_format($nilaiList->avg('nilai'), 1) }}
                            @else
                                -
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <i data-feather="check-circle" class="w-6 h-6 text-purple-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Status</p>
                        <p class="text-lg font-bold text-green-600">Selesai</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <i data-feather="list" class="w-6 h-6 text-white"></i>
                        <h3 class="text-white text-xl font-semibold">Daftar Nilai Siswa</h3>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Search -->
                        <div class="relative">
                            <input type="text" placeholder="Cari nama siswa..."
                                   class="bg-white/20 text-white placeholder-white/70 px-4 py-2 pl-10 rounded-lg border border-white/30 focus:outline-none focus:ring-2 focus:ring-white/50 text-sm">
                            <i data-feather="search" class="w-4 h-4 text-white/70 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                @if($nilaiList->isEmpty())
                    <!-- Empty State -->
                    <div class="text-center py-16">
                        <div class="bg-gray-100 rounded-full p-6 w-24 h-24 mx-auto mb-6 flex items-center justify-center">
                            <i data-feather="file-x" class="w-12 h-12 text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Nilai</h3>
                        <p class="text-gray-600 mb-8 max-w-md mx-auto">
                            Nilai untuk ulangan ini belum tersedia. Silakan hubungi guru Anda untuk informasi lebih lanjut.
                        </p>
                        <div class="flex justify-center space-x-4">
                            <button class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-medium transition duration-200 flex items-center space-x-2">
                                <i data-feather="refresh-cw" class="w-4 h-4"></i>
                                <span>Refresh</span>
                            </button>
                            <a href="{{ route('nilai.index') }}"
                               class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium transition duration-200 flex items-center space-x-2">
                                <i data-feather="arrow-left" class="w-4 h-4"></i>
                                <span>Kembali</span>
                            </a>
                        </div>
                    </div>
                @else
                    <!-- Modern Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center space-x-2">
                                            <i data-feather="hash" class="w-4 h-4"></i>
                                            <span>No</span>
                                        </div>
                                    </th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center space-x-2">
                                            <i data-feather="user" class="w-4 h-4"></i>
                                            <span>Nama Siswa</span>
                                        </div>
                                    </th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center space-x-2">
                                            <i data-feather="home" class="w-4 h-4"></i>
                                            <span>Kelas</span>
                                        </div>
                                    </th>
                                    <th class="text-center py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center justify-center space-x-2">
                                            <i data-feather="award" class="w-4 h-4"></i>
                                            <span>Nilai</span>
                                        </div>
                                    </th>
                                    <th class="text-center py-4 px-6 font-semibold text-gray-700">
                                        <div class="flex items-center justify-center space-x-2">
                                            <i data-feather="activity" class="w-4 h-4"></i>
                                            <span>Status</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($nilaiList as $index => $nilai)
                                <tr class="hover:bg-purple-25 hover:bg-purple-50/30 transition duration-200 group">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="bg-purple-100 group-hover:bg-purple-200 text-purple-700 rounded-full w-8 h-8 flex items-center justify-center text-sm font-semibold transition duration-200">
                                                {{ $nilai->user->siswaprofile->no_absen }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-gray-100 group-hover:bg-purple-100 rounded-full w-10 h-10 flex items-center justify-center transition duration-200">
                                                <i data-feather="user" class="w-5 h-5 text-gray-600 group-hover:text-purple-600"></i>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">{{ $nilai->user->name }}</p>
                                                <p class="text-sm text-gray-500">Siswa</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-2">
                                            <div class="bg-blue-100 p-1.5 rounded-lg">
                                                <i data-feather="home" class="w-3 h-3 text-blue-600"></i>
                                            </div>
                                            <span class="font-medium text-gray-700">
                                                {{ $nilai->user->kelas->nama ?? '-' }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        @php
                                            $score = $nilai->nilai;
                                            $scoreClass = '';
                                            $badgeClass = '';
                                            if($score >= 85) {
                                                $scoreClass = 'text-green-600';
                                                $badgeClass = 'bg-green-100 text-green-800';
                                            } elseif($score >= 75) {
                                                $scoreClass = 'text-blue-600';
                                                $badgeClass = 'bg-blue-100 text-blue-800';
                                            } elseif($score >= 65) {
                                                $scoreClass = 'text-yellow-600';
                                                $badgeClass = 'bg-yellow-100 text-yellow-800';
                                            } else {
                                                $scoreClass = 'text-red-600';
                                                $badgeClass = 'bg-red-100 text-red-800';
                                            }
                                        @endphp
                                        <div class="flex flex-col items-center space-y-2">
                                            <span class="text-2xl font-bold {{ $scoreClass }}">
                                                {{ number_format($nilai->nilai, 0) }}
                                            </span>
                                            <div class="w-full bg-gray-200 rounded-full h-1.5 max-w-[60px]">
                                                <div class="h-1.5 rounded-full transition-all duration-500 {{ $score >= 85 ? 'bg-green-500' : ($score >= 75 ? 'bg-blue-500' : ($score >= 65 ? 'bg-yellow-500' : 'bg-red-500')) }}"
                                                     style="width: {{ min($score, 100) }}%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        @if($score >= 75)
                                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold flex items-center justify-center space-x-1 w-fit mx-auto">
                                                <i data-feather="check-circle" class="w-3 h-3"></i>
                                                <span>Lulus</span>
                                            </span>
                                        @else
                                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-semibold flex items-center justify-center space-x-1 w-fit mx-auto">
                                                <i data-feather="x-circle" class="w-3 h-3"></i>
                                                <span>Perlu Perbaikan</span>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Footer Stats -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="text-center">
                                <div class="bg-green-100 p-3 rounded-lg w-fit mx-auto mb-2">
                                    <i data-feather="users" class="w-6 h-6 text-green-600"></i>
                                </div>
                                <p class="text-lg font-bold text-gray-900">
                                    {{ $nilaiList->where('nilai', '>=', 75)->count() }}
                                </p>
                                <p class="text-sm text-gray-600">Siswa Lulus</p>
                            </div>
                            <div class="text-center">
                                <div class="bg-red-100 p-3 rounded-lg w-fit mx-auto mb-2">
                                    <i data-feather="user" class="w-6 h-6 text-red-600"></i>
                                </div>
                                <p class="text-lg font-bold text-gray-900">
                                    {{ $nilaiList->where('nilai', '<', 75)->count() }}
                                </p>
                                <p class="text-sm text-gray-600">Perlu Perbaikan</p>
                            </div>
                            <div class="text-center">
                                <div class="bg-purple-100 p-3 rounded-lg w-fit mx-auto mb-2">
                                    <i data-feather="percent" class="w-6 h-6 text-purple-600"></i>
                                </div>
                                <p class="text-lg font-bold text-gray-900">
                                    {{ $nilaiList->isNotEmpty() ? number_format(($nilaiList->where('nilai', '>=', 75)->count() / $nilaiList->count()) * 100, 1) : 0 }}%
                                </p>
                                <p class="text-sm text-gray-600">Tingkat Kelulusan</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Initialize Feather Icons -->
<script>
    feather.replace();

    // Simple search functionality
    document.querySelector('input[placeholder="Cari nama siswa..."]')?.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            if (name.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

@endsection
