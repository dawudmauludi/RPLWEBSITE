@extends('layouts.master')
@section('title', 'RPL')
@section('content')
<div class="relative w-full min-h-screen bg-blue-900 overflow-hidden">
    <img src="{{ asset('images/brawijaya.jpg') }}" alt="Background SMKN 1 Pasuruan"
         class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    <div class="relative z-10 flex flex-col items-start justify-center text-white px-8 py-16 min-h-screen max-w-5xl mx-auto">
        <div class="flex items-center mb-6">
            <img src="{{ asset('images/logo_skensa.png') }}" alt="Logo SMKN 1 Pasuruan" class="h-[150px] mr-6"> {{-- LOGO DIPERBESAR --}}
            <div class="text-left">
                <h2 class="text-lg font-semibold tracking-widest">JURUSAN</h2>
                <h1 class="text-4xl md:text-5xl font-semibold leading-tight">REKAYASA PERANGKAT LUNAK</h1>
                <p class="text-lg mt-1">SMK Negeri 1 PASURUAN</p>
            </div>
        </div>

        <a href="/detail-jurusan"
           class="mt-6 hover:bg-purple-800 text-white py-3 px-10 rounded-md transition duration-300 shadow-lg"
           style="background-color: #400082;">
            Jelajahi
        </a>
    </div>
</div>



<div class="container mx-auto px-4 py-16 space-y-12">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-10 text-center">
        <div class="flex flex-col items-center">
      <div class="w-16 h-16 mb-4 text-indigo-700">
        <i data-feather="eye" class="w-full h-full"></i>
      </div>
      <h2 class="text-2xl font-bold text-indigo-700 mb-4">VISI</h2>
      <p class="text-gray-700">
        Menjadi jurusan yang unggul dalam bidang pengembangan perangkat lunak, berdaya saing global, dan berlandaskan etika profesional.
      </p>
    </div>

    <div class="flex flex-col items-center">
      <div class="w-16 h-16 mb-4 text-indigo-700">
        <i data-feather="target" class="w-full h-full"></i>
      </div>
      <h2 class="text-2xl font-bold text-indigo-700 mb-4">MISI</h2>
      <ul class="text-gray-700 space-y-2">
        <li>Membekali siswa dengan keterampilan pemrograman dan TI.</li>
        <li>Menumbuhkan sikap profesional dan inovatif.</li>
        <li>Menjalin kerja sama dengan dunia industri.</li>
        <li>Mendorong siswa menciptakan karya berbasis teknologi.</li>
      </ul>
    </div>
  </div>

  <div class="flex justify-center text-center">
    <div class="flex flex-col items-center max-w-xl">
      <div class="w-16 h-16 mb-4 text-indigo-700">
        <i data-feather="award" class="w-full h-full"></i>
      </div>
      <h2 class="text-2xl font-bold text-indigo-700 mb-4">TUJUAN</h2>
      <p class="text-gray-700">
        "Menyiapkan peserta didik agar mampu bekerja mandiri dan/atau mengisi lowongan pekerjaan yang ada di dunia usaha sebagai tenaga kerja tingkat menengah dalam bidang rekayasa perangkat lunak."
      </p>
    </div>
  </div>
</div>

<div class="text-white py-16" style="background-color: #090D33;">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8 ml-5">
                <h2 class="text-3xl font-bold mb-2">Jurusan</h2>
                <h3 class="text-xl mb-6">Rekayasa Perangkat Lunak</h3>

                <p class="mb-6">
                    Rekayasa Perangkat Lunak atau RPL adalah salah satu jurusan dalam bidang teknologi Informasi dan Komunikasi (TIK) yang berfokus pada pengembangan software. Jurusan ini mempelajari seluruh proses dalam pembuatan aplikasi, mulai dari perencanaan, analisis kebutuhan, perancangan sistem, penulisan kode (pemrograman), pengujian, hingga pemeliharaan software.
                </p>

                <a href="/detail-jurusan" class="inline-block text-white py-2 px-8 rounded-md transition duration-300 hover:bg-purple-800" style="background-color: #400082;">
                    Selengkapnya
                </a>
            </div>
            <div class="md:w-1/2">
                <div class="relative">
                    <img src="{{ asset('images/coding1.jpg') }}" alt="Programming Illustration" class="rounded-lg shadow-lg w-[400px] mx-auto">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto py-16 px-4">
    <div class="flex flex-col md:flex-row">
        <div class="md:w-1/2 mb-8 md:mb-0">
            <img src="{{ asset('images/coding2.jpg') }}" alt="Coding" class="rounded-lg shadow-lg w-[300px] mx-auto">
        </div>

        <div class="md:w-1/2 md:pl-10">
            <h2 class="text-3xl font-bold mb-6">Mata Pelajaran Produktif</h2>
            <h3 class="text-xl mb-4">Rekayasa Perangkat Lunak</h3>

            <ul class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <li class="flex items-center">
                    <i data-feather="check-circle" class="mr-2 text-indigo-600 w-5 h-5"></i>
                    <span>Dasar-Dasar Pemrograman</span>
                </li>
                <li class="flex items-center">
                    <i data-feather="check-circle" class="mr-2 text-indigo-600 w-5 h-5"></i>
                    <span>Pemrograman Berorientasi Objek (PBO)</span>
                </li>
                <li class="flex items-center">
                    <i data-feather="check-circle" class="mr-2 text-indigo-600 w-5 h-5"></i>
                    <span>Pemrograman Web dan Perangkat Bergerak (PWB)</span>
                </li>
                <li class="flex items-center">
                    <i data-feather="check-circle" class="mr-2 text-indigo-600 w-5 h-5"></i>
                    <span>Basis Data</span>
                </li>
                <li class="flex items-center">
                    <i data-feather="check-circle" class="mr-2 text-indigo-600 w-5 h-5"></i>
                    <span>Desain UI/UX</span>
                </li>
                <li class="flex items-center">
                    <i data-feather="check-circle" class="mr-2 text-indigo-600 w-5 h-5"></i>
                    <span>Pemrograman Web Dinamis</span>
                </li>
                <li class="flex items-center">
                    <i data-feather="check-circle" class="mr-2 text-indigo-600 w-5 h-5"></i>
                    <span>Analisis dan Perancangan Sistem</span>
                </li>
                <li class="flex items-center">
                    <i data-feather="check-circle" class="mr-2 text-indigo-600 w-5 h-5"></i>
                    <span>Rekayasa Perangkat Lunak</span>
                </li>
                <li class="flex items-center">
                    <i data-feather="check-circle" class="mr-2 text-indigo-600 w-5 h-5"></i>
                    <span>Software Testing & Debugging</span>
                </li>
                <li class="flex items-center">
                    <i data-feather="check-circle" class="mr-2 text-indigo-600 w-5 h-5"></i>
                    <span>Manajemen Proyek Perangkat Lunak</span>
                </li>
                <li class="flex items-center">
                    <i data-feather="check-circle" class="mr-2 text-indigo-600 w-5 h-5"></i>
                    <span>Produk Kreatif dan Kewirausahaan (PKK)</span>
                </li>
                <li class="flex items-center">
                    <i data-feather="check-circle" class="mr-2 text-indigo-600 w-5 h-5"></i>
                    <span>Pemrograman Desktop</span>
                </li>
                <li class="flex items-center">
                    <i data-feather="check-circle" class="mr-2 text-indigo-600 w-5 h-5"></i>
                    <span>Keamanan Aplikasi</span>
                </li>
            </ul>

            <a href="/detail-jurusan" class="mt-8 inline-block text-white py-2 px-8 rounded-md transition duration-300 hover:bg-purple-800" style="background-color: #400082;">
                Selengkapnya
            </a>
        </div>
    </div>
</div>

<div class="container mx-auto px-8 md:px-16 py-8" id="berita">
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div></div>
            <h1 class="text-3xl font-bold uppercase text-right">BERITA TERBARU</h1>
        </div>
        <hr class="border-t-2 border-black mt-2 w-full">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="md:col-span-2 flex flex-col justify-stretch">
            @if($beritas->count())
                @php
                    $featured = $beritas->first();
                    $featuredImage = json_decode($featured->gambar_berita)[0] ?? null;
                @endphp
                <a href="{{ route('berita.show', $featured->id) }}" class="block">
                    <div class="relative h-[400px] md:h-[460px]">
                        @if($featuredImage)
                            <img src="{{ asset('storage/' . $featuredImage) }}" alt="Gambar" class="w-full h-full object-cover rounded-lg shadow">
                        @endif
                        <div class="absolute bottom-0 left-0 w-full bg-black bg-opacity-60 text-white p-8 rounded-b-lg">
                            <p class="text-sm mb-1">
                                <span class="font-semibold">{{ $featured->category->nama ?? 'Kategori' }}</span> |
                                {{ \Carbon\Carbon::parse($featured->created_at)->translatedFormat('F j, Y') }}
                            </p>
                            <h2 class="text-2xl font-bold">{{ $featured->judul }}</h2>
                            <p class="text-base mt-2">{{ $featured->exerpt }}</p>
                        </div>
                    </div>
                </a>
            @endif
        </div>

        <div class="flex flex-col">
            <div class="flex gap-2 mb-4">
                <a href="#" onclick="event.preventDefault(); sortBerita('desc')" class="px-4 py-2 rounded font-medium {{ (isset($sort) && $sort === 'desc') ? 'bg-purple-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                    Terbaru
                </a>
                <a href="#" onclick="event.preventDefault(); sortBerita('asc')" class="px-4 py-2 rounded font-medium {{ (isset($sort) && $sort === 'asc') ? 'bg-purple-600 text-white' : 'bg-gray-200 text-gray-700' }}">
                    Terlama
                </a>
            </div>

            <form id="sortForm" class="hidden">
                <input type="hidden" name="sort" id="sortInput">
            </form>

            <div class="space-y-4">
                @foreach($beritas->skip(1)->take(5) as $berita)
                    @php
                        $img = json_decode($berita->gambar_berita)[0] ?? null;
                    @endphp
                    <a href="{{ route('berita.show', $berita->id) }}" class="block">
                        <div class="flex items-start gap-4 border-b pb-3 min-h-[90px]">
                            @if($img)
                                <img src="{{ asset('storage/' . $img) }}" alt="Thumb" class="w-24 h-24 object-cover rounded">
                            @endif
                            <div class="flex-1">
                                <p class="text-xs text-gray-500 mb-1">
                                    <span class="font-semibold">{{ $berita->category->nama ?? 'Kategori' }}</span> |
                                    {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('F j, Y') }}
                                </p>
                                <h3 class="text-base font-semibold leading-tight">{{ $berita->judul }}</h3>
                                <p class="text-xs text-gray-600">{{ Str::limit($berita->exerpt, 50) }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        feather.replace();
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
            });
    }
</script>
@endsection
