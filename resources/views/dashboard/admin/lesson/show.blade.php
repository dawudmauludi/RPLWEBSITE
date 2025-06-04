@extends('layouts.master')
@section('title', 'Detail Lesson')
@section('content')

<!-- Hero Section -->
<section class="relative bg-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25px 25px, #8B5CF6 2px, transparent 0), radial-gradient(circle at 75px 75px, #A855F7 2px, transparent 0); background-size: 100px 100px;"></div>
    </div>

    <!-- Purple gradient overlay -->
    <div class="absolute top-0 left-0 right-0 h-96 bg-gradient-to-br from-purple-50/80 via-transparent to-purple-100/60"></div>

    <div class="relative container mx-auto px-6 py-16 pt-24">
        <div class="max-w-6xl mx-auto">
            <!-- Breadcrumb -->
            <nav data-aos="fade-right" data-aos-duration="800" class="flex items-center space-x-2 text-sm mb-8">
                <a href="/" class="text-purple-600 hover:text-purple-700 transition-colors">
                    <i data-feather="home" class="w-4 h-4"></i>
                </a>
                <i data-feather="chevron-right" class="w-4 h-4 text-gray-400"></i>
                <a href="javascript:history.back()" class="text-purple-600 hover:text-purple-700 transition-colors">Lessons</a>
                <i data-feather="chevron-right" class="w-4 h-4 text-gray-400"></i>
                <span class="text-gray-600">{{ $lesson->name }}</span>
            </nav>

            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Content Side -->
                <div class="space-y-6">
                    <!-- Category Badge -->
                    <div data-aos="fade-right" data-aos-duration="1000" class="inline-flex items-center bg-white/90 backdrop-blur-sm border border-purple-100 px-4 py-2 rounded-full shadow-sm">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mr-3 animate-pulse"></div>
                        <i data-feather="book" class="w-4 h-4 text-purple-600 mr-2"></i>
                        <span class="text-purple-700 font-medium text-sm">{{ $lesson->slug }}</span>
                    </div>

                    <!-- Title -->
                    <h1 data-aos="fade-right" data-aos-duration="1200" class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                        {{ $lesson->name ?? 'Tidak ditemukan lesson' }}
                    </h1>

                    <!-- Description Preview -->
                    <div data-aos="fade-right" data-aos-duration="1400" class="text-lg text-gray-600 leading-relaxed">
                        <div class="line-clamp-3">
                            {!! Str::limit(strip_tags($lesson->description ?? ''), 200) !!}
                        </div>
                    </div>

                    <!-- Feature Tags -->
                    <div data-aos="fade-right" data-aos-duration="1600" class="flex flex-wrap gap-3">
                        <a href="#content-section" class="inline-flex items-center px-3 py-1 bg-purple-100 text-purple-700 text-sm font-medium rounded-full hover:bg-purple-200 transition-colors duration-200">
                            <i data-feather="file-text" class="w-3 h-3 mr-1"></i>
                            Penjelasan Detail
                        </a>
                    </div>
                </div>

                <!-- Image Side -->
                <div data-aos="zoom-in" data-aos-duration="1600" class="relative">
                    <!-- Decorative elements -->
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-purple-200 rounded-full opacity-20 animate-pulse"></div>
                    <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-purple-300 rounded-full opacity-10 animate-pulse" style="animation-delay: 1s;"></div>

                    <!-- Main image container -->
                    <div class="relative bg-white rounded-3xl p-3 shadow-2xl">
                        <div class="relative overflow-hidden rounded-2xl">
                            <img
                                src="{{ asset('storage/' . $lesson->image) }}"
                                alt="{{ $lesson->name }}"
                                class="w-full h-80 object-cover transform hover:scale-105 transition-transform duration-700"
                            >
                            <!-- Gradient overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-900/20 to-transparent"></div>

                            <!-- Info overlay -->
                            <div class="absolute bottom-4 left-4 right-4">
                                <div class="bg-white/90 backdrop-blur-sm p-3 rounded-lg shadow-lg">
                                    <p class="text-sm font-medium text-gray-900 flex items-center">
                                        <i data-feather="info" class="w-4 h-4 text-purple-600 mr-2"></i>
                                        Materi Pembelajaran Detail
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="bg-white py-20" id="content-section">
    <div class="container mx-auto px-6">
        <div class="max-w-6xl mx-auto">

            <!-- Section Header -->
            <div class="text-center mb-16">
                <div data-aos="fade-up" data-aos-duration="800" class="inline-flex items-center bg-purple-50 border border-purple-100 px-6 py-3 rounded-full mb-6">
                    <i data-feather="info" class="w-5 h-5 text-purple-600 mr-2"></i>
                    <span class="text-purple-700 font-medium">Detail Pembelajaran</span>
                </div>
                <h2 data-aos="fade-up" data-aos-duration="1000" class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                    Tentang Mapel {{ $lesson->name }}
                </h2>
                <p data-aos="fade-up" data-aos-duration="1200" class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Dapatkan pemahaman mendalam melalui materi pembelajaran yang telah dirancang khusus untuk kebutuhan Anda.
                </p>
            </div>

            <!-- Content Grid -->

                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Description Card -->
                    <div data-aos="fade-up" data-aos-duration="1000" class="bg-white border border-gray-100 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center mb-6">
                            <div class="bg-purple-100 p-3 rounded-xl mr-4">
                                <i data-feather="file-text" class="w-6 h-6 text-purple-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Deskripsi Pembelajaran</h3>
                        </div>

                        <div class="prose prose-lg max-w-full">
                            <div class="text-gray-700 leading-relaxed">
                                {!! $lesson->description ?? '<p class="text-gray-500 italic">Deskripsi tidak tersedia untuk lesson ini.</p>' !!}
                            </div>
                        </div>
                    </div>
                </div>




            <!-- Action Section -->
            <div data-aos="fade-up" data-aos-duration="1600" class="mt-16 text-center">
                <div class="bg-gradient-to-r from-purple-600 to-purple-700 rounded-3xl p-8 text-white relative overflow-hidden">
                    <!-- Background decoration -->
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full"></div>
                    <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-32 h-32 bg-white/5 rounded-full"></div>

                    <div class="relative">
                        <h3 class="text-2xl font-bold mb-2">Siap untuk Belajar?</h3>
                        <p class="text-purple-100 mb-6">Pelajari materi ini dengan penjelasan yang detail dan mudah dipahami</p>
                        <div class="flex flex-wrap justify-center gap-4">
                            <a href="javascript:history.back()"
                               class="inline-flex items-center px-8 py-4 bg-white/10 backdrop-blur-sm border border-white/20 text-white hover:bg-white/20 rounded-xl font-medium transition-all duration-300">
                                <i data-feather="arrow-left" class="w-5 h-5 mr-2"></i>
                                Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
