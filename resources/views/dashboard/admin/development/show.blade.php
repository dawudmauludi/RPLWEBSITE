@extends('layouts.master')
@section('title', 'Detail Development')
@section('content')

<!-- Hero Section -->
<section class="relative bg-white overflow-hidden">
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25px 25px, #8B5CF6 2px, transparent 0), radial-gradient(circle at 75px 75px, #A855F7 2px, transparent 0); background-size: 100px 100px;"></div>
    </div>

    <div class="absolute top-0 left-0 right-0 h-96 bg-gradient-to-br from-purple-50/80 via-transparent to-purple-100/60"></div>

    <div class="relative container mx-auto px-6 py-16 pt-24">
        <div class="max-w-6xl mx-auto">
            <nav data-aos="fade-right" data-aos-duration="800" class="flex items-center space-x-2 text-sm mb-8">
                <a href="/" class="text-purple-600 hover:text-purple-700 transition-colors">
                    <i data-feather="home" class="w-4 h-4"></i>
                </a>
                <i data-feather="chevron-right" class="w-4 h-4 text-gray-400"></i>
                <a href="javascript:history.back()" class="text-purple-600 hover:text-purple-700 transition-colors">Development</a>
                <i data-feather="chevron-right" class="w-4 h-4 text-gray-400"></i>
                <span class="text-gray-600">{{ $development->name }}</span>
            </nav>

            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Content Side -->
                <div class="space-y-6">
                    <!-- Category Badge -->
                    <div data-aos="fade-right" data-aos-duration="1000" class="inline-flex items-center bg-white/90 backdrop-blur-sm border border-purple-100 px-4 py-2 rounded-full shadow-sm">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mr-3 animate-pulse"></div>
                        <i data-feather="layers" class="w-4 h-4 text-purple-600 mr-2"></i>
                        <span class="text-purple-700 font-medium text-sm">{{ $development->slug }}</span>
                    </div>

                    <!-- Title -->
                    <h1 data-aos="fade-right" data-aos-duration="1200" class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                        {{ $development->name ?? 'Tidak ditemukan development' }}
                    </h1>

                    <p data-aos="fade-right" data-aos-duration="1400" class="text-lg text-gray-600 leading-relaxed">
                        Eksplorasi mendalam tentang pengembangan dan implementasi {{ $development->name }} dalam pembelajaran interaktif.
                    </p>

                    <!-- Stats Cards -->
                    <div data-aos="fade-up" data-aos-duration="1600" class="grid grid-cols-2 gap-4 pt-4">
                        <div class="bg-white/80 backdrop-blur-sm border border-purple-50 rounded-xl p-4 shadow-sm">
                            <div class="flex items-center">
                                <div class="bg-purple-100 p-2 rounded-lg mr-3">
                                    <i data-feather="book-open" class="w-5 h-5 text-purple-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Total Materi</p>
                                    <p class="text-xl font-bold text-gray-900">{{ $development->listDevelopment->count() }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Image Side -->
                <div data-aos="zoom-in" data-aos-duration="1600" class="relative">
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-purple-200 rounded-full opacity-20 animate-pulse"></div>
                    <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-purple-300 rounded-full opacity-10 animate-pulse" style="animation-delay: 1s;"></div>

                    <!-- Main image container -->
                    <div class="relative bg-white rounded-3xl p-2 shadow-2xl">
                        <div class="relative overflow-hidden rounded-2xl">
                            <img
                                src="{{ asset('storage/' . $development->image) }}"
                                alt="{{ $development->name }}"
                                class="w-full h-80 object-cover transform hover:scale-105 transition-transform duration-700"
                            >
                            <!-- Gradient overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-900/20 to-transparent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="bg-white py-20">
    <div class="container mx-auto px-6">
        <div class="max-w-6xl mx-auto">

            <!-- Section Header -->
            <div class="text-center mb-16">
                <div data-aos="fade-up" data-aos-duration="800" class="inline-flex items-center bg-purple-50 border border-purple-100 px-6 py-3 rounded-full mb-6">
                    <i data-feather="info" class="w-5 h-5 text-purple-600 mr-2"></i>
                    <span class="text-purple-700 font-medium">Detail Pembelajaran</span>
                </div>
                <h2 data-aos="fade-up" data-aos-duration="1000" class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                    Tentang {{ $development->name }}
                </h2>
                <p data-aos="fade-up" data-aos-duration="1200" class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Pelajari setiap aspek pengembangan {{ $development->name }} dengan materi yang telah disusun secara sistematis dan terstruktur.
                </p>
            </div>

            <!-- Content Grid -->
            <div class="grid lg:grid-cols-3 gap-8">

                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    @foreach($development->listDevelopment as $index => $list)
                    <div data-aos="fade-up" data-aos-duration="{{ 800 + ($index * 200) }}" class="group">
                        <div class="bg-white border border-gray-100 rounded-2xl p-8 shadow-sm hover:shadow-lg hover:border-purple-100 transition-all duration-300">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold text-sm shadow-lg">
                                    {{ $index + 1 }}
                                </div>

                                <div class="flex-1">
                                    <div class="prose prose-lg max-w-none">
                                        <div class="text-gray-700 leading-relaxed group-hover:text-gray-900 transition-colors">
                                            {!! $list->name ?? '' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">

                    <!-- Quick Info Card -->
                    <div data-aos="fade-left" data-aos-duration="1000" class="bg-gradient-to-br from-purple-50 to-purple-100/50 border border-purple-100 rounded-2xl p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                            <i data-feather="zap" class="w-5 h-5 text-purple-600 mr-2"></i>
                            Informasi Cepat
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600 flex items-center">
                                    <i data-feather="layers" class="w-4 h-4 mr-2"></i>
                                    Kategori
                                </span>
                                <span class="font-medium text-gray-900">{{ $development->slug }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600 flex items-center">
                                    <i data-feather="list" class="w-4 h-4 mr-2"></i>
                                    Total Materi
                                </span>
                                <span class="font-medium text-gray-900">{{ $development->listDevelopment->count() }} Item</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600 flex items-center">
                                    <i data-feather="calendar" class="w-4 h-4 mr-2"></i>
                                    Status
                                </span>
                                <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">
                                    <div class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1"></div>
                                    Aktif
                                </span>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

            <!-- Back Button -->
            <div data-aos="fade-up" data-aos-duration="1600" class="flex justify-center pt-16">
                <a href="javascript:history.back()"
                   class="group inline-flex items-center px-8 py-4 bg-white border-2 border-purple-200 hover:border-purple-300 hover:bg-purple-50 text-purple-700 rounded-2xl font-medium shadow-sm hover:shadow-md transition-all duration-300">
                    <i data-feather="arrow-left" class="w-5 h-5 mr-3 group-hover:-translate-x-1 transition-transform"></i>
                    Kembali ke Daftar
                    <div class="ml-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <i data-feather="external-link" class="w-4 h-4"></i>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>

@endsection
