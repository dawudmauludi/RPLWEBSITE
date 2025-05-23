@extends('layouts.master')
@section('title', 'Detail Berita')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">{{ $berita->judul }}</h1>

    @php
        $gambarArray = is_array($berita->gambar_berita) ? $berita->gambar_berita : json_decode($berita->gambar_berita, true);
    @endphp

    @if($gambarArray && count($gambarArray) > 0)
        @foreach($gambarArray as $gambar)
            <img src="{{ asset('storage/' . $gambar) }}" alt="{{ $berita->judul }}" class="mb-4 max-w-full h-auto rounded">
        @endforeach
    @endif

    <div class="mb-2 text-gray-600">Slug: {{ $berita->slug }}</div>

    <div class="mb-2 font-semibold">Exerpt:</div>
    <p class="mb-4">{{ $berita->exerpt }}</p>

    <div class="mb-2 font-semibold">Isi:</div>
    <p>{!! nl2br(e($berita->isi)) !!}</p>
</div>
@endsection
