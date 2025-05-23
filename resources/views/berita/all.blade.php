@extends('layouts.master')
@section('title', 'Berita')
@section('content')
    <div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Berita & Artikel</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($beritas as $berita)
            <div class="bg-white shadow-md rounded-2xl overflow-hidden transition hover:shadow-xl">
                <a href="{{ route('berita.show', $berita->id) }}">
                    <img src="{{ asset('storage/' . (json_decode($berita->gambar_berita)[0] ?? 'images/logo_skensa.png')) }}"
                         alt="{{ $berita->title }}"
                         class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <a href="{{ route('berita.show', $berita->id) }}">
                        <h2 class="text-xl font-bold text-gray-800 hover:text-blue-600 transition">{{ $berita->judul }}</h2>
                    </a>
                    <p class="text-sm text-gray-500 italic">{{ $berita->slug }}</p>

                    <div class="mt-2 text-gray-600 text-sm">
                        {{ Str::limit(strip_tags($berita->exerpt), 120) }}
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <a href=""
                           class="text-sm text-blue-500 hover:underline">
                            {{ $berita->category->name }}
                        </a>
                        <span class="text-sm text-gray-400">
                            {{ $berita->created_at->translatedFormat('d M Y') }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $beritas->links() }}
    </div>
</div>

@endsection
