@extends('layouts.masterDashboard')
@section('title', 'Detail Pekerjaan')
@section('content')

<div class="min-h-screen bg-white">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-50 to-blue-100 border-b border-blue-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.jobs.index') }}"
                       class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                        <i data-feather="arrow-left" class="w-5 h-5 mr-2"></i>
                        Kembali ke Daftar Pekerjaan
                    </a>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="bg-{{ $job->status == 'aktif' ? 'green' : ($job->status == 'expired' ? 'red' : 'gray') }}-100
                               text-{{ $job->status == 'aktif' ? 'green' : ($job->status == 'expired' ? 'red' : 'gray') }}-800
                               px-3 py-1 rounded-full text-sm font-medium">
                        <i data-feather="circle" class="w-4 h-4 inline mr-1"></i>
                        {{ ucfirst($job->status) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Main Content Column -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Job Title & Company -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-start justify-between mb-4">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $job->nama_pekerjaan }}</h1>
                        <div class="flex items-center space-x-2">
                            <i data-feather="calendar" class="w-5 h-5 text-blue-500"></i>
                            <span class="text-sm text-gray-600">{{ $job->created_at->format('d M Y') }}</span>
                        </div>
                    </div>

                    <div class="flex items-center space-x-6 mb-6">
                        <div class="flex items-center">
                            <i data-feather="building" class="w-5 h-5 text-blue-500 mr-2"></i>
                            <span class="font-medium text-gray-900">{{ $job->nama_perusahaan }}</span>
                        </div>
                        <div class="flex items-center">
                            <i data-feather="map-pin" class="w-5 h-5 text-blue-500 mr-2"></i>
                            <span class="text-gray-700">{{ $job->lokasi }}</span>
                        </div>
                    </div>

                    @if($job->image)
                    <div class="mb-6">
                        <img src="{{ asset('storage/' . $job->image) }}"
                             alt="{{ $job->nama_perusahaan }}"
                             class="w-full max-w-md h-48 object-cover rounded-lg shadow-md">
                    </div>
                    @endif
                </div>

                <!-- Job Details Grid -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center mb-6">
                        <i data-feather="info" class="w-6 h-6 text-blue-500 mr-3"></i>
                        <h2 class="text-xl font-semibold text-gray-900">Detail Pekerjaan</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-start space-x-3 p-4 bg-blue-50 rounded-lg border border-blue-100">
                            <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <i data-feather="dollar-sign" class="w-4 h-4 text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900">Gaji</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $job->gaji }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3 p-4 bg-blue-50 rounded-lg border border-blue-100">
                            <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <i data-feather="briefcase" class="w-4 h-4 text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900">Tipe Pekerjaan</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $job->tipe_pekerjaan }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3 p-4 bg-blue-50 rounded-lg border border-blue-100">
                            <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <i data-feather="home" class="w-4 h-4 text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900">Tempat Kerja</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $job->tempat_kerja }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3 p-4 bg-blue-50 rounded-lg border border-blue-100">
                            <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <i data-feather="clock" class="w-4 h-4 text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900">Waktu Kerja</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $job->waktu_pekerjaan }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Description -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center mb-6">
                        <i data-feather="file-text" class="w-6 h-6 text-blue-500 mr-3"></i>
                        <h2 class="text-xl font-semibold text-gray-900">Deskripsi Pekerjaan</h2>
                    </div>

                    <div class="prose max-w-none">
                        <p class="text-gray-700 leading-relaxed whitespace-pre-line">{!! $job->deskripsi_pekerjaan !!}</p>
                    </div>
                </div>

                <!-- Skills Section -->
                @if($job->skill && $job->skill->count() > 0)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center mb-6">
                        <i data-feather="award" class="w-6 h-6 text-blue-500 mr-3"></i>
                        <h2 class="text-xl font-semibold text-gray-900">Skill yang Dibutuhkan</h2>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        @foreach($job->skill as $skill)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800">
                            <i data-feather="check" class="w-3 h-3 mr-1"></i>
                            {{ $skill->name }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">

                <!-- Company Info Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center mb-4">
                        <i data-feather="building" class="w-6 h-6 text-blue-500 mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Informasi Perusahaan</h3>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                <i data-feather="building" class="w-6 h-6 text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">{{ $job->nama_perusahaan }}</p>
                                <p class="text-sm text-gray-600">{{ $job->lokasi }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Application Link -->
                @if($job->link_pendaftaran)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center mb-4">
                        <i data-feather="external-link" class="w-6 h-6 text-blue-500 mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Link Pendaftaran</h3>
                    </div>

                    <a href="{{ $job->link_pendaftaran }}"
                       target="_blank"
                       class="w-full inline-flex items-center justify-center px-4 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        <i data-feather="external-link" class="w-4 h-4 mr-2"></i>
                        Daftar Sekarang
                    </a>
                </div>
                @endif

                <!-- Deadline Info -->
                @if($job->tanggal_berakhir)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center mb-4">
                        <i data-feather="calendar" class="w-6 h-6 text-blue-500 mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Batas Waktu</h3>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Berakhir pada:</span>
                            <span class="font-medium text-gray-900">{{ \Carbon\Carbon::parse($job->tanggal_berakhir)->format('d M Y') }}</span>
                        </div>

                        @php
                            $daysLeft = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($job->tanggal_berakhir), false);
                        @endphp

                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Sisa waktu:</span>
                            <span class="font-medium {{ $daysLeft <= 3 ? 'text-red-600' : 'text-green-600' }}">
                                @if($daysLeft > 0)
                                    {{ $daysLeft }} hari
                                @elseif($daysLeft == 0)
                                    Hari ini
                                @else
                                    Sudah berakhir
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Stats Card -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-sm text-white p-6">
                    <div class="flex items-center mb-4">
                        <i data-feather="bar-chart" class="w-6 h-6 mr-3"></i>
                        <h3 class="text-lg font-semibold">Statistik Pekerjaan</h3>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <i data-feather="calendar" class="w-4 h-4 mr-2"></i>
                                <span class="text-sm">Dibuat</span>
                            </div>
                            <span class="font-semibold">{{ $job->created_at->format('d M Y') }}</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <i data-feather="award" class="w-4 h-4 mr-2"></i>
                                <span class="text-sm">Skills</span>
                            </div>
                            <span class="font-semibold">{{ $job->skill ? $job->skill->count() : 0 }}</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <i data-feather="eye" class="w-4 h-4 mr-2"></i>
                                <span class="text-sm">Status</span>
                            </div>
                            <span class="font-semibold">{{ ucfirst($job->status) }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Initialize Feather Icons -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>

@endsection
