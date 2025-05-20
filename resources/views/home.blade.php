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
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        feather.replace();
    });
</script>
@endsection