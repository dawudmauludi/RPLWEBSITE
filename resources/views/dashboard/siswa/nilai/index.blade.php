@extends('layouts.masterDashboard')
@section('title', 'Daftar Ulangan')
@section('content')

<!-- Include Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-purple-50 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center space-x-3 mb-2">
                <div class="bg-purple-100 p-2 rounded-lg">
                    <i data-feather="book-open" class="w-6 h-6 text-purple-600"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900">Daftar Ulangan</h1>
            </div>
            <p class="text-gray-600">Kelola dan pantau hasil ulangan kelas Anda</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center">
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <i data-feather="file-text" class="w-6 h-6 text-purple-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Ulangan</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $ulanganList->count() }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <i data-feather="check-circle" class="w-6 h-6 text-green-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Selesai</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $ulanganList->count() }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i data-feather="users" class="w-6 h-6 text-blue-600"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Siswa Aktif</p>
                        <p class="text-2xl font-bold text-gray-900">-</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <i data-feather="list" class="w-6 h-6 text-white"></i>
                        <h3 class="text-white text-xl font-semibold">Daftar Ulangan Kelas Anda</h3>
                    </div>
                    <div class="flex items-center space-x-2 text-purple-100">
                        <i data-feather="calendar" class="w-4 h-4"></i>
                        <span class="text-sm">{{ date('d M Y') }}</span>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                @if($ulanganList->isEmpty())
                    <!-- Empty State -->
                    <div class="text-center py-12">
                        <div class="bg-gray-100 rounded-full p-4 w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                            <i data-feather="inbox" class="w-10 h-10 text-gray-400"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Ulangan</h3>
                        <p class="text-gray-600 mb-6">Ulangan belum tersedia untuk kelas Anda saat ini.</p>
                    </div>
                @else
                    <!-- Ulangan List -->
                    <div class="space-y-4">
                        @foreach ($ulanganList as $index => $ulangan)
                        <div class="group bg-gray-50 hover:bg-purple-50 border border-gray-200 hover:border-purple-200 rounded-xl p-6 transition-all duration-200 hover:shadow-md">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <!-- Number Badge -->
                                    <div class="bg-purple-600 text-white rounded-full w-10 h-10 flex items-center justify-center font-bold text-sm">
                                        {{ $index + 1 }}
                                    </div>
                                    
                                    <!-- Ulangan Info -->
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 group-hover:text-purple-900 transition-colors">
                                            {{ $ulangan->judul }}
                                        </h4>
                                        <div class="flex items-center space-x-4 mt-2 text-sm text-gray-600">
                                            <div class="flex items-center space-x-1">
                                                <i data-feather="calendar" class="w-4 h-4"></i>
                                                <span>{{ date('d M Y') }}</span>
                                            </div>
                                            <div class="flex items-center space-x-1">
                                                <i data-feather="clock" class="w-4 h-4"></i>
                                                <span>{{ $ulangan->selesai }}</span>
                                            </div>
                                            <div class="flex items-center space-x-1">
                                                <i data-feather="users" class="w-4 h-4"></i>
                                                <span>- siswa</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center space-x-3">
                                    <!-- Status Badge -->
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium flex items-center space-x-1">
                                        <i data-feather="check-circle" class="w-3 h-3"></i>
                                        <span>Selesai</span>
                                    </span>
                                    
                                    <!-- View Button -->
                                    <a href="{{ route('nilai.showNilai', $ulangan->id) }}" 
                                       class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-medium transition duration-200 flex items-center space-x-2 shadow-sm hover:shadow-md">
                                        <i data-feather="eye" class="w-4 h-4"></i>
                                        <span>Lihat Nilai</span>
                                    </a>
                                    
                                    <!-- More Options -->
                                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-600 p-3 rounded-lg transition duration-200">
                                        <i data-feather="more-horizontal" class="w-4 h-4"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Progress Bar (Optional) -->
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <div class="flex items-center justify-between text-sm text-gray-600 mb-2">
                                    <span>Progress Penilaian</span>
                                    <span>100%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-purple-600 h-2 rounded-full" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination (if needed) -->
                    <div class="mt-8 flex justify-center">
                      {{ $ulanganList->links()}}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Initialize Feather Icons -->
<script>
    feather.replace();
</script>

@endsection