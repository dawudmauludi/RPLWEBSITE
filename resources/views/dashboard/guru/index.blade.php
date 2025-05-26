@extends('layouts.masterDashboard')

@section('title', 'Dashboard Guru')

@section('content')
    <!-- Header Section -->
    <div class="bg-primary rounded-2xl p-6 mb-8 shadow-xl">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">
                    <i data-feather="smile" class="inline-block w-8 h-8 mr-3"></i>
                    Selamat Datang, {{ Auth::user()->nama }}
                </h1>
                <p class="text-purple-100 text-lg">Dashboard Management untuk Guru</p>
            </div>
            <div class="hidden md:block">
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                    <i data-feather="calendar" class="w-8 h-8 text-white"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Karya Terbaik Card -->
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-3 group-hover:scale-110 transition-transform duration-300">
                        <i data-feather="award" class="w-6 h-6 text-white"></i>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 font-medium">Karya Terbaik</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $jumlahKaryaTerbaik }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Siswa Card -->
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl p-3 group-hover:scale-110 transition-transform duration-300">
                        <i data-feather="users" class="w-6 h-6 text-white"></i>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 font-medium">Jumlah Siswa</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $jumlahSiswa }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-gradient-to-br from-violet-500 to-violet-600 rounded-xl p-3 group-hover:scale-110 transition-transform duration-300">
                        <i data-feather="file-text" class="w-6 h-6 text-white"></i>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 font-medium">Ujian Aktif</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $ujianAktif->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Students Section -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
        <div class="flex items-center mb-6">
            <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl p-3 mr-4">
                <i data-feather="star" class="w-6 h-6 text-white"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Top 3 Siswa Berdasarkan Karya</h2>
        </div>

        <div class="space-y-4">
            @foreach($topSiswa as $index => $siswa)
                <div class="flex items-center p-4 bg-gradient-to-r from-purple-50 to-indigo-50 rounded-xl hover:from-purple-100 hover:to-indigo-100 transition-all duration-300">
                    <div class="flex-shrink-0 mr-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden">
                           @php
                            $foto = optional($siswa->siswaProfile)->foto;
                            $nama = optional($siswa->siswaProfile)->nama ?? $siswa->nama;
                            $fotoUrl = $foto && Storage::disk('public')->exists($foto)
                                ? asset('storage/' . $foto)
                                : 'https://ui-avatars.com/api/?name=' . urlencode($nama) . '&background=ffffff&color=0d6efd&size=128&bold=true';
                        @endphp

                        <img src="{{ $fotoUrl }}" alt="Foto {{ $siswa->nama }}" class="w-full h-full object-cover">

                        </div>
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-lg text-gray-800">{{ $siswa->nama }}</h3>
                        <p class="text-purple-600 font-medium">
                            <i data-feather="edit-3" class="inline w-4 h-4 mr-1"></i>
                            {{ $siswa->karya_siswa_count }} karya
                        </p>
                    </div>
                    <div class="text-right">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                            #{{ $index + 1 }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Upcoming Exams Section -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
        <div class="flex items-center mb-6">
            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl p-3 mr-4">
                <i data-feather="calendar" class="w-6 h-6 text-white"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Jadwal Ulangan/Ujian Mendatang</h2>
        </div>

        @if($ujianAktif->isEmpty())
            <div class="text-center py-12">
                <div class="bg-gray-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                    <i data-feather="calendar-x" class="w-10 h-10 text-gray-400"></i>
                </div>
                <p class="text-gray-500 text-lg">Tidak ada ujian mendatang</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach($ujianAktif as $ujian)
                    <div class="flex items-center p-4 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl hover:from-indigo-100 hover:to-purple-100 transition-all duration-300 border-l-4 border-purple-500">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center">
                                <i data-feather="book-open" class="w-6 h-6 text-white"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-bold text-lg text-gray-800 mb-1">{{ $ujian->judul }}</h3>
                            <p class="text-purple-600 flex items-center">
                                <i data-feather="clock" class="w-4 h-4 mr-2"></i>
                                {{ \Carbon\Carbon::parse($ujian->mulai)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i') }}
                            </p>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                <i data-feather="bell" class="w-4 h-4 mr-1"></i>
                                Aktif
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Karya per Bulan Chart -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center mb-6">
                <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl p-3 mr-4">
                    <i data-feather="bar-chart-2" class="w-6 h-6 text-white"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-800">Karya per Bulan</h2>
            </div>
            <div class="relative h-64">
                <canvas id="chartKaryaPerBulan"></canvas>
            </div>
        </div>

        <!-- Aktivitas Karya Chart -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center mb-6">
                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl p-3 mr-4">
                    <i data-feather="activity" class="w-6 h-6 text-white"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-800">Aktivitas Karya</h2>
            </div>
            <div class="relative h-64">
                <canvas id="chartAktivitasKarya"></canvas>
            </div>
        </div>
    </div>



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Initialize Feather Icons
        feather.replace();

        const purpleGradient = [
            'rgba(147, 51, 234, 0.8)',  // Purple
            'rgba(99, 102, 241, 0.8)',  // Indigo
            'rgba(168, 85, 247, 0.8)',  // Violet
            'rgba(124, 58, 237, 0.8)',  // Violet-600
            'rgba(79, 70, 229, 0.8)',   // Indigo-600
            'rgba(139, 92, 246, 0.8)'   // Violet-400
        ];

        const purpleBorders = [
            'rgba(147, 51, 234, 1)',
            'rgba(99, 102, 241, 1)',
            'rgba(168, 85, 247, 1)',
            'rgba(124, 58, 237, 1)',
            'rgba(79, 70, 229, 1)',
            'rgba(139, 92, 246, 1)'
        ];

        Chart.defaults.font.family = 'Inter, system-ui, sans-serif';
        Chart.defaults.font.size = 12;
        Chart.defaults.color = '#6B7280';

        const ctxKaryaPerBulan = document.getElementById('chartKaryaPerBulan').getContext('2d');
        new Chart(ctxKaryaPerBulan, {
            type: 'bar',
            data: {
                labels: @json(collect($karyaPerBulan)->pluck('bulan')), // nama bulan
                datasets: [{
                    label: 'Jumlah Karya',
                    data: @json(collect($karyaPerBulan)->pluck('jumlah')),
                    backgroundColor: 'rgba(147, 51, 234, 0.8)',
                    borderColor: 'rgba(147, 51, 234, 1)',
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(243, 244, 246, 1)'
                        },
                        ticks: {
                            color: '#6B7280'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#6B7280'
                        }
                    }
                }
            }
        });


        const ctxAktivitasKarya = document.getElementById('chartAktivitasKarya').getContext('2d');
        new Chart(ctxAktivitasKarya, {
            type: 'line',
            data: {
                labels: @json($aktivitasKarya->pluck('minggu')->toArray()),
                datasets: [{
                    label: 'Aktivitas Karya',
                    data: @json($aktivitasKarya->pluck('jumlah')->toArray()),
                    borderColor: 'rgba(99, 102, 241, 1)',
                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: 'rgba(99, 102, 241, 1)',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 6,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(243, 244, 246, 1)'
                        },
                        ticks: {
                            color: '#6B7280'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#6B7280'
                        }
                    }
                }
            }
        });

    </script>
@endsection
