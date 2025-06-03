@extends('layouts.masterDashboard')
@section('title', 'Detail Karya Siswa')
@section('content')

<div class="min-h-screen bg-white">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-purple-50 to-purple-100 border-b border-purple-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('guru.karya.siswa.index') }}" 
                       class="inline-flex items-center text-purple-600 hover:text-purple-800 transition-colors">
                        <i data-feather="arrow-left" class="w-5 h-5 mr-2"></i>
                        Kembali ke Daftar Karya
                    </a>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">
                        <i data-feather="bookmark" class="w-4 h-4 inline mr-1"></i>
                        {{ $karya->category->name ?? 'Kategori' }}
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
                
                <!-- Karya Title & Description -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-start justify-between mb-4">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $karya->judul }}</h1>
                        <div class="flex items-center space-x-2">
                            <i data-feather="calendar" class="w-5 h-5 text-purple-500"></i>
                            <span class="text-sm text-gray-600">{{ $karya->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                    
                    <div class="prose max-w-none">
                        <p class="text-gray-700 leading-relaxed">{{ $karya->deskripsi }}</p>
                    </div>
                </div>

                <!-- Documentation Section -->
                @if($karya->dokumentasi && $karya->dokumentasi->count() > 0)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center mb-6">
                        <i data-feather="image" class="w-6 h-6 text-purple-500 mr-3"></i>
                        <h2 class="text-xl font-semibold text-gray-900">Dokumentasi</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($karya->dokumentasi as $index => $dok)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $dok->gambar) }}" 
                                 alt="Dokumentasi {{ $karya->judul }}"
                                 class="w-full h-48 object-cover rounded-lg shadow-md group-hover:shadow-lg transition-shadow">
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-lg transition-all flex items-center justify-center">
                                <i data-feather="zoom-in" class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity"></i>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Features Section -->
                @if($karya->fiturKarya && $karya->fiturKarya->count() > 0)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center mb-6">
                        <i data-feather="star" class="w-6 h-6 text-purple-500 mr-3"></i>
                        <h2 class="text-xl font-semibold text-gray-900">Fitur Karya</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($karya->fiturKarya as $fitur)
                        <div class="flex items-start space-x-3 p-4 bg-purple-50 rounded-lg border border-purple-100">
                            <div class="flex-shrink-0 w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                <i data-feather="check" class="w-4 h-4 text-purple-600"></i>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900">{{ $fitur->penjelasan }}</h3>
                                @if($fitur->penjelasan)
                                <p class="text-sm text-gray-600 mt-1">{{ $fitur->penjelasan }}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                
                <!-- Student Info Card -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center mb-4">
                        <i data-feather="user" class="w-6 h-6 text-purple-500 mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Informasi Siswa</h3>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                                <i data-feather="user" class="w-6 h-6 text-purple-600"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">{{ $karya->user->nama ?? 'Nama Siswa' }}</p>
                                <p class="text-sm text-gray-600">{{ $karya->user->kelas->nama ?? 'Kelas' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tools Used -->
                @if($karya->tools && $karya->tools->count() > 0)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center mb-4">
                        <i data-feather="tool" class="w-6 h-6 text-purple-500 mr-3"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Tools yang Digunakan</h3>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        @foreach($karya->tools as $tool)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-purple-100 text-purple-800">
                            <i data-feather="cpu" class="w-3 h-3 mr-1"></i>
                            {{ $tool->nama }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Stats Card -->
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-sm text-white p-6">
                    <div class="flex items-center mb-4">
                        <i data-feather="bar-chart" class="w-6 h-6 mr-3"></i>
                        <h3 class="text-lg font-semibold">Statistik Karya</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <i data-feather="image" class="w-4 h-4 mr-2"></i>
                                <span class="text-sm">Dokumentasi</span>
                            </div>
                            <span class="font-semibold">{{ $karya->dokumentasi ? $karya->dokumentasi->count() : 0 }}</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <i data-feather="star" class="w-4 h-4 mr-2"></i>
                                <span class="text-sm">Fitur</span>
                            </div>
                            <span class="font-semibold">{{ $karya->fiturKarya ? $karya->fiturKarya->count() : 0 }}</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <i data-feather="tool" class="w-4 h-4 mr-2"></i>
                                <span class="text-sm">Tools</span>
                            </div>
                            <span class="font-semibold">{{ $karya->tools ? $karya->tools->count() : 0 }}</span>
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