@extends('layouts.masterDashboard')
@section('title', 'Nilai Ulangan')

@section('content')
    <!-- Include Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <div class="min-h-screen bg-gradient-to-br from-purple-50 via-white to-purple-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-purple-100 p-8 mb-8">
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                    <div class="flex items-center">
                        <div class="bg-purple-100 p-4 rounded-xl mr-6">
                            <i data-feather="award" class="w-8 h-8 text-purple-600"></i>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 mb-2">Nilai Ulangan</h1>
                            <p class="text-gray-600">Hasil ulangan siswa untuk evaluasi pembelajaran</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Total Peserta</p>
                            <p class="text-2xl font-bold text-purple-600">{{ $nilaiList->count() }}</p>
                        </div>
                        <a href="{{ route('ulangans.show', $ulangan->id ?? '') }}"
                           class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700
                                  rounded-xl font-medium transition-all duration-200 shadow-md hover:shadow-lg">
                            <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
                            Kembali
                        </a>
                    </div>
                </div>

                <!-- Exam Info Card -->
                <div class="mt-8 bg-gradient-to-r from-purple-600 to-purple-700 rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="bg-white/20 p-3 rounded-lg mr-4">
                                <i data-feather="file-text" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold">{{ $ulangan->judul }}</h3>
                                <p class="text-purple-100 mt-1">Ulangan yang sedang ditampilkan</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="flex items-center space-x-2 text-purple-100 text-sm mb-2">
                                <i data-feather="calendar" class="w-4 h-4"></i>
                                <span>{{ date('d M Y') }}</span>
                            </div>
                            <div class="bg-white/20 rounded-lg px-3 py-1">
                                <span class="text-sm font-medium">{{ $nilaiList->count() }} Nilai</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($nilaiList->isEmpty())
                <!-- Empty State -->
                <div class="bg-white rounded-2xl shadow-lg border border-purple-100 p-12 text-center">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-yellow-100 rounded-full mb-6">
                        <i data-feather="inbox" class="w-12 h-12 text-yellow-500"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-3">Belum Ada Nilai</h3>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">
                        Belum ada nilai yang tersedia untuk ulangan ini. Pastikan siswa sudah mengerjakan ulangan atau nilai sudah diinput.
                    </p>
                    <div class="flex justify-center space-x-4">
                        <a href="{{ route('ulangans.show', $ulangan->id ?? '') }}"
                           class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white
                                  rounded-xl font-medium transition-all duration-200 shadow-lg hover:shadow-xl">
                            <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
                            Kembali ke Ulangan
                        </a>
                    </div>
                </div>
            @else
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-md border border-purple-100 p-6">
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-3 rounded-xl mr-4">
                                <i data-feather="users" class="w-6 h-6 text-blue-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Total Siswa</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $nilaiList->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-md border border-purple-100 p-6">
                        <div class="flex items-center">
                            <div class="bg-green-100 p-3 rounded-xl mr-4">
                                <i data-feather="trending-up" class="w-6 h-6 text-green-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Nilai Tertinggi</p>
                                <p class="text-2xl font-bold text-gray-800">{{ number_format($nilaiList->max('nilai'), 0) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-md border border-purple-100 p-6">
                        <div class="flex items-center">
                            <div class="bg-red-100 p-3 rounded-xl mr-4">
                                <i data-feather="trending-down" class="w-6 h-6 text-red-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Nilai Terendah</p>
                                <p class="text-2xl font-bold text-gray-800">{{ number_format($nilaiList->min('nilai'), 0) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-md border border-purple-100 p-6">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-3 rounded-xl mr-4">
                                <i data-feather="bar-chart-2" class="w-6 h-6 text-purple-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Rata-rata</p>
                                <p class="text-2xl font-bold text-gray-800">{{ number_format($nilaiList->avg('nilai'), 1) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Table -->
                <div class="bg-white rounded-2xl shadow-lg border border-purple-100 overflow-hidden">
                    <!-- Table Header -->
                    <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-8 py-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-white">
                                <i data-feather="list" class="w-5 h-5 mr-3"></i>
                                <h2 class="text-lg font-semibold">Daftar Nilai Siswa</h2>
                            </div>
                            <div class="flex items-center space-x-4 text-purple-100 text-sm">
                                <div class="flex items-center">
                                    <i data-feather="user-check" class="w-4 h-4 mr-1"></i>
                                    <span>{{ $nilaiList->count() }} siswa</span>
                                </div>
                                <div class="flex items-center">
                                    <i data-feather="clock" class="w-4 h-4 mr-1"></i>
                                    <span>{{ date('H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table Content -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-purple-50 border-b border-purple-100">
                                <tr>
                                    <th class="px-8 py-4 text-left text-xs font-semibold text-purple-700 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i data-feather="hash" class="w-4 h-4 mr-2"></i>
                                            No
                                        </div>
                                    </th>
                                    <th class="px-8 py-4 text-left text-xs font-semibold text-purple-700 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i data-feather="user" class="w-4 h-4 mr-2"></i>
                                            Nama Siswa
                                        </div>
                                    </th>
                                    <th class="px-8 py-4 text-left text-xs font-semibold text-purple-700 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <i data-feather="book-open" class="w-4 h-4 mr-2"></i>
                                            Kelas
                                        </div>
                                    </th>
                                    <th class="px-8 py-4 text-center text-xs font-semibold text-purple-700 uppercase tracking-wider">
                                        <div class="flex items-center justify-center">
                                            <i data-feather="star" class="w-4 h-4 mr-2"></i>
                                            Nilai
                                        </div>
                                    </th>
                                    <th class="px-8 py-4 text-center text-xs font-semibold text-purple-700 uppercase tracking-wider">
                                        <div class="flex items-center justify-center">
                                            <i data-feather="trending-up" class="w-4 h-4 mr-2"></i>
                                            Status
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($nilaiList as $index => $nilai)
                                    <tr class="hover:bg-purple-25 transition-colors duration-150 group">
                                        <td class="px-8 py-6">
                                            <div class="flex items-center justify-center w-10 h-10 bg-purple-100 rounded-full text-purple-700 font-semibold group-hover:bg-purple-200 transition-colors">
                                                 {{ $nilai->user->siswaprofile->no_absen }}
                                            </div>
                                        </td>
                                        <td class="px-8 py-6">
                                            <div class="flex items-center">
                                                <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                                    {{ substr($nilai->user->name, 0, 1) }}
                                                </div>
                                                <div>
                                                    <div class="text-lg font-semibold text-gray-900">{{ $nilai->user->name }}</div>
                                                    <div class="text-sm text-gray-500 flex items-center mt-1">
                                                        <i data-feather="user" class="w-3 h-3 mr-1"></i>
                                                        Siswa
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6">
                                            <div class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-purple-100 text-purple-700">
                                                <i data-feather="bookmark" class="w-4 h-4 mr-2"></i>
                                                {{ $nilai->user->kelas->nama ?? '-' }}
                                            </div>
                                        </td>
                                        <td class="px-8 py-6 text-center">
                                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full font-bold text-xl
                                                        @if($nilai->nilai >= 80) bg-green-100 text-green-700
                                                        @elseif($nilai->nilai >= 70) bg-yellow-100 text-yellow-700
                                                        @elseif($nilai->nilai >= 60) bg-orange-100 text-orange-700
                                                        @else bg-red-100 text-red-700 @endif">
                                                {{ number_format($nilai->nilai, 2, ',', '.') }}
                                            </div>
                                        </td>
                                        <td class="px-8 py-6 text-center">
                                            @if($nilai->nilai >= 75)
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <i data-feather="check-circle" class="w-3 h-3 mr-1"></i>
                                                    Lulus
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    <i data-feather="x-circle" class="w-3 h-3 mr-1"></i>
                                                    Tidak Lulus
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Table Footer -->
                    <div class="bg-gray-50 px-8 py-4 border-t border-gray-200">
                        <div class="flex items-center justify-between text-sm text-gray-600">
                            <div class="flex items-center">
                                <i data-feather="info" class="w-4 h-4 mr-2"></i>
                                <span>Menampilkan {{ $nilaiList->count() }} dari {{ $nilaiList->count() }} data</span>
                            </div>
                            <div class="flex items-center space-x-6">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                    <span>Lulus (≥75): {{ $nilaiList->where('nilai', '>=', 75)->count() }}</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                                    <span>Tidak Lulus (<75): {{ $nilaiList->where('nilai', '<', 75)->count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex justify-center space-x-4">
                    <button onclick="window.print()"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white
                                   rounded-xl font-medium transition-all duration-200 shadow-lg hover:shadow-xl">
                        <i data-feather="printer" class="w-4 h-4 mr-2"></i>
                        Cetak Nilai
                    </button>
                    <button onclick="window.location='{{ route('nilai.export', $ulangan->id) }}'"
                            class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white
                                rounded-xl font-medium transition-all duration-200 shadow-lg hover:shadow-xl">
                        <i data-feather="download" class="w-4 h-4 mr-2"></i>
                        Export Excel
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- Initialize Feather Icons -->
    <script>
        feather.replace();

        // Export to Excel function (placeholder)
        function exportToExcel() {
            alert('Fitur export Excel akan segera hadir!');
        }
    </script>
@endsection
