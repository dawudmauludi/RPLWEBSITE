@extends('layouts.master')
@section('title', 'Karya Siswa')
@section('content')
    <!-- Include Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <div class="min-h-screen bg-gradient-to-br from-purple-50 via-white to-purple-50">
        <div class="container mx-auto px-4 pt-24 pb-12">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-100 rounded-full mb-4">
                    <i data-feather="award" class="w-8 h-8 text-purple-600"></i>
                </div>
                <h1 class="text-4xl font-bold text-gray-800 mb-3">Karya Siswa</h1>
                <p class="text-gray-600 text-lg">Jelajahi kreativitas dan karya terbaik dari siswa-siswa kami</p>
            </div>

            <!-- Search & Filter Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-purple-100 p-8 mb-8">
                <div class="flex items-center mb-6">
                    <i data-feather="filter" class="w-5 h-5 text-purple-600 mr-2"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Filter & Pencarian</h3>
                </div>

                <form action="{{ route('karya.all') }}" method="GET" class="grid lg:grid-cols-3 gap-6">
                    <!-- Search Input -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 flex items-center">
                            <i data-feather="search" class="w-4 h-4 mr-2 text-purple-500"></i>
                            Cari Karya
                        </label>
                        <div class="relative">
                            <input type="text" name="search" value="{{ request('search') }}"
                                   class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 pl-12 bg-gray-50
                                          focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500
                                          transition-all duration-200"
                                   placeholder="Masukkan judul karya...">
                            <i data-feather="search" class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2"></i>
                        </div>
                    </div>

                    <!-- Class Filter -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 flex items-center">
                            <i data-feather="users" class="w-4 h-4 mr-2 text-purple-500"></i>
                            Filter Kelas
                        </label>
                        <div class="relative">
                            <select name="kelas"
                                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 pl-12 bg-gray-50
                                           focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500
                                           transition-all duration-200 appearance-none">
                                <option value="">Semua Kelas</option>
                                @foreach ($kelas as $kelasOption)
                                    <option value="{{ $kelasOption->id }}"
                                        {{ request('kelas') == $kelasOption->id ? 'selected' : '' }}>
                                        {{ $kelasOption->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <i data-feather="users" class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2"></i>
                            <i data-feather="chevron-down" class="w-5 h-5 text-gray-400 absolute right-4 top-1/2 transform -translate-y-1/2"></i>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-3 items-end">
                        <button type="submit"
                                class="flex-1 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800
                                       text-white rounded-xl px-6 py-3 font-semibold transition-all duration-200
                                       shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center">
                            <i data-feather="search" class="w-4 h-4 mr-2"></i>
                            Cari
                        </button>
                        @if(request()->has('search') || request()->has('kelas'))
                            <a href="{{ route('karya.all') }}"
                               class="flex-1 bg-gray-500 hover:bg-gray-600 text-white rounded-xl px-6 py-3 font-semibold
                                      transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5
                                      flex items-center justify-center">
                                <i data-feather="refresh-cw" class="w-4 h-4 mr-2"></i>
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Results Info -->
            @if(request()->has('search') || request()->has('kelas'))
                <div class="bg-purple-50 border border-purple-200 rounded-xl p-4 mb-6">
                    <div class="flex items-center text-purple-700">
                        <i data-feather="info" class="w-5 h-5 mr-2"></i>
                        <span class="font-medium">
                            Menampilkan hasil untuk:
                            @if(request('search'))
                                <span class="font-semibold">"{{ request('search') }}"</span>
                            @endif
                            @if(request('kelas'))
                                @php
                                    $selectedKelas = $kelas->where('id', request('kelas'))->first();
                                @endphp
                                @if($selectedKelas)
                                    <span class="font-semibold">Kelas {{ $selectedKelas->nama }}</span>
                                @endif
                            @endif
                        </span>
                    </div>
                </div>
            @endif

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-8">
                @forelse ($karyas as $karya)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-purple-100
                                hover:shadow-2xl hover:border-purple-300 transition-all duration-300 transform hover:-translate-y-2 group">

                        <!-- Image Container -->
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $karya->gambar_karya) }}" alt="{{ $karya->judul }}"
                                 class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-110">

                            <!-- Overlay with Class Info -->
                            <div class="absolute top-3 left-3">
                                <div class="bg-white/90 backdrop-blur-sm text-purple-700 text-xs font-semibold
                                           px-3 py-1.5 rounded-full border border-purple-200 flex items-center">
                                    <i data-feather="book-open" class="w-3 h-3 mr-1"></i>
                                    {{ $karya->user->kelas->nama ?? 'Kelas Tidak Diketahui' }}
                                </div>
                            </div>

                            <!-- Student Name -->
                            <div class="absolute top-3 right-3">
                                <div class="bg-purple-600 text-white text-xs font-semibold px-3 py-1.5 rounded-full flex items-center">
                                    <i data-feather="user" class="w-3 h-3 mr-1"></i>
                                    {{ $karya->user->name ?? 'Siswa' }}
                                </div>
                            </div>

                            <!-- Gradient Overlay -->
                            <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-3">
                                <h3 class="font-bold text-lg text-gray-800 line-clamp-2 flex-1">{{ $karya->judul }}</h3>
                            </div>

                            <p class="text-gray-600 text-sm mb-6 line-clamp-3">
                                {{ Str::limit($karya->deskripsi, 80, '...') }}
                            </p>

                            <a href="{{ route('karya.show', $karya->id) }}"
                               class="block w-full bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800
                                      text-white py-3 rounded-xl font-semibold transition-all duration-200
                                      shadow-md hover:shadow-lg transform hover:-translate-y-0.5 text-center flex items-center justify-center">
                                <i data-feather="eye" class="w-4 h-4 mr-2"></i>
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full">
                        <div class="bg-white rounded-2xl border-2 border-dashed border-gray-300 p-12 text-center">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                                <i data-feather="search" class="w-8 h-8 text-gray-400"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Tidak Ada Karya Ditemukan</h3>
                            <p class="text-gray-600 mb-4">Coba ubah kata kunci pencarian atau filter yang Anda gunakan</p>
                            <a href="{{ route('karya.all') }}"
                               class="inline-flex items-center text-purple-600 hover:text-purple-700 font-medium">
                                <i data-feather="refresh-cw" class="w-4 h-4 mr-2"></i>
                                Lihat Semua Karya
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if(method_exists($karyas, 'links'))
                <div class="mt-12 flex justify-center">
                    {{ $karyas->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Initialize Feather Icons -->
    <script>
        feather.replace();
    </script>
@endsection
