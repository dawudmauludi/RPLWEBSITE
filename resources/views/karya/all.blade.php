@extends('layouts.master')
@section('title', 'Karya Siswa')
@section('content')
    <div class="container mx-auto px-4 pt-20">
        <h2 class="text-3xl font-bold text-center mb-10">KARYA SISWA</h2>
         <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <form action="{{ route('karya.all') }}" method="GET" class="grid lg:grid-cols-3 gap-4">

                    {{-- Search --}}
                    <div>
                        <label class="text-sm text-gray-700 mb-1 block">Cari Karya</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500"
                               placeholder="Masukkan judul...">
                    </div>

                    {{-- Filter Kelas --}}
                    <div>
                        <label class="text-sm text-gray-700 mb-1 block">Filter Kelas</label>
                        <select name="kelas"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500">
                            <option value="">Semua Kelas</option>
                            @foreach ($kelas as $kelasOption)
                                <option value="{{ $kelasOption->id }}"
                                    {{ request('kelas') == $kelasOption->id ? 'selected' : '' }}>
                                    {{ $kelasOption->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex gap-2 items-end">
                        <button type="submit"
                                class="w-full bg-purple-600 hover:bg-purple-700 text-white rounded-lg px-4 py-2 font-semibold">
                            Cari
                        </button>
                        @if(request()->has('search') || request()->has('kelas'))
                            <a href="{{ route('karya.all') }}"
                               class="w-full bg-gray-400 hover:bg-gray-500 text-white rounded-lg px-4 py-2 font-semibold text-center">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-4 mb-6">
            @foreach ($karyas as $karya)
                <div class="bg-white rounded-xl overflow-hidden shadow-md relative border border-purple-100">
                    <div class="absolute top-0 left-0 bg-purple-100 text-purple-700 text-xs font-semibold px-2 py-1 rounded-br-lg">
                        {{ $karya->user->kelas->nama ?? 'Kelas Tidak Diketahui' }}
                    </div>
                    <div class="absolute top-0 right-0 bg-purple-200 text-purple-800 text-xs font-semibold px-2 py-1 rounded-bl-lg">
                        {{ $karya->user->nama ?? 'Siswa' }}
                    </div>

                    <img src="{{ asset('storage/' . $karya->gambar_karya) }}" alt="{{ $karya->judul }}"
                        class="w-full h-40 object-cover">

                    <div class="p-4 text-gray-800">
                        <h3 class="font-semibold text-lg mb-2 text-black-800">{{ $karya->judul }}</h3>
                        <p class="text-sm text-gray-600 mb-4">
                            {{ Str::limit($karya->deskripsi, 50, '...') }}
                        </p>
                        <a href="{{ route('karya.show', $karya->id) }}"
                        class="block text-center bg-primary hover:bg-primary-dark text-white py-2 rounded-lg font-medium transition">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
