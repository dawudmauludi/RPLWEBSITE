@extends('layouts.master')
@section('title', 'Detail Career')
@section('content')

<!-- Hero Section with Modern Design -->
<section class="relative bg-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-0 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
        <div class="absolute top-0 right-0 w-72 h-72 bg-indigo-400 rounded-full mix-blend-multiply filter blur-xl animate-pulse delay-700"></div>
        <div class="absolute bottom-0 left-1/2 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse delay-1000"></div>
    </div>

    <div class="relative container mx-auto px-6 py-20 pt-32">
        <div class="max-w-5xl mx-auto">
            <!-- Breadcrumb -->
            <nav data-aos="fade-right" data-aos-duration="800" class="flex items-center space-x-2 text-sm mb-8">
                <a href="/" class="text-gray-500 hover:text-purple-600 transition-colors">Home</a>
                <i data-feather="chevron-right" class="w-4 h-4 text-gray-400"></i>
                <a href="javascript:history.back()" class="text-gray-500 hover:text-purple-600 transition-colors">Career</a>
                <i data-feather="chevron-right" class="w-4 h-4 text-gray-400"></i>
                <span class="text-purple-600 font-medium">{{ $career->name }}</span>
            </nav>

            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Content Side -->
                <div class="space-y-8">
                    <!-- Category Badge -->
                    <div data-aos="fade-up" data-aos-duration="600" class="inline-flex items-center">
                        <div class="flex items-center bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-medium">
                            <i data-feather="briefcase" class="w-4 h-4 mr-2"></i>
                            {{ $career->slug }}
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="space-y-4">
                        <h1 data-aos="fade-up" data-aos-duration="800" class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                            {{ $career->name ?? 'Tidak ditemukan career' }}
                        </h1>
                        <div data-aos="fade-up" data-aos-duration="1000" class="flex items-center space-x-4 text-gray-600">
                            <div class="flex items-center">
                                <i data-feather="calendar" class="w-4 h-4 mr-2"></i>
                                <span class="text-sm">{{ date('d M Y') }}</span>
                            </div>
                            <div class="flex items-center">
                                <i data-feather="trending-up" class="w-4 h-4 mr-2"></i>
                                <span class="text-sm">High Demand</span>
                            </div>
                        </div>
                    </div>

                    <p class="bg-purple-50 p-4 rounded-xl border border-purple-100" data-aos="fade-up" data-aos-duration="1200">
                        "Dengan {{ $career->name }}, kamu dapat menciptakan masa depan yang lebih cerah dan meningkatkan kualitas hidupmu sendiri dan orang lain. Jadi, jangan tunggu lagi, mulai berkarier dengan {{ $career->name }} sekarang!"
                    </p>

                </div>

                <!-- Image Side -->
                <div data-aos="fade-left" data-aos-duration="1000" class="relative">
                    <div class="relative">
                        <!-- Decorative Elements -->
                        <div class="absolute -top-4 -left-4 w-24 h-24 bg-purple-200 rounded-full opacity-20"></div>
                        <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-indigo-200 rounded-full opacity-20"></div>

                        <!-- Main Image Container -->
                        <div class="relative bg-gradient-to-br from-purple-100 to-indigo-100 p-8 rounded-3xl">
                            <img
                                src="{{ asset('storage/' . $career->image) }}"
                                alt="{{ $career->name }}"
                                class="w-full h-80 object-cover rounded-2xl shadow-2xl"
                            >
                            <!-- Floating Elements -->
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm p-3 rounded-full shadow-lg">
                                <i data-feather="star" class="w-5 h-5 text-yellow-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="bg-gray-50 py-20">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <!-- Section Header -->
            <div data-aos="fade-up" data-aos-duration="600" class="text-center mb-16">
                <div class="inline-flex items-center bg-white px-6 py-3 rounded-full shadow-sm mb-6">
                    <i data-feather="info" class="w-5 h-5 text-purple-600 mr-2"></i>
                    <span class="text-purple-700 font-medium">Career Information</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                    Tentang Karir {{ $career->name }}
                </h2>
                <p class="text-gray-600 text-lg">Pelajari lebih lanjut tentang peluang karir yang menarik ini</p>
            </div>

            <!-- Main Content Card -->
            <div data-aos="fade-up" data-aos-duration="800" class="bg-white rounded-3xl shadow-xl p-8 lg:p-12 mb-12">
                <!-- Content Header -->
                <div class="flex items-center mb-8">
                    <div class="flex items-center justify-center w-12 h-12 bg-purple-100 rounded-xl mr-4">
                        <i data-feather="file-text" class="w-6 h-6 text-purple-600"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Deskripsi Karir</h3>
                        <p class="text-gray-600">Informasi lengkap tentang karir ini</p>
                    </div>
                </div>

                <!-- Description Content -->
                <div class="prose prose-lg max-w-none">
                    <div class="bg-gradient-to-r from-purple-50 to-indigo-50 p-8 rounded-2xl border-l-4 border-purple-400 mb-8">
                        <div class="text-gray-700 leading-relaxed">
                            {!! $career->description ?? '<p class="text-gray-500 italic">Deskripsi tidak tersedia</p>' !!}
                        </div>
                    </div>
                </div>


            </div>

            <!-- Action Buttons -->
            <div data-aos="fade-up" data-aos-duration="1000" class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="javascript:history.back()"
                   class="inline-flex items-center px-8 py-4 bg-white text-purple-600 border-2 border-purple-600 rounded-2xl font-semibold hover:bg-purple-600 hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl group">
                    <i data-feather="arrow-left" class="w-5 h-5 mr-2 group-hover:transform group-hover:-translate-x-1 transition-transform"></i>
                    Kembali
                </a>

            </div>
        </div>
    </div>
</section>


@endsection
