@extends('layouts.master')
@section('title', 'RPL')
@section('content')

<!-- Hero Section -->
 <div class="relative w-full min-h-screen bg-black overflow-hidden">
        <!-- Background Image -->
        <img src="{{ asset('images/brawijaya.jpg') }}"
             alt="Background SMKN 1 Pasuruan"
             class="absolute inset-0 w-full h-full object-cover opacity-30">

        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-4 -left-4 w-48 h-48 sm:w-72 sm:h-72 bg-purple-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute top-1/2 -right-8 w-64 h-64 sm:w-96 sm:h-96 bg-indigo-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute bottom-0 left-1/3 w-56 h-56 sm:w-80 sm:h-80 bg-violet-500/10 rounded-full blur-3xl animate-pulse delay-500"></div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 flex flex-col items-start justify-center text-white px-4 sm:px-6 lg:px-8 py-8 sm:py-16 min-h-screen max-w-7xl mx-auto">

            <!-- Header Section -->
            <div class="hero-layout flex items-center mb-6 sm:mb-8 animate-fade-in-up w-full">

                <!-- Logo Container -->
                <div class="hero-logo-container relative flex-shrink-0">
                    <img src="{{ asset('images/logo_skensa.png') }}"
                         alt="Logo SMKN 1 Pasuruan"
                         class="hero-logo h-20 sm:h-32 lg:h-40 mr-0 sm:mr-6 lg:mr-8 drop-shadow-2xl transform hover:scale-105 transition-transform duration-300 mx-auto sm:mx-0">
                    <div class="absolute -inset-2 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-full opacity-20 blur-xl"></div>
                </div>

                <!-- Text Content -->
                <div class="hero-text hero-content text-left sm:ml-4 lg:ml-10 flex-1">
                    <div class="flex items-center justify-center sm:justify-start mb-2">
                        <i data-feather="code" class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 mr-2 sm:mr-3 text-purple-300"></i>
                        <h2 class="text-sm sm:text-lg lg:text-xl font-bold tracking-widest text-purple-200 uppercase">Jurusan</h2>
                    </div>

                    <h1 class="text-5xl sm:text-6xl lg:text-6xl font-bold mb-3 text-purple-100">
                        Rekayasa Perangkat Lunak
                    </h1>

                    <div class="flex items-center justify-center sm:justify-start">
                        <i data-feather="map-pin" class="w-4 h-4 sm:w-5 sm:h-5 mr-2 text-purple-300"></i>
                        <p class="text-base sm:text-lg lg:text-xl text-purple-100">SMK Negeri 1 Pasuruan</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="hero-buttons flex flex-col sm:flex-row gap-3 sm:gap-4 animate-fade-in-up delay-300 w-full sm:w-auto">
                <a href="/tentang-jurusan"
                   class="group relative px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl">
                    <div class="flex items-center justify-center">
                        <i data-feather="globe" class="w-4 h-4 sm:w-5 sm:h-5 mr-2 group-hover:rotate-12 transition-transform duration-300"></i>
                        <span class="text-sm sm:text-base">Jelajahi Jurusan</span>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 rounded-lg transition-opacity duration-300"></div>
                </a>

                <a href="#visi-misi"
                   class="group px-6 sm:px-8 py-3 sm:py-4 border-2 border-purple-400 hover:bg-purple-600 text-purple-100 hover:text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105">
                    <div class="flex items-center justify-center">
                        <i data-feather="arrow-down" class="w-4 h-4 sm:w-5 sm:h-5 mr-2 group-hover:translate-y-1 transition-transform duration-300"></i>
                        <span class="text-sm sm:text-base">Pelajari Lebih Lanjut</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

<!-- Vision, Mission, Goals Section -->
<div id="visi-misi" class="bg-gradient-to-br from-gray-50 to-purple-50 py-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="flex items-center justify-center mb-4">
                <i data-aos="fade-right" data-aos-duration="1600" data-feather="target" class="w-8 h-8 text-purple-600 mr-3"></i>
                <h2 class="text-4xl font-bold text-gray-800" data-aos="fade-down" data-aos-duration="1600">Future Sekolah</h2>
            </div>
            <div data-aos="fade-left" data-aos-duration="1600" class="w-24 h-1 bg-gradient-to-r from-purple-600 to-indigo-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @foreach ($futures as $future )
                <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-purple-500" data-aos="fade-up" data-aos-duration="1600">
                <div class="flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i data-feather="{{ $future->icon }}" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-purple-700 mb-4 uppercase tracking-wide">{{ $future->name }}</h3>
                    <p class="text-gray-700 leading-relaxed">
                        {!! $future->description !!}
                    </p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

<div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden mt-10 mb-10">
    <div class="bg-gradient-to-br from-purple-900 via-purple-700 to-indigo-800 text-white px-8 py-10 relative overflow-hidden rounded-t-3xl">
        <div class="absolute inset-0 bg-black bg-opacity-10"></div>
        <div class="absolute top-6 right-6 opacity-10">
            <i data-feather="award" class="w-20 h-20"></i>
        </div>
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-2">
                <i data-feather="users" class="w-6 h-6 text-purple-300"></i>
                <span class="text-purple-200 text-sm font-semibold tracking-wide uppercase">Kaprodi</span>
            </div>
            <h2 class="text-3xl md:text-5xl font-bold leading-tight tracking-tight">
                Sambutan Kepala Jurusan
                <span class="block text-xl md:text-2xl font-medium text-purple-200 mt-2">
                    Rekayasa Perangkat Lunak
                </span>
            </h2>
        </div>
    </div>

    @foreach ($kaprodis as $kaprodi)
    <div class="flex flex-col lg:flex-row gap-8 p-8 lg:p-12">
        <div class="lg:w-2/3 space-y-6">
            <div class="prose prose-gray max-w-none">
                <div class="flex items-center gap-3 mb-6">
                    <div class="bg-gradient-to-r from-purple-500 to-indigo-500 p-2 rounded-xl shadow-md">
                        <i data-feather="message-circle" class="w-5 h-5 text-white"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 m-0">Pesan dari Kepala Jurusan</h3>
                </div>

                <div class="text-gray-700 leading-relaxed text-justify bg-gradient-to-br from-purple-50 to-indigo-50 p-6 rounded-2xl shadow-inner">
                    <div class="prose prose-lg max-w-none">
                        {!! $kaprodi->description !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:w-1/3 flex justify-center lg:justify-end">
            <div class="relative">
                <div class="bg-gradient-to-br from-purple-100 via-purple-50 to-indigo-100 rounded-3xl p-6 shadow-xl transition-all duration-300 hover:scale-[1.02]">
                    <div class="absolute -top-3 -right-3 bg-gradient-to-br from-purple-500 to-indigo-500 w-12 h-12 rounded-full opacity-20"></div>
                    <div class="absolute -bottom-3 -left-3 bg-gradient-to-br from-indigo-500 to-purple-500 w-8 h-8 rounded-full opacity-20"></div>

                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg relative">
                        <div class="absolute top-3 right-3 bg-purple-500 rounded-full p-1.5 z-10 shadow-md">
                            <i data-feather="star" class="w-4 h-4 text-white"></i>
                        </div>
                        <img src="{{ $kaprodi->image ? url('storage/' . $kaprodi->image) : asset('images/logo_skensa.png') }}"
                             alt="{{ $kaprodi->name }}"
                             class="w-full h-80 object-cover object-center transition-transform duration-300 hover:scale-105">
                    </div>

                    <div class="mt-6 space-y-4">
                        <div class="bg-gradient-to-r from-purple-800 to-indigo-800 text-white px-5 py-4 rounded-xl text-center shadow-md">
                            <div class="flex items-center justify-center gap-2 mb-1">
                                <i data-feather="user" class="w-5 h-5"></i>
                                <span class="font-bold text-lg">{{ $kaprodi->name }}</span>
                            </div>
                            <div class="text-purple-200 text-sm font-medium">Kepala Jurusan RPL</div>
                        </div>

                        <div class="bg-white rounded-xl p-4 shadow">
                            <div class="flex items-center gap-2 mb-2">
                                <i data-feather="zap" class="w-4 h-4 text-purple-600"></i>
                                <span class="text-xs font-bold text-purple-600 uppercase tracking-wider">Motto</span>
                            </div>
                            <p class="text-sm text-gray-700 italic font-medium text-center">
                                @if(isset($kaprodi->slogan) && $kaprodi->slogan)
                                    "{{ $kaprodi->slogan }}"
                                @else
                                    "Inovasi, Kolaborasi, Transformasi Digital"
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


<div class="bg-gradient-to-r from-purple-900 via-indigo-900 to-purple-800 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/2 space-y-6">
                <div class="flex items-center mb-4">
                    <i data-feather="cpu" class="w-8 h-8 text-purple-300 mr-3"></i>
                    <h2 data-aos="fade-up" data-aos-duration="1600" class="text-4xl font-bold">Jurusan</h2>
                </div>
                @foreach ($jurusans->take(1) as $jurusan)
                    <h3 data-aos="fade-down" data-aos-duration="1600" class="text-2xl text-purple-200 mb-6">{{$jurusan->name}}</h3>

                <div data-aos="zoom-in" data-aos-duration="1600" class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                    <p class="text-purple-100 leading-relaxed mb-6">
                        {!! Str::limit($jurusan->isi, 500, ' ...') !!}
                    </p>

                    <div class="flex flex-wrap gap-3 mb-6 mt-4">
                        @foreach ($lessons->take(4) as $lesson)
                        <span class="px-3 py-1 bg-purple-600/50 rounded-full text-sm flex items-center">
                            <i data-feather="{{ $lesson->icon }}" class="w-4 h-4 mr-2"></i>{{ $lesson->name }}
                        </span>
                        @endforeach
                    </div>

                    <a href="/tentang-jurusan"
                       class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i data-feather="arrow-right" class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                        Selengkapnya
                    </a>
                </div>
                @endforeach
            </div>

            <div class="lg:w-1/2">
                <div data-aos="zoom-in" data-aos-duration="1600" class="relative group">
                    <div class="absolute -inset-4 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-2xl opacity-30 blur-xl group-hover:opacity-50 transition-opacity duration-300"></div>
                    <img src="{{ asset('images/coding1.jpg') }}" alt="Programming Illustration"
                         class="relative rounded-2xl shadow-2xl w-full max-w-md mx-auto transform group-hover:scale-105 transition-transform duration-300">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Subject Section -->
<div class="bg-gradient-to-br from-gray-50 to-purple-50 py-20">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/2">
                <div data-aos="zoom-out" data-aos-duration="1600" class="relative group">
                    <div class="absolute -inset-4 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl opacity-20 blur-xl group-hover:opacity-40 transition-opacity duration-300"></div>
                    <img src="{{ asset('images/coding2.jpg') }}" alt="Coding"
                         class="relative rounded-2xl shadow-xl w-full max-w-sm mx-auto transform group-hover:scale-105 transition-transform duration-300">
                </div>
            </div>

            <div class="lg:w-1/2">
                <div class="flex items-center mb-6">
                    <i data-feather="book-open" class="w-8 h-8 text-purple-600 mr-3"></i>
                    <h2 data-aos="fade-up" data-aos-duration="1600" class="text-4xl font-bold text-gray-800">Mata Pelajaran Produktif</h2>
                </div>
                <h3 data-aos="fade-up" data-aos-duration="1600" class="text-2xl text-purple-600 mb-8">Rekayasa Perangkat Lunak</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                   @foreach($lessons->take(8) as $lesson)
                        <a href="{{ route('lesson.show', $lesson->slug) }}"
                        class="block"
                        data-aos="fade-right"
                        data-aos-duration="1600">
                            <div class="group flex items-center p-4 bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-purple-100 hover:border-purple-300">
                                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                                    <i data-feather="{{ $lesson->icon }}" class="w-5 h-5 text-white"></i>
                                </div>
                                <span class="text-gray-700 group-hover:text-purple-700 font-medium transition-colors duration-300">
                                    {{ $lesson->name }}
                                </span>
                            </div>
                        </a>
                    @endforeach

                </div>

                <a href="{{ route('detail.jurusan') }}"
                   class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i data-feather="external-link" class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform duration-300"></i>
                    Selengkapnya
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Student Works Section -->
<section class="bg-gradient-to-br from-purple-900 via-indigo-900 to-purple-800 py-20 text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <div class="flex items-center justify-center mb-4">
                <i data-feather="folder" class="w-8 h-8 text-purple-300 mr-3"></i>
                <h2 data-aos="fade-left" data-aos-duration="1600" class="text-4xl font-bold">Karya Siswa</h2>
            </div>
            <div class="w-24 h-1 bg-gradient-to-r from-purple-400 to-indigo-400 mx-auto rounded-full"></div>
            <p data-aos="fade-right" data-aos-duration="1600" class="text-purple-200 mt-4 max-w-2xl mx-auto">Showcase proyek-proyek terbaik dari siswa Rekayasa Perangkat Lunak</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach ($karyas->take(6) as $karya)
                <div data-aos="zoom-in" data-aos-duration="1600" class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-purple-200">
                    <!-- Header -->
                    <div class="relative">
                        <div class="absolute top-4 left-4 z-10">
                            <span class="px-3 py-1 bg-purple-600/90 backdrop-blur-sm text-white text-xs font-semibold rounded-full border border-white/20">
                                <i data-feather="users" class="w-3 h-3 inline mr-1"></i>
                                {{ $karya->user->kelas->nama ?? 'Kelas Tidak Diketahui' }}
                            </span>
                        </div>
                        <div class="absolute top-4 right-4 z-10">
                            <span class="px-3 py-1 bg-indigo-600/90 backdrop-blur-sm text-white text-xs font-semibold rounded-full border border-white/20">
                                <i data-feather="user" class="w-3 h-3 inline mr-1"></i>
                                {{ $karya->user->nama ?? 'Siswa' }}
                            </span>
                        </div>

                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $karya->gambar_karya) }}" alt="{{ $karya->judul }}"
                                class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6 text-gray-800">
                        <h3 class="font-bold text-xl mb-3 text-gray-800 group-hover:text-purple-700 transition-colors duration-300">
                            {{ $karya->judul }}
                        </h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            {{ Str::limit($karya->deskripsi, 80, '...') }}
                        </p>
                        <a href="{{ route('karya.show', $karya->id) }}"
                           class="group/btn w-full flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <i data-feather="eye" class="w-4 h-4 mr-2 group-hover/btn:rotate-12 transition-transform duration-300"></i>
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Full Project Button -->
        <div class="text-center">
            <a href="{{ route('karya.all') }}"
               class="group inline-flex items-center px-8 py-4 bg-white/10 backdrop-blur-lg border border-white/20 hover:bg-white/20 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                <i data-feather="grid" class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform duration-300"></i>
                Lihat Semua Proyek
            </a>
        </div>
    </div>
</section>

<!-- News Section -->
<div class="bg-gradient-to-br from-gray-50 to-purple-50 py-20" id="berita">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <i data-feather="newspaper" class="w-8 h-8 text-purple-600 mr-3"></i>
                <h2 data-aos="fade-right" data-aos-duration="1600" class="text-4xl font-bold text-gray-800">Berita Terbaru</h2>
            </div>
            <div class="w-24 h-1 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Featured News -->
            <div class="lg:col-span-2">
                @if($beritas->count())
                    @php
                        $featured = $beritas->first();
                        $featuredImage = json_decode($featured->gambar_berita)[0] ?? null;
                    @endphp
                    <a href="{{ route('berita.show', $featured->slug) }}" class="group block">
                        <div class="relative h-[500px] rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            @if($featuredImage)
                                <img src="{{ asset('storage/' . $featuredImage) }}" alt="Gambar"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 w-full p-8">
                                <div class="flex items-center mb-3">
                                    <span class="px-3 py-1 bg-purple-600/90 backdrop-blur-sm text-white text-sm font-semibold rounded-full mr-3">
                                        {{ $featured->category->nama ?? 'Kategori' }}
                                    </span>
                                    <div class="flex items-center text-purple-200 text-sm">
                                        <i data-feather="calendar" class="w-4 h-4 mr-1"></i>
                                        {{ \Carbon\Carbon::parse($featured->created_at)->translatedFormat('F j, Y') }}
                                    </div>
                                </div>
                                <h3 class="text-3xl font-bold text-white mb-3 group-hover:text-purple-200 transition-colors duration-300">
                                    {{ $featured->judul }}
                                </h3>
                                <p class="text-gray-200 text-lg">{{ $featured->exerpt }}</p>
                            </div>
                        </div>
                    </a>
                @endif

                <a href="{{ url('/berita') }}"
                   class="group mt-6 inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i data-feather="external-link" class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform duration-300"></i>
                    Lihat Berita Lainnya
                </a>
            </div>

            <!-- News List -->
            <div class="flex flex-col">
                <!-- Sort Buttons -->
                <div class="flex gap-2 mb-6">
                    <button onclick="sortBerita('desc')"
                            class="group px-4 py-2 rounded-lg font-medium transition-all duration-300 {{ (isset($sort) && $sort === 'desc') ? 'bg-gradient-to-r from-purple-600 to-indigo-600 text-white shadow-lg' : 'bg-white hover:bg-purple-50 text-gray-700 border border-purple-200' }}">
                        <i data-feather="arrow-down" class="w-4 h-4 inline mr-1 group-hover:translate-y-0.5 transition-transform duration-300"></i>
                        Terbaru
                    </button>
                    <button onclick="sortBerita('asc')"
                            class="group px-4 py-2 rounded-lg font-medium transition-all duration-300 {{ (isset($sort) && $sort === 'asc') ? 'bg-gradient-to-r from-purple-600 to-indigo-600 text-white shadow-lg' : 'bg-white hover:bg-purple-50 text-gray-700 border border-purple-200' }}">
                        <i data-feather="arrow-up" class="w-4 h-4 inline mr-1 group-hover:-translate-y-0.5 transition-transform duration-300"></i>
                        Terlama
                    </button>
                </div>

                <form id="sortForm" class="hidden">
                    <input type="hidden" name="sort" id="sortInput">
                </form>

                <!-- News Items -->
                <div class="space-y-4">
                    @foreach($beritas->skip(1)->take(5) as $berita)
                        @php
                            $img = json_decode($berita->gambar_berita)[0] ?? null;
                        @endphp
                        <a href="{{ route('berita.show', $berita->slug) }}" class="group block">
                            <div class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-purple-100 hover:border-purple-300">
                                @if($img)
                                    <div class="relative overflow-hidden rounded-lg flex-shrink-0">
                                        <img src="{{ asset('storage/' . $img) }}" alt="Thumb"
                                             class="w-20 h-20 object-cover group-hover:scale-110 transition-transform duration-300">
                                    </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center mb-2">
                                        <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs font-semibold rounded-full mr-2">
                                            {{ $berita->category->nama ?? 'Kategori' }}
                                        </span>
                                        <div class="flex items-center text-gray-500 text-xs">
                                            <i data-feather="clock" class="w-3 h-3 mr-1"></i>
                                            {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('F j, Y') }}
                                        </div>
                                    </div>
                                    <h4 class="font-semibold text-gray-800 group-hover:text-purple-700 transition-colors duration-300 mb-2 line-clamp-2">
                                        {{ $berita->judul }}
                                    </h4>
                                    <p class="text-sm text-gray-600 line-clamp-2">
                                        {{ Str::limit($berita->exerpt, 80) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        feather.replace();

        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    });
</script>

<script>
    function sortBerita(order) {
        document.getElementById('sortInput').value = order;
        const form = document.getElementById('sortForm');
        const urlParams = new URLSearchParams(new FormData(form)).toString();
        const url = new URL(window.location.href);
        url.search = urlParams;

        const scrollPosition = window.scrollY;

        fetch(url)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                document.body.innerHTML = doc.body.innerHTML;

                window.scrollTo(0, scrollPosition);
                feather.replace();
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>

<style>
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out;
    }

    .delay-300 {
        animation-delay: 0.3s;
        animation-fill-mode: both;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #8b5cf6, #6366f1);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #7c3aed, #4f46e5);
    }
</style>
@endsection
