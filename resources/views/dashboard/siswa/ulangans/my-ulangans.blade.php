@extends('layouts.masterDashboard')

@section('title', 'Ulangan Saya')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                <i data-feather="book-open" class="mr-2"></i>
                Ulangan untuk Kelas {{ auth()->user()->kelas->nama ?? '' }}
            </h1>
            <p class="text-gray-600 mt-1">Daftar Ulangan yang tersedia</p>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 rounded-md p-3 mb-4 flex items-center justify-between">
            <div class="flex items-center">
                <i data-feather="check-circle" class="text-green-500 mr-2"></i>
                <span class="text-green-700">{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700">
                <i data-feather="x"></i>
            </button>
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-50 border border-red-200 rounded-md p-3 mb-4 flex items-center justify-between">
            <div class="flex items-center">
                <i data-feather="alert-circle" class="text-red-500 mr-2"></i>
                <span class="text-red-700">{{ session('error') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700">
                <i data-feather="x"></i>
            </button>
        </div>
        @endif

        <!-- Ulangan Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($ulangans as $ulangan)
            <div class="bg-white rounded-lg border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <!-- Card Header -->
                <div class="bg-primary text-white p-4">
                    <div class="flex justify-between items-start">
                        <span class="text-xs font-medium">
                            {{ $ulangan->mulai->timezone('Asia/Jakarta')->format('d M Y') }}
                        </span>
                        <span class="text-xs bg-white bg-opacity-20 px-2 py-1 rounded-full">
                            {{-- {{ $ulangan->is_active ? 'Aktif' : 'Tidak Aktif' }} --}}
                        </span>
                    </div>
                    <h3 class="text-lg font-semibold mt-1">{{ $ulangan->judul }}</h3>
                    <p class="text-sm opacity-90 mt-1">
                        {{ Str::limit($ulangan->deskripsi, 50) }}
                    </p>
                </div>

                <!-- Card Body -->
                <div class="p-4">
                    <div class="space-y-3">
                        <!-- Time -->
                        <div class="flex items-center text-sm">
                            <i data-feather="clock" class="text-gray-500 mr-2 w-4 h-4"></i>
                            <span class="text-gray-700">
                                {{ $ulangan->mulai->timezone('Asia/Jakarta')->format('d F Y H:i') }} - {{ $ulangan->selesai->timezone('Asia/Jakarta')->format('d F Y H:i') }}
                            </span>
                        </div>

                        <!-- Creator -->
                        <div class="flex items-center text-sm">
                            <i data-feather="user" class="text-gray-500 mr-2 w-4 h-4"></i>
                            <span class="text-gray-700">
                                {{ $ulangan->creator->name ?? 'Admin'  }}
                            </span>
                        </div>

                        <div class="flex items-center text-sm">
                            <i data-feather="book-open" class="text-gray-500 mr-2 w-4 h-4"></i>
                            <span class="text-gray-700">
                                 {{ $ulangan->creator->guruProfile->mapel ?? 'Mapel Tidak Diketahui' }}
                            </span>
                        </div>

                        <!-- Status -->
                        <div class="mt-2">
                            @if($ulangan->status == 'Sedang Berlangsung')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i data-feather="activity" class="mr-1 w-3 h-3"></i>
                                    {{ $ulangan->status }}
                                </span>
                            @elseif($ulangan->status == 'Belum Dimulai')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i data-feather="clock" class="mr-1 w-3 h-3"></i>
                                    {{ $ulangan->status }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    <i data-feather="x-circle" class="mr-1 w-3 h-3"></i>
                                    {{ $ulangan->status }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="px-4 pb-4">
                    {{--  --}}
                    <a href="{{ route('ulangans.show', $ulangan) }}"
                    class="w-full bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded-md text-sm font-medium flex items-center justify-center transition-colors">
                    <i data-feather="eye" class="mr-1 w-4 h-4"></i>
                    Detail Ulangan
                </a>
                </div>
            </div>
            @empty
            <!-- Empty State -->
            <div class="col-span-full bg-white rounded-lg border border-gray-200 p-6 text-center">
                <div class="mx-auto w-16 h-16 text-gray-300 mb-4">
                    <i data-feather="book" class="w-full h-full"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-800 mb-1">Tidak Ada Ulangan</h3>
                <p class="text-gray-600 mb-4">Belum ada ulangan yang tersedia untuk kelas Anda.</p>
                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center" onclick="location.reload()">
                    <i data-feather="refresh-cw" class="mr-1 w-4 h-4"></i>
                    Refresh
                </button>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Initialize Feather Icons -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        feather.replace();
    });
</script>
@endsection
