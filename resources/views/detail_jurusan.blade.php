@extends('layouts.master')
@section('title', 'Detail Jurusan RPL')
@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-purple-50  to-indigo-100 py-16 pt-24">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                @foreach ($jurusans as $jurusan)
                <div class="inline-flex items-center bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm mb-6">
                    <i data-aos="fade-right" data-aos-duration="1600" data-feather="code" class="w-5 h-5 text-purple-600 mr-2"></i>
                    <span data-aos="fade-right" data-aos-duration="1600" class="text-purple-700 font-medium">{{$jurusan->other_name}}</span>
                </div>
                    <h1 data-aos="fade-up" data-aos-duration="1600" class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    {{ $jurusan->name ?? 'Tidak ditemukan Jurusan' }}
                </h1>
                <p data-aos="fade-up" data-aos-duration="1600" class="text-xl text-gray-600 mb-8 leading-relaxed">
                    {{ $jurusan->slogan ?? 'Slogan tidak tersedia.' }}
                </p>
                <div data-aos="zoom-in" data-aos-duration="1600" class="relative mx-auto max-w-2xl">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-indigo-400 rounded-2xl blur-2xl opacity-20"></div>
                    <img
                        src="{{ asset('storage/' . $jurusan->image) }}"
                        alt="{{ $jurusan->name }}"
                        class="relative rounded-2xl shadow-2xl w-full h-64 object-cover"
                    >
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Pengantar Jurusan -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="flex items-center mb-8">
                    @foreach ($jurusans as $jurusan)
                    <div class="bg-purple-100 p-3 rounded-full mr-4">
                        <i data-aos="fade-right" data-aos-duration="1600" data-feather="info" class="w-6 h-6 text-purple-600"></i>
                    </div>
                    <h2 data-aos="fade-right" data-aos-duration="1600" class="text-3xl font-bold text-gray-900">Tentang Jurusan {{ $jurusan->name }}</h2>
                </div>

                <div class="prose prose-lg max-w-none">
                    <div data-aos="fade-up" data-aos-duration="1600" class="bg-gradient-to-r from-purple-50 to-indigo-50 p-8 rounded-2xl border border-purple-100 mb-8">
                            <p class="text-gray-700 leading-relaxed mb-2">
                                {!! $jurusan->isi ?? '' !!}
                            </p>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </section>

    <!-- Fokus Pembelajaran -->
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center bg-white p-3 rounded-full shadow-sm mb-6">
                        <i data-aos="fade-down" data-aos-duration="1600" data-feather="target" class="w-6 h-6 text-purple-600 mr-2"></i>
                        <span data-aos="fade-down" data-aos-duration="1600" class="text-purple-700 font-semibold">Fokus Pembelajaran</span>
                    </div>
                    <h2 data-aos="fade-right" data-aos-duration="1600" class="text-3xl font-bold text-gray-900 mb-4">Siklus Pengembangan Software</h2>
                    <p data-aos="fade-up" data-aos-duration="1600" class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Jurusan RPL mengajarkan siklus hidup pengembangan perangkat lunak secara komprehensif dari perencanaan hingga pemeliharaan
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div data-aos="fade-right" data-aos-duration="1600" class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-purple-100 hover:border-purple-200">
                        <div class="bg-gradient-to-br from-purple-500 to-indigo-500 p-4 rounded-xl mb-6 w-fit">
                            <i data-feather="clipboard" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Perencanaan Sistem</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i data-feather="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-gray-700">Identifikasi kebutuhan pengguna dan tujuan pembuatan software</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-gray-700">Penyusunan jadwal pengembangan, anggaran, dan sumber daya</span>
                            </li>
                        </ul>
                    </div>

                    <div data-aos="fade-right" data-aos-duration="1600" class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-purple-100 hover:border-purple-200">
                        <div class="bg-gradient-to-br from-blue-500 to-cyan-500 p-4 rounded-xl mb-6 w-fit">
                            <i data-feather="search" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Analisis Kebutuhan</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i data-feather="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-gray-700">Menentukan fitur dan fungsi yang harus dimiliki aplikasi</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-gray-700">Melakukan survei atau wawancara pengguna untuk mengumpulkan kebutuhan</span>
                            </li>
                        </ul>
                    </div>

                    <div data-aos="fade-right" data-aos-duration="1600" class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-purple-100 hover:border-purple-200">
                        <div class="bg-gradient-to-br from-green-500 to-emerald-500 p-4 rounded-xl mb-6 w-fit">
                            <i data-feather="layout" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Perancangan Sistem</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i data-feather="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-gray-700">Mendesain struktur sistem secara umum dan rinci (flowchart, DFD, UML)</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-gray-700">Mendesain tampilan antarmuka pengguna (UI/UX design)</span>
                            </li>
                        </ul>
                    </div>

                    <div data-aos="fade-right" data-aos-duration="1600" class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-purple-100 hover:border-purple-200">
                        <div class="bg-gradient-to-br from-orange-500 to-red-500 p-4 rounded-xl mb-6 w-fit">
                            <i data-feather="code" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Pemrograman (Coding)</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i data-feather="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-gray-700">Menulis kode program sesuai desain dan kebutuhan</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-gray-700">Menggunakan berbagai bahasa pemrograman seperti Java, Python, PHP, JavaScript</span>
                            </li>
                        </ul>
                    </div>

                    <div data-aos="fade-right" data-aos-duration="1600" class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-purple-100 hover:border-purple-200">
                        <div class="bg-gradient-to-br from-pink-500 to-rose-500 p-4 rounded-xl mb-6 w-fit">
                            <i data-feather="activity" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Pengujian Software</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i data-feather="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-gray-700">Melakukan pengujian fungsionalitas (unit testing, integration testing)</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-gray-700">Mendeteksi dan memperbaiki bug atau kesalahan dalam program</span>
                            </li>
                        </ul>
                    </div>

                    <div data-aos="fade-right" data-aos-duration="1600" class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-purple-100 hover:border-purple-200">
                        <div class="bg-gradient-to-br from-indigo-500 to-purple-500 p-4 rounded-xl mb-6 w-fit">
                            <i data-feather="server" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Implementasi & Pemeliharaan</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i data-feather="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-gray-700">Menginstal dan menjalankan software pada lingkungan pengguna</span>
                            </li>
                            <li class="flex items-start">
                                <i data-feather="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                <span class="text-gray-700">Melakukan update, perbaikan, dan penyesuaian jika dibutuhkan</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mata Pelajaran Produktif -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center bg-purple-50 p-3 rounded-full mb-6">
                        <i data-aos="fade-right" data-aos-duration="1600" data-feather="book-open" class="w-6 h-6 text-purple-600 mr-2"></i>
                        <span data-aos="fade-left" data-aos-duration="1600" class="text-purple-700 font-semibold">Kurikulum</span>
                    </div>
                    <h2 data-aos="fade-up" data-aos-duration="1600" class="text-3xl font-bold text-gray-900 mb-4">Mata Pelajaran Produktif</h2>
                    <p data-aos="fade-up" data-aos-duration="1600" class="text-xl text-gray-600">Mata pelajaran inti yang akan memperkuat kemampuan teknis dan profesional Anda</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($lessons as $lesson)
                        <a href="{{  route('lesson.show', $lesson->slug) }}" data-aos="fade-up" data-aos-duration="1600" class="group bg-gradient-to-br from-blue-50 to-cyan-50 p-6 rounded-xl border border-blue-100 hover:border-blue-200 hover:shadow-lg transition-all duration-300">
                            <div class="flex items-center">
                                <div class="bg-blue-500 p-2 rounded-lg mr-3 group-hover:scale-110 transition-transform duration-300">
                                    <i data-feather="{{ $lesson->icon }}" class="w-5 h-5 text-white"></i>
                                </div>
                                <span class="font-semibold text-gray-800">{{$lesson->name}}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Teknologi dan Tools -->
    <section class="bg-gradient-to-br from-purple-900 via-indigo-900 to-blue-900 text-white py-16 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-40 h-40 bg-purple-300 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-indigo-300 rounded-full blur-2xl"></div>
        </div>

        <div class="container mx-auto px-6 relative">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center bg-white/10 backdrop-blur-sm p-3 rounded-full mb-6">
                        <i data-aos="zoom-in" data-aos-duration="1600" data-feather="cpu" class="w-6 h-6 text-purple-300 mr-2"></i>
                        <span data-aos="zoom-in" data-aos-duration="1600" class="text-purple-200 font-semibold">Teknologi Modern</span>
                    </div>
                    <h2 data-aos="fade-up" data-aos-duration="1600" class="text-3xl font-bold mb-4">Teknologi dan Tools yang Dipelajari</h2>
                    <p data-aos="fade-up" data-aos-duration="1600" class="text-xl text-purple-100 max-w-3xl mx-auto">
                        Menguasai teknologi terdepan yang digunakan industri software development saat ini
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-6 mb-12">
                    @foreach ($languages as $language)
                        <a href="{{ route('language.show', $language->slug) }}" data-aos="zoom-in" data-aos-duration="1600" class="bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/20 hover:bg-white/20 transition-all duration-300">
                            <div class="text-center">
                                <i data-feather="{{ $language->icon }}" class="w-8 h-8 mx-auto mb-2 text-purple-300"></i>
                                <p class="font-semibold">{{$language->name}}</p>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Animated Tech Icons -->
                <div class="overflow-hidden mb-8 mt-12">
                    <div class="animate-marquee-img whitespace-nowrap flex items-center" style="gap: 3rem;">
                        @foreach ($languages as $language)
                            <img src="{{ asset('storage/' . $language->image) }}" alt="{{ $language->name }}" class="h-16 inline-block mx-6 opacity-80 hover:opacity-100 transition-opacity">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prospek Karier -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center bg-purple-50 p-3 rounded-full mb-6">
                        <i data-aos="zoom-out" data-aos-duration="1600" data-feather="trending-up" class="w-6 h-6 text-purple-600 mr-2"></i>
                        <span data-aos="zoom-out" data-aos-duration="1600" class="text-purple-700 font-semibold">Prospek Karier</span>
                    </div>
                    <h2 data-aos="fade-up" data-aos-duration="1600" class="text-3xl font-bold text-gray-900 mb-4">Peluang Karier Lulusan RPL</h2>
                    <p data-aos="fade-up" data-aos-duration="1600" class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Lulusan jurusan RPL memiliki prospek kerja yang sangat luas di era digital dengan berbagai pilihan karier yang menjanjikan
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    <div data-aos="fade-right" data-aos-duration="1600" class="group bg-gradient-to-br from-purple-50 to-indigo-50 p-8 rounded-2xl border border-purple-100 hover:border-purple-200 hover:shadow-xl transition-all duration-300">
                        <div class="bg-gradient-to-br from-purple-500 to-indigo-500 p-4 rounded-xl mb-6 w-fit group-hover:scale-110 transition-transform duration-300">
                            <i data-feather="code" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Software Developer</h3>
                        <p class="text-gray-600">Mengembangkan aplikasi dan sistem perangkat lunak untuk berbagai platform dan kebutuhan bisnis</p>
                    </div>

                    <div data-aos="fade-right" data-aos-duration="1600" class="group bg-gradient-to-br from-blue-50 to-cyan-50 p-8 rounded-2xl border border-blue-100 hover:border-blue-200 hover:shadow-xl transition-all duration-300">
                        <div class="bg-gradient-to-br from-blue-500 to-cyan-500 p-4 rounded-xl mb-6 w-fit group-hover:scale-110 transition-transform duration-300">
                            <i data-feather="globe" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Web Developer</h3>
                        <p class="text-gray-600">Membangun dan memelihara website serta aplikasi web dengan teknologi terdepan</p>
                    </div>

                    <div data-aos="fade-right" data-aos-duration="1600" class="group bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl border border-green-100 hover:border-green-200 hover:shadow-xl transition-all duration-300">
                        <div class="bg-gradient-to-br from-green-500 to-emerald-500 p-4 rounded-xl mb-6 w-fit group-hover:scale-110 transition-transform duration-300">
                            <i data-feather="smartphone" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Mobile App Developer</h3>
                        <p class="text-gray-600">Mengembangkan aplikasi mobile untuk platform Android dan iOS menggunakan teknologi modern</p>
                    </div>

                    <div data-aos="fade-right" data-aos-duration="1600" class="group bg-gradient-to-br from-orange-50 to-red-50 p-8 rounded-2xl border border-orange-100 hover:border-orange-200 hover:shadow-xl transition-all duration-300">
                        <div class="bg-gradient-to-br from-orange-500 to-red-500 p-4 rounded-xl mb-6 w-fit group-hover:scale-110 transition-transform duration-300">
                            <i data-feather="layout" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">UI/UX Designer</h3>
                        <p class="text-gray-600">Merancang antarmuka dan pengalaman pengguna yang intuitif dan menarik</p>
                    </div>

                    <div data-aos="fade-right" data-aos-duration="1600" class="group bg-gradient-to-br from-pink-50 to-rose-50 p-8 rounded-2xl border border-pink-100 hover:border-pink-200 hover:shadow-xl transition-all duration-300">
                        <div class="bg-gradient-to-br from-pink-500 to-rose-500 p-4 rounded-xl mb-6 w-fit group-hover:scale-110 transition-transform duration-300">
                            <i data-feather="database" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Database Administrator</h3>
                        <p class="text-gray-600">Mengelola dan mengoptimalkan sistem basis data untuk performa maksimal</p>
                    </div>

                    <div data-aos="fade-right" data-aos-duration="1600" class="group bg-gradient-to-br from-indigo-50 to-purple-50 p-8 rounded-2xl border border-indigo-100 hover:border-indigo-200 hover:shadow-xl transition-all duration-300">
                        <div class="bg-gradient-to-br from-indigo-500 to-purple-500 p-4 rounded-xl mb-6 w-fit group-hover:scale-110 transition-transform duration-300">
                            <i data-feather="activity" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">System Analyst</h3>
                        <p class="text-gray-600">Menganalisis kebutuhan sistem dan merancang solusi teknologi yang efektif</p>
                    </div>

                    <div data-aos="fade-right" data-aos-duration="1600" class="group bg-gradient-to-br from-teal-50 to-cyan-50 p-8 rounded-2xl border border-teal-100 hover:border-teal-200 hover:shadow-xl transition-all duration-300">
                        <div class="bg-gradient-to-br from-teal-500 to-cyan-500 p-4 rounded-xl mb-6 w-fit group-hover:scale-110 transition-transform duration-300">
                            <i data-feather="settings" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">DevOps Engineer</h3>
                        <p class="text-gray-600">Mengelola infrastruktur teknologi dan otomatisasi proses pengembangan</p>
                    </div>

                    <div data-aos="fade-right" data-aos-duration="1600" class="group bg-gradient-to-br from-violet-50 to-purple-50 p-8 rounded-2xl border border-violet-100 hover:border-violet-200 hover:shadow-xl transition-all duration-300">
                        <div class="bg-gradient-to-br from-violet-500 to-purple-500 p-4 rounded-xl mb-6 w-fit group-hover:scale-110 transition-transform duration-300">
                            <i data-feather="help-circle" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">IT Support</h3>
                        <p class="text-gray-600">Memberikan dukungan teknis dan solusi untuk masalah teknologi informasi</p>
                    </div>

                    <div data-aos="fade-right" data-aos-duration="1600" class="group bg-gradient-to-br from-emerald-50 to-green-50 p-8 rounded-2xl border border-emerald-100 hover:border-emerald-200 hover:shadow-xl transition-all duration-300">
                        <div class="bg-gradient-to-br from-emerald-500 to-green-500 p-4 rounded-xl mb-6 w-fit group-hover:scale-110 transition-transform duration-300">
                            <i data-feather="check-circle" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">QA Engineer</h3>
                        <p class="text-gray-600">Melakukan pengujian kualitas software untuk memastikan performa optimal</p>
                    </div>
                </div>

                <!-- Kelebihan Jurusan RPL -->
                <div data-aos="fade-up" data-aos-duration="1600" class="bg-gradient-to-br from-purple-50 to-indigo-50 p-8 md:p-12 rounded-3xl border border-purple-100">
                    <div class="flex items-center mb-8">
                        <div class="bg-gradient-to-br from-purple-500 to-indigo-500 p-4 rounded-2xl mr-6">
                            <i data-feather="star" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Kelebihan Jurusan RPL</h3>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="bg-green-100 p-2 rounded-full mr-4 mt-1">
                                    <i data-feather="check" class="w-5 h-5 text-green-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-2">Keterampilan yang Dibutuhkan Industri</h4>
                                    <p class="text-gray-600">Menyediakan keterampilan yang sangat dibutuhkan di dunia kerja modern dan era digital</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-green-100 p-2 rounded-full mr-4 mt-1">
                                    <i data-feather="check" class="w-5 h-5 text-green-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-2">Cocok untuk Siswa Kreatif</h4>
                                    <p class="text-gray-600">Ideal untuk siswa yang kreatif, logis, dan memiliki passion dalam teknologi</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="bg-green-100 p-2 rounded-full mr-4 mt-1">
                                    <i data-feather="check" class="w-5 h-5 text-green-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-2">Potensi Entrepreneur</h4>
                                    <p class="text-gray-600">Berpotensi untuk bekerja secara freelance atau membuka startup teknologi sendiri</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-green-100 p-2 rounded-full mr-4 mt-1">
                                    <i data-feather="check" class="w-5 h-5 text-green-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-2">Fleksibilitas Kerja</h4>
                                    <p class="text-gray-600">Dapat bekerja remote dari mana saja dengan koneksi internet yang stabil</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom CSS for Animations -->
    <style>
        @keyframes marquee-img {
            0% { transform: translateX(0); }
            100% { transform: translateX(-33.333%); }
        }
        .animate-marquee-img {
            display: flex;
            width: max-content;
            animation: marquee-img 25s linear infinite;
            align-items: center;
        }

        /* Hover effects */
        .group:hover .group-hover\:scale-110 {
            transform: scale(1.1);
        }

        /* Smooth transitions */
        * {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>

    <!-- Script untuk inisialisasi Feather Icons -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            feather.replace();
        });
    </script>
@endsection
