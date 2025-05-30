@extends('layouts.master')
@section('title', 'RPL')
@section('content')

<!-- Hero Section -->
<div class="relative w-full min-h-screen bg-black overflow-hidden">
    <img src="{{ asset('images/brawijaya.jpg') }}" alt="Background SMKN 1 Pasuruan"
         class="absolute inset-0 w-full h-full object-cover opacity-30">
    {{-- <div class="absolute inset-0 bg-gradient-to-r from-purple-900/80 via-purple-800/70 to-indigo-900/60"></div> --}}

    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-4 -left-4 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 -right-8 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-violet-500/10 rounded-full blur-3xl animate-pulse delay-500"></div>
    </div>

    <div class="relative z-10 flex flex-col items-start justify-center text-white px-8 py-16 min-h-screen max-w-6xl mx-auto">
        <div class="flex items-center mb-8 animate-fade-in-up">
            <div class="relative">
                <img src="{{ asset('images/logo_skensa.png') }}" alt="Logo SMKN 1 Pasuruan"
                     class="h-[160px] mr-8 drop-shadow-2xl transform hover:scale-105 transition-transform duration-300">
                <div class="absolute -inset-2 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-full opacity-20 blur-xl"></div>
            </div>
            <div class="text-left">
                <div class="flex items-center mb-2">
                    <i data-feather="code" class="w-6 h-6 mr-3 text-purple-300"></i>
                    <h2 class="text-xl font-bold tracking-widest text-purple-200 uppercase">Jurusan</h2>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold leading-tight bg-gradient-to-r from-white via-purple-100 to-indigo-200 bg-clip-text text-transparent mb-2">
                    Rekayasa Perangkat Lunak
                </h1>
                <div class="flex items-center">
                    <i data-feather="map-pin" class="w-5 h-5 mr-2 text-purple-300"></i>
                    <p class="text-xl text-purple-100">SMK Negeri 1 Pasuruan</p>
                </div>
            </div>
        </div>

        <div class="flex gap-4 animate-fade-in-up delay-300">
            <a href="/detail-jurusan"
               class="group relative px-8 py-4 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl">
                <div class="flex items-center">
                    <i data-feather="globe" class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform duration-300"></i>
                    Jelajahi Jurusan
                </div>
                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 rounded-lg transition-opacity duration-300"></div>
            </a>

            <a href="#visi-misi"
               class="group px-8 py-4 border-2 border-purple-400 hover:bg-purple-600 text-purple-100 hover:text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105">
                <div class="flex items-center">
                    <i data-feather="arrow-down" class="w-5 h-5 mr-2 group-hover:translate-y-1 transition-transform duration-300"></i>
                    Pelajari Lebih Lanjut
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
                <i data-feather="target" class="w-8 h-8 text-purple-600 mr-3"></i>
                <h2 class="text-4xl font-bold text-gray-800">Visi, Misi & Tujuan</h2>
            </div>
            <div class="w-24 h-1 bg-gradient-to-r from-purple-600 to-indigo-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Vision -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-purple-500">
                <div class="flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i data-feather="eye" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-purple-700 mb-4 uppercase tracking-wide">Visi</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Menjadi jurusan yang unggul dalam bidang pengembangan perangkat lunak, berdaya saing global, dan berlandaskan etika profesional.
                    </p>
                </div>
            </div>

            <!-- Mission -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-indigo-500">
                <div class="flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i data-feather="compass" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-indigo-700 mb-4 uppercase tracking-wide">Misi</h3>
                    <ul class="text-gray-700 space-y-3 text-left">
                        <li class="flex items-start">
                            <i data-feather="check-circle" class="w-5 h-5 text-purple-500 mr-3 mt-0.5 flex-shrink-0"></i>
                            <span>Membekali siswa dengan keterampilan pemrograman dan TI</span>
                        </li>
                        <li class="flex items-start">
                            <i data-feather="check-circle" class="w-5 h-5 text-purple-500 mr-3 mt-0.5 flex-shrink-0"></i>
                            <span>Menumbuhkan sikap profesional dan inovatif</span>
                        </li>
                        <li class="flex items-start">
                            <i data-feather="check-circle" class="w-5 h-5 text-purple-500 mr-3 mt-0.5 flex-shrink-0"></i>
                            <span>Menjalin kerja sama dengan dunia industri</span>
                        </li>
                        <li class="flex items-start">
                            <i data-feather="check-circle" class="w-5 h-5 text-purple-500 mr-3 mt-0.5 flex-shrink-0"></i>
                            <span>Mendorong siswa menciptakan karya berbasis teknologi</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Goals -->
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-violet-500">
                <div class="flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-violet-500 to-purple-600 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i data-feather="award" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-violet-700 mb-4 uppercase tracking-wide">Tujuan</h3>
                    <div class="relative">
                        <i data-feather="quote" class="w-8 h-8 text-purple-300 absolute -top-2 -left-2"></i>
                        <p class="text-gray-700 leading-relaxed italic pl-4">
                            Menyiapkan peserta didik agar mampu bekerja mandiri dan/atau mengisi lowongan pekerjaan yang ada di dunia usaha sebagai tenaga kerja tingkat menengah dalam bidang rekayasa perangkat lunak.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Section -->
<div class="bg-gradient-to-r from-purple-900 via-indigo-900 to-purple-800 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/2 space-y-6">
                <div class="flex items-center mb-4">
                    <i data-feather="cpu" class="w-8 h-8 text-purple-300 mr-3"></i>
                    <h2 class="text-4xl font-bold">Jurusan</h2>
                </div>
                <h3 class="text-2xl text-purple-200 mb-6">Rekayasa Perangkat Lunak</h3>

                <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 border border-white/20">
                    <p class="text-purple-100 leading-relaxed mb-6">
                        Rekayasa Perangkat Lunak atau RPL adalah salah satu jurusan dalam bidang teknologi Informasi dan Komunikasi (TIK) yang berfokus pada pengembangan software. Jurusan ini mempelajari seluruh proses dalam pembuatan aplikasi, mulai dari perencanaan, analisis kebutuhan, perancangan sistem, penulisan kode (pemrograman), pengujian, hingga pemeliharaan software.
                    </p>

                    <div class="flex flex-wrap gap-3 mb-6">
                        <span class="px-3 py-1 bg-purple-600/50 rounded-full text-sm flex items-center">
                            <i data-feather="code" class="w-4 h-4 mr-2"></i>Programming
                        </span>
                        <span class="px-3 py-1 bg-indigo-600/50 rounded-full text-sm flex items-center">
                            <i data-feather="database" class="w-4 h-4 mr-2"></i>Database
                        </span>
                        <span class="px-3 py-1 bg-violet-600/50 rounded-full text-sm flex items-center">
                            <i data-feather="smartphone" class="w-4 h-4 mr-2"></i>Mobile Dev
                        </span>
                        <span class="px-3 py-1 bg-purple-600/50 rounded-full text-sm flex items-center">
                            <i data-feather="globe" class="w-4 h-4 mr-2"></i>Web Dev
                        </span>
                    </div>

                    <a href="/detail-jurusan"
                       class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i data-feather="arrow-right" class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                        Selengkapnya
                    </a>
                </div>
            </div>

            <div class="lg:w-1/2">
                <div class="relative group">
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
                <div class="relative group">
                    <div class="absolute -inset-4 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl opacity-20 blur-xl group-hover:opacity-40 transition-opacity duration-300"></div>
                    <img src="{{ asset('images/coding2.jpg') }}" alt="Coding"
                         class="relative rounded-2xl shadow-xl w-full max-w-sm mx-auto transform group-hover:scale-105 transition-transform duration-300">
                </div>
            </div>

            <div class="lg:w-1/2">
                <div class="flex items-center mb-6">
                    <i data-feather="book-open" class="w-8 h-8 text-purple-600 mr-3"></i>
                    <h2 class="text-4xl font-bold text-gray-800">Mata Pelajaran Produktif</h2>
                </div>
                <h3 class="text-2xl text-purple-600 mb-8">Rekayasa Perangkat Lunak</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    @php
                    $subjects = [
                        ['name' => 'Dasar-Dasar Pemrograman', 'icon' => 'code'],
                        ['name' => 'Pemrograman Berorientasi Objek (PBO)', 'icon' => 'layers'],
                        ['name' => 'Pemrograman Web dan Perangkat Bergerak (PWB)', 'icon' => 'smartphone'],
                        ['name' => 'Basis Data', 'icon' => 'database'],
                        ['name' => 'Desain UI/UX', 'icon' => 'layout'],
                        ['name' => 'Pemrograman Web Dinamis', 'icon' => 'globe'],
                        ['name' => 'Analisis dan Perancangan Sistem', 'icon' => 'settings'],
                        ['name' => 'Rekayasa Perangkat Lunak', 'icon' => 'cpu'],
                        ['name' => 'Software Testing & Debugging', 'icon' => 'terminal'],
                        ['name' => 'Manajemen Proyek Perangkat Lunak', 'icon' => 'briefcase'],
                        ['name' => 'Produk Kreatif dan Kewirausahaan (PKK)', 'icon' => 'coffee'],
                        ['name' => 'Pemrograman Desktop', 'icon' => 'monitor'],
                        ['name' => 'Keamanan Aplikasi', 'icon' => 'shield']
                    ];
                    @endphp

                    @foreach($subjects as $subject)
                    <div class="group flex items-center p-4 bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-purple-100 hover:border-purple-300">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                            <i data-feather="{{ $subject['icon'] }}" class="w-5 h-5 text-white"></i>
                        </div>
                        <span class="text-gray-700 group-hover:text-purple-700 font-medium transition-colors duration-300">{{ $subject['name'] }}</span>
                    </div>
                    @endforeach
                </div>

                <a href="/detail-jurusan"
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
                <h2 class="text-4xl font-bold">Karya Siswa</h2>
            </div>
            <div class="w-24 h-1 bg-gradient-to-r from-purple-400 to-indigo-400 mx-auto rounded-full"></div>
            <p class="text-purple-200 mt-4 max-w-2xl mx-auto">Showcase proyek-proyek terbaik dari siswa Rekayasa Perangkat Lunak</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach ($karyas as $karya)
                <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-purple-200">
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
                <h2 class="text-4xl font-bold text-gray-800">Berita Terbaru</h2>
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
