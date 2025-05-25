@extends('layouts.master')
@section('title', 'Detail Berita')

@section('content')
<div class="container mx-auto px-4 py-6 bg-white">
    <h1 class="text-3xl font-bold text-center mb-8 pt-20">Berita & Artikel</h1>

    @php
        $gambarArray = is_array($berita->gambar_berita) ? $berita->gambar_berita : json_decode($berita->gambar_berita, true);
    @endphp
    @if($gambarArray && count($gambarArray) > 0)
        <div class="w-full h-[400px] mb-4 berita-gambar relative">
            @foreach($gambarArray as $index => $gambar)
                <img src="{{ asset('storage/' . $gambar) }}" alt="{{ $berita->judul }}" class="rounded-xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[700px] h-[400px] object-cover {{ $index > 0 ? 'hidden' : '' }}">
            @endforeach
        </div>
        <script>
            let currentImage = 0;
            let totalImages = document.querySelectorAll('.berita-gambar img').length;
            setInterval(function() {
                const current = document.querySelectorAll('.berita-gambar img')[currentImage];
                const next = document.querySelectorAll('.berita-gambar img')[(currentImage + 1) % totalImages];
                current.classList.add('opacity-0');
                next.classList.remove('hidden', 'opacity-0');
                current.addEventListener('transitionend', function() {
                    current.classList.add('hidden');
                    current.classList.remove('opacity-0');
                });
                currentImage = (currentImage + 1) % totalImages;
            }, 3000);
        </script>
    @endif

    <div class="text-sm font-bold text-gray-600 mb-2">
        {{ $berita->category->nama }} | {{ \Carbon\Carbon::parse($berita->created_at)->format('F d, Y') }}
    </div>

    <h2 class="text-xl font-bold text-black leading-snug mb-4">
        {{ $berita->judul }}
    </h2>
    <hr class="my-4 border-black w-full">
    {{-- <div class="text-gray-800 leading-relaxed">{!! nl2br(e($berita->isi)) !!}</div> --}}
    <div class="text-gray-800 leading-relaxed">{!! $berita->isi !!}</div>
</div>

<div class="flex justify-end mb-4">
    <h2 class="text-xl font-semibold">Berita Lainnya</h2>
</div>
<hr class="border-black w-full">

<div class="berita-lainnya grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pt-8">
    @foreach ($beritas->where('id', '!=', $berita->id) as $berita)
        <div class="bg-gray-200 rounded-2xl overflow-hidden transition hover:shadow-lg">
            <a href="{{ route('berita.show', $berita->id) }}">
                <img src="{{ asset('storage/' . (json_decode($berita->gambar_berita)[0] ?? 'images/logo_skensa.png')) }}"
                     alt="{{ $berita->judul }}"
                     class="w-full h-48 object-cover">
            </a>
            <div class="p-4">
                <!-- Kategori & Tanggal -->
                <p class="text-sm text-gray-600 mb-1">
                    {{ $berita->category->name ?? 'Berita' }} | {{ $berita->created_at->translatedFormat('d M, Y') }}
                </p>

                <!-- Judul -->
                <a href="{{ route('berita.show', $berita->id) }}">
                    <h3 class="text-md font-bold text-black hover:text-blue-600 transition leading-snug">
                        {{ $berita->judul }}
                    </h3>
                </a>
            </div>
        </div>
    @endforeach
</div>

<div class="w-full flex justify-center mt-4">
    <a href="{{ url('/berita') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition focus:outline-none w-full my-4 mx-4">
        Kembali
    </a>
</div>


@endsection
