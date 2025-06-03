@extends('layouts.master')
@section('title', 'Detail Lesson')
@section('content')
     <section class="bg-gradient-to-br from-purple-50  to-indigo-100 py-16 pt-24">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-flex items-center bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm mb-6">
                    <i data-aos="fade-right" data-aos-duration="1600" data-feather="code" class="w-5 h-5 text-purple-600 mr-2"></i>
                    <span data-aos="fade-right" data-aos-duration="1600" class="text-purple-700 font-medium">{{$lesson->slug}}</span>
                </div>
                    <h1 data-aos="fade-up" data-aos-duration="1600" class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    {{ $lesson->name ?? 'Tidak ditemukan lesson' }}
                </h1>
                <div data-aos="zoom-in" data-aos-duration="1600" class="relative mx-auto max-w-2xl">
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-indigo-400 rounded-2xl blur-2xl opacity-20"></div>
                    <img
                        src="{{ asset('storage/' . $lesson->image) }}"
                        alt="{{ $lesson->name }}"
                        class="relative rounded-2xl shadow-2xl w-full h-64 object-cover"
                    >
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="flex items-center mb-8">
                    <div class="bg-purple-100 p-3 rounded-full mr-4">
                        <i data-aos="fade-right" data-aos-duration="1600" data-feather="info" class="w-6 h-6 text-purple-600"></i>
                    </div>
                    <h2 data-aos="fade-right" data-aos-duration="1600" class="text-3xl font-bold text-gray-900">Tentang Mapel {{ $lesson->name }}</h2>
                </div>

                <div class="prose prose-lg max-w-none">
                    <div data-aos="fade-up" data-aos-duration="1600" class="bg-gradient-to-r from-purple-50 to-indigo-50 p-8 rounded-2xl border border-purple-100 mb-8">
                            <p class="text-gray-700 leading-relaxed mb-2">
                                {!! $lesson->description ?? '' !!}
                            </p>
                        </div>
                    </div>
            </div>
        </div>
        <div data-aos="fade-up" data-aos-duration="1600" class="flex justify-center py-8">
            <a href="javascript:history.back()"
               class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-medium shadow-lg transition-all duration-200">
                <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
                Kembali
            </a>
        </div>
    </section>


@endsection
