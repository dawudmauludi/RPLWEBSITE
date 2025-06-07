@extends('layouts.masterDashboard')

@section('title', 'Dashboard Admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 to-indigo-100 p-6">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Dashboard Admin</h1>
        <p class="text-gray-600">Selamat datang di panel administrasi sistem</p>
    </div>

    <!-- Summary Cards -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
            <i data-feather="bar-chart" class="w-6 h-6 mr-2 text-purple-600"></i>
            Ringkasan Data
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $icons = [
                    'users' => 'users',
                    'siswa' => 'user',
                    'guru' => 'user-check',
                    'admin' => 'shield',
                    'berita' => 'file-text',
                    'pending' => 'clock',
                    'disetujui' => 'check-circle',
                    'ditolak' => 'x-circle'
                ];
                $colors = [
                    'users' => 'from-purple-500 to-purple-600',
                    'siswa' => 'from-indigo-500 to-indigo-600',
                    'guru' => 'from-violet-500 to-violet-600',
                    'admin' => 'from-purple-600 to-purple-700',
                    'berita' => 'from-blue-500 to-blue-600',
                    'pending' => 'from-yellow-500 to-yellow-600',
                    'disetujui' => 'from-green-500 to-green-600',
                    'ditolak' => 'from-red-500 to-red-600'
                ];
            @endphp

            @foreach ($summary as $label => $value)
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="bg-gradient-to-r {{ $colors[$label] ?? 'from-purple-500 to-purple-600' }} p-4">
                    <div class="flex items-center justify-between">
                        <div class="text-white">
                            <p class="text-sm opacity-90 capitalize">{{ str_replace('_', ' ', $label) }}</p>
                            <p class="text-2xl font-bold">{{ number_format($value) }}</p>
                        </div>
                        <div class="bg-white bg-opacity-20 p-3 rounded-full">
                            <i data-feather="{{ $icons[$label] ?? 'bar-chart' }}" class="w-6 h-6 text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex items-center text-sm text-gray-600">
                        <i data-feather="trending-up" class="w-4 h-4 mr-1 text-green-500"></i>
                        <span>Data terbaru</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Charts Section -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
            <i data-feather="activity" class="w-6 h-6 mr-2 text-purple-600"></i>
            Analisis Data
        </h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Pendaftaran Chart -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i data-feather="user-plus" class="w-5 h-5 mr-2 text-purple-600"></i>
                        Pendaftaran per Bulan
                    </h3>
                    <div class="bg-purple-100 p-2 rounded-lg">
                        <i data-feather="calendar" class="w-4 h-4 text-purple-600"></i>
                    </div>
                </div>
                <div class="relative h-64">
                    <canvas id="pendaftaranChart" class="w-full h-full"></canvas>
                </div>
            </div>

            <!-- Distribusi User Chart -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i data-feather="pie-chart" class="w-5 h-5 mr-2 text-purple-600"></i>
                        Distribusi Pengguna
                    </h3>
                    <div class="bg-indigo-100 p-2 rounded-lg">
                        <i data-feather="users" class="w-4 h-4 text-indigo-600"></i>
                    </div>
                </div>
                <div class="relative h-64">
                    <canvas id="distribusiUserChart" class="w-full h-full"></canvas>
                </div>
            </div>

            <!-- Status Approve Chart -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i data-feather="check-square" class="w-5 h-5 mr-2 text-purple-600"></i>
                        Status Persetujuan
                    </h3>
                    <div class="bg-violet-100 p-2 rounded-lg">
                        <i data-feather="clipboard" class="w-4 h-4 text-violet-600"></i>
                    </div>
                </div>
                <div class="relative h-64">
                    <canvas id="statusApproveChart" class="w-full h-full"></canvas>
                </div>
            </div>

            <!-- Aktivitas Berita Chart -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <i data-feather="trending-up" class="w-5 h-5 mr-2 text-purple-600"></i>
                        Aktivitas Berita
                    </h3>
                    <div class="bg-blue-100 p-2 rounded-lg">
                        <i data-feather="file-text" class="w-4 h-4 text-blue-600"></i>
                    </div>
                </div>
                <div class="relative h-64">
                    <canvas id="aktivitasBeritaChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
            <i data-feather="zap" class="w-6 h-6 mr-2 text-purple-600"></i>
            Aksi Cepat
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <button class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 flex items-center">
                <i data-feather="plus" class="w-5 h-5 mr-3"></i>
                <span class="font-medium">Tambah Pengguna</span>
            </button>
            <a href="{{ route('admin.berita.index') }}" class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white p-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 flex items-center">
                <i data-feather="edit-3" class="w-5 h-5 mr-3"></i>
                <span class="font-medium">Kelola Berita</span>
            </a>
            <button class="bg-gradient-to-r from-violet-500 to-violet-600 text-white p-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 flex items-center">
                <i data-feather="settings" class="w-5 h-5 mr-3"></i>
                <span class="font-medium">Pengaturan</span>
            </button>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
<script>
    // Initialize Feather Icons
    feather.replace();

    // Chart Data
    const pendaftaranData = @json($pendaftaranPerBulan);
    const distribusiData = @json(array_values($distribusiUser));
    const statusData = @json(array_values($statusApprove));
    const beritaData = @json($aktivitasBerita);

    // Purple Theme Colors
    const purpleColors = {
        primary: '#8b5cf6',
        secondary: '#a78bfa',
        accent: '#c4b5fd',
        success: '#10b981',
        warning: '#f59e0b',
        danger: '#ef4444',
        info: '#3b82f6'
    };

    // Pendaftaran Chart
    const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    new Chart(document.getElementById('pendaftaranChart'), {
        type: 'bar',
        data: {
            labels: pendaftaranData.map(d => monthNames[(d.bulan - 1) % 12]),
            datasets: [
                {
                    label: 'Siswa',
                    data: pendaftaranData.map(d => d.siswa),
                    backgroundColor: purpleColors.primary,
                    borderColor: purpleColors.primary,
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false,
                },
                {
                    label: 'Guru',
                    data: pendaftaranData.map(d => d.guru),
                    backgroundColor: purpleColors.secondary,
                    borderColor: purpleColors.secondary,
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 20
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f3f4f6'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Distribusi User Chart
    new Chart(document.getElementById('distribusiUserChart'), {
        type: 'doughnut',
        data: {
            labels: ['Admin', 'Guru', 'Siswa'],
            datasets: [{
                data: distribusiData,
                backgroundColor: [purpleColors.primary, purpleColors.secondary, purpleColors.accent],
                borderWidth: 3,
                borderColor: '#ffffff',
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 20
                    }
                }
            }
        }
    });

    // Status Approve Chart
    new Chart(document.getElementById('statusApproveChart'), {
        type: 'bar',
        data: {
            labels: ['Pending', 'Disetujui', 'Ditolak'],
            datasets: [{
                data: statusData,
                backgroundColor: [purpleColors.warning, purpleColors.success, purpleColors.danger],
                borderColor: [purpleColors.warning, purpleColors.success, purpleColors.danger],
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
                        color: '#f3f4f6'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Aktivitas Berita Chart
    new Chart(document.getElementById('aktivitasBeritaChart'), {
        type: 'line',
        data: {
            labels: beritaData.map(d => `${d.minggu}`),
            datasets: [{
                label: 'Jumlah Berita',
                data: beritaData.map(d => d.jumlah),
                borderColor: purpleColors.primary,
                backgroundColor: purpleColors.accent + '20',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: purpleColors.primary,
                pointBorderColor: '#ffffff',
                pointBorderWidth: 3,
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
                        color: '#f3f4f6'
                    }
                },
                x: {
                    grid: {
                        color: '#f3f4f6'
                    }
                }
            }
        }
    });
</script>
@endsection
