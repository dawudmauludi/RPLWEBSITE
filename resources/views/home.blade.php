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

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full mb-4">
            <i data-feather="users" class="text-white text-2xl"></i>
        </div>
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Alumni Reviews</h1>
        <p class="text-gray-600 text-lg">Bagikan pengalaman dan inspirasi untuk generasi mendatang</p>
    </div>

    @role('alumni')
    <div class="bg-gradient-to-br from-white to-blue-50 shadow-xl rounded-2xl p-8 mb-12 border border-blue-100 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400/10 to-purple-400/10 rounded-full -translate-y-16 translate-x-16"></div>
        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-purple-400/10 to-pink-400/10 rounded-full translate-y-12 -translate-x-12"></div>

        <div class="relative z-10">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl flex items-center justify-center mr-4">
                    <i data-feather="edit-3" class="text-white text-lg"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Tulis Ulasan Anda</h2>
                    <p class="text-gray-600">Ceritakan pengalaman berharga Anda kepada adik-adik junior</p>
                </div>
            </div>

            <form action="{{ url('alumni/ulasan') }}" method="POST" class="space-y-6">
                @csrf
                <div class="relative">
                    <textarea name="ulasan" rows="4" maxlength="250"
                        class="w-full p-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-none bg-white/80 backdrop-blur-sm"
                        placeholder="Bagikan pengalaman, tips, atau pesan inspiratif Anda untuk adik-adik kelas (Maksimal 250 karakter)"
                        required></textarea>
                    <p class="text-gray-600 text-sm mt-2">*Maksimal 250 karakter</p>
                    <div class="absolute bottom-3 right-3 text-gray-400">
                        <i data-feather="quote-right" class="w-6 h-6"></i>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="group bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg flex items-center space-x-2">
                        <i data-feather="send" class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300"></i>
                        <span class="font-semibold">Kirim Ulasan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endrole

    <div class="mb-8">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-4">
                <div class="w-10 h-10 bg-gradient-to-r from-amber-400 to-orange-500 rounded-lg flex items-center justify-center">
                    <i data-feather="message-square" class="w-6 h-6 text-white"></i>
                </div>
                <div>
                    <h3 class="text-3xl font-bold text-gray-900">Ulasan Alumni</h3>
                    <p class="text-gray-600">{{ $ulasans->count() }} ulasan dari para alumni</p>
                </div>
            </div>
        </div>
    </div>

    @if($ulasans->count())
    <div class="ulasan-carousel space-x-6 overflow-hidden pb-4">
        @foreach($ulasans as $index => $ulasan)
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl p-6 w-[350px] flex-shrink-0 border border-gray-100 transition-all duration-300 hover:transform hover:scale-105 relative group"
             data-ulasan-id="{{ $ulasan->id }}"
             style="animation: fadeInUp 0.6s ease-out {{ $index * 0.1 }}s both;">

            <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-blue-400/5 to-purple-400/5 rounded-full -translate-y-10 translate-x-10 group-hover:scale-150 transition-transform duration-500"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 bg-gradient-to-tr from-amber-400/5 to-orange-400/5 rounded-full translate-y-8 -translate-x-8 group-hover:scale-150 transition-transform duration-500"></div>

            <div class="absolute top-6 right-6 text-gray-200 group-hover:text-blue-200 transition-colors duration-300">
                <i data-feather="quote-right" class="w-6 h-6"></i>
            </div>

            <div class="relative z-10">
                <div class="flex items-center mb-4">
                    <div class="relative">
                        <div class="bg-gradient-to-r from-blue-500 to-purple-500 text-white font-bold rounded-full h-12 w-12 flex items-center justify-center text-lg shadow-lg">
                            {{ strtoupper(substr($ulasan->user->name, 0, 1)) }}
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-white"></div>
                    </div>
                    <div class="ml-4">
                        <p class="font-semibold text-gray-900 text-lg">{{ $ulasan->user->name }}</p>
                        <div class="flex items-center space-x-2 text-sm text-gray-500">
                            <i data-feather="clock" class="w-4 h-4 text-xs"></i>
                            <span>{{ $ulasan->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <p class="text-gray-700 leading-relaxed">{{ $ulasan->ulasan }}</p>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <button onclick="toggleLike({{ $ulasan->id }})"
                        class="group flex items-center space-x-2 px-4 py-2 rounded-lg hover:bg-red-50 transition-all duration-200"
                        data-ulasan-id="{{ $ulasan->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="like-icon h-5 w-5 fill-current text-gray-400 group-hover:text-red-500 transition-colors duration-200"
                            viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                                     2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09
                                     C13.09 3.81 14.76 3 16.5 3
                                     19.58 3 22 5.42 22 8.5
                                     c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                        <span class="like-count text-sm font-medium text-gray-700 group-hover:text-red-500 transition-colors duration-200">
                            {{ $ulasan->like->count() }}
                        </span>
                    </button>

                    <div class="flex items-center space-x-2">

                        @if(auth()->check() && (auth()->user()->id == $ulasan->user_id || auth()->user()->hasRole('admin')))
                        <form action="{{ url('alumni/ulasan/'.$ulasan->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all duration-200"
                                onclick="return Swal.fire({
                                    title: 'Hapus Ulasan',
                                    text: 'Anda yakin ingin menghapus ulasan ini?',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#ef4444',
                                    cancelButtonColor: '#6b7280',
                                    confirmButtonText: 'Ya, hapus!',
                                    cancelButtonText: 'Batal',
                                    customClass: {
                                        popup: 'rounded-xl',
                                        confirmButton: 'rounded-lg',
                                        cancelButton: 'rounded-lg'
                                    }
                                }).then((result) => {
                                    if (result.isConfirmed) this.form.submit();
                                })"
                                title="Hapus ulasan">
                                <i data-feather="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="flex justify-center mt-8 space-x-4">
        <button id="prevBtn" class="w-12 h-12 bg-white border-2 border-gray-200 rounded-full flex items-center justify-center hover:border-blue-500 hover:text-blue-500 transition-all duration-300 shadow-md hover:shadow-lg">
            <i data-feather="chevron-left"></i>
        </button>
        <button id="nextBtn" class="w-12 h-12 bg-white border-2 border-gray-200 rounded-full flex items-center justify-center hover:border-blue-500 hover:text-blue-500 transition-all duration-300 shadow-md hover:shadow-lg">
            <i data-feather="chevron-right"></i>
        </button>
    </div>

    @else
    <div class="text-center py-16">
        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <i data-feather="message-square" class="text-gray-400 w-8 h-8"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Ulasan</h3>
        <p class="text-gray-600 mb-8">Jadilah yang pertama untuk berbagi pengalaman Anda!</p>
        @role('alumni')
        <button class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
            <i data-feather="edit-2" class="mr-2"></i>
            Tulis Ulasan Pertama
        </button>
        @endrole
    </div>
    @endif
</div>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .line-clamp-4 {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .ulasan-carousel {
        display: flex;
        overflow-x: auto;
        scroll-behavior: smooth;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .ulasan-carousel::-webkit-scrollbar {
        display: none;
    }

    .ulasan-carousel > div {
        flex: 0 0 auto;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('.ulasan-carousel');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    if (carousel && prevBtn && nextBtn) {
        const cardWidth = 350 + 24;

        prevBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: -cardWidth, behavior: 'smooth' });
        });

        nextBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: cardWidth, behavior: 'smooth' });
        });

        const updateButtons = () => {
            const scrollLeft = carousel.scrollLeft;
            const maxScroll = carousel.scrollWidth - carousel.clientWidth;

            prevBtn.style.opacity = scrollLeft <= 0 ? '0.5' : '1';
            nextBtn.style.opacity = scrollLeft >= maxScroll ? '0.5' : '1';
        };

        carousel.addEventListener('scroll', updateButtons);
        updateButtons();
    }

    document.querySelectorAll('[data-ulasan-id]').forEach(card => {
        const id = card.getAttribute('data-ulasan-id');
        const icon = card.querySelector('.like-icon');

        if (localStorage.getItem(`liked_${id}`)) {
            icon.classList.remove('text-gray-400');
            icon.classList.add('text-red-500');
        }
    });

    if (typeof feather !== 'undefined') {
        feather.replace();
    }
});

function toggleLike(ulasanId) {
    fetch(`/alumni/ulasan/${ulasanId}/like`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(res => {
        if (!res.ok) {
            Swal.fire({
                icon: 'info',
                title: 'Login Diperlukan',
                text: 'Silakan login untuk menyukai ulasan.',
                confirmButtonText: 'OK',
                customClass: {
                    popup: 'rounded-xl',
                    confirmButton: 'rounded-lg'
                }
            });
            throw new Error('Not authenticated');
        }
        return res.json();
    })
    .then(data => {
        const card = document.querySelector(`[data-ulasan-id="${ulasanId}"]`);
        const icon = card.querySelector('.like-icon');
        const count = card.querySelector('.like-count');
        let current = parseInt(count.textContent);

        if (data.liked) {
            icon.classList.remove('text-gray-400');
            icon.classList.add('text-red-500');
            localStorage.setItem(`liked_${ulasanId}`, true);
            count.textContent = current + 1;

            icon.style.transform = 'scale(1.3)';
            setTimeout(() => {
                icon.style.transform = 'scale(1)';
            }, 200);
        } else {
            icon.classList.remove('text-red-500');
            icon.classList.add('text-gray-400');
            localStorage.removeItem(`liked_${ulasanId}`);
            count.textContent = current - 1;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>


</script>

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
