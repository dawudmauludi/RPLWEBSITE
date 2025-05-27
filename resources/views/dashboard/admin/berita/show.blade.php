@extends('layouts.master')
@section('title', 'Detail Berita')

@section('content')
<!-- Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50" style="font-family: 'Inter', sans-serif;">
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-40 h-40 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-60 h-60 bg-white rounded-full translate-x-1/3 translate-y-1/3"></div>
        </div>
        
        <div class="relative container mx-auto px-6 py-20 text-center text-white">
            <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full px-4 py-2 mb-6">
                <i data-feather="newspaper" class="w-4 h-4"></i>
                <span class="text-sm font-medium">News & Articles</span>
            </div>
            <h1 class="text-5xl font-black mb-4 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent leading-tight">
                Berita & Artikel
            </h1>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto">
                Stay updated with the latest news and insightful articles
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-12 max-w-4xl">
        <!-- Image Carousel -->
        @php
            $gambarArray = is_array($berita->gambar_berita) ? $berita->gambar_berita : json_decode($berita->gambar_berita, true);
        @endphp
        
        @if($gambarArray && count($gambarArray) > 0)
            <div class="relative mb-12 group">
                <div class="w-full h-[500px] rounded-2xl overflow-hidden shadow-2xl border border-gray-200/50">
                    <div class="berita-gambar relative w-full h-full">
                        @foreach($gambarArray as $index => $gambar)
                            <img src="{{ asset('storage/' . $gambar) }}" 
                                 alt="{{ $berita->judul }}" 
                                 class="absolute inset-0 w-full h-full object-cover transition-all duration-1000 ease-in-out {{ $index > 0 ? 'hidden opacity-0' : 'opacity-100' }}">
                        @endforeach
                        
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
                        
                        <!-- Image Counter -->
                        @if(count($gambarArray) > 1)
                            <div class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm text-white px-3 py-1.5 rounded-full text-sm font-medium">
                                <span id="imageCounter">1</span> / {{ count($gambarArray) }}
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Navigation Dots -->
                @if(count($gambarArray) > 1)
                    <div class="flex justify-center mt-6 gap-2">
                        @foreach($gambarArray as $index => $gambar)
                            <button onclick="goToImage({{ $index }})"
                                    class="w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-blue-500 w-8' : 'bg-gray-300 hover:bg-gray-400' }}" 
                                    data-dot="{{ $index }}"></button>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif

        <!-- Article Content -->
        <article class="bg-white rounded-2xl shadow-xl border border-gray-100/50 overflow-hidden">
            <!-- Article Header -->
            <div class="bg-gradient-to-r from-gray-50 to-blue-50/30 p-8 border-b border-gray-100">
                <!-- Meta Information -->
                <div class="flex items-center gap-6 text-sm text-gray-600 mb-6">
                    <div class="flex items-center gap-2">
                        <div class="p-1.5 bg-blue-100 rounded-lg">
                            <i data-feather="tag" class="w-4 h-4 text-blue-600"></i>
                        </div>
                        <span class="font-semibold text-blue-700">{{ $berita->category->nama }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="p-1.5 bg-green-100 rounded-lg">
                            <i data-feather="calendar" class="w-4 h-4 text-green-600"></i>
                        </div>
                        <span class="font-medium">{{ \Carbon\Carbon::parse($berita->created_at)->format('F d, Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="p-1.5 bg-purple-100 rounded-lg">
                            <i data-feather="clock" class="w-4 h-4 text-purple-600"></i>
                        </div>
                        <span class="font-medium">5 min read</span>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-4xl font-black text-gray-900 leading-tight mb-4">
                    {{ $berita->judul }}
                </h1>

                <!-- Author & Share -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                            <i data-feather="user" class="w-5 h-5 text-white"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Admin</p>
                            <p class="text-sm text-gray-600">Editor</p>
                        </div>
                    </div>
                    
                    <!-- Share Buttons -->
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-600 mr-3">Share:</span>
                        <button class="p-2 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-lg transition-colors">
                            <i data-feather="facebook" class="w-4 h-4"></i>
                        </button>
                        <button class="p-2 bg-sky-100 hover:bg-sky-200 text-sky-600 rounded-lg transition-colors">
                            <i data-feather="twitter" class="w-4 h-4"></i>
                        </button>
                        <button class="p-2 bg-green-100 hover:bg-green-200 text-green-600 rounded-lg transition-colors">
                            <i data-feather="share" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Article Body -->
            <div class="p-8">
                <div class="prose prose-lg prose-gray max-w-none">
                    <div class="text-gray-800 leading-relaxed text-lg space-y-6">
                        {!! $berita->isi !!}
                    </div>
                </div>
            </div>
        </article>

        <!-- Related Articles Section -->
        <section class="mt-20">
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-indigo-100 rounded-lg">
                        <i data-feather="grid" class="w-5 h-5 text-indigo-600"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900">Related Articles</h2>
                </div>
                <div class="hidden sm:flex items-center gap-2 text-gray-600">
                    <i data-feather="trending-up" class="w-4 h-4"></i>
                    <span class="text-sm font-medium">Trending Now</span>
                </div>
            </div>

            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach ($beritas->where('id', '!=', $berita->id)->take(6) as $relatedBerita)
                    <article class="group bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-100/50 hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">
                        <!-- Image -->
                        <div class="relative overflow-hidden">
                            <a href="{{ route('berita.show', $relatedBerita->id) }}">
                                <img src="{{ asset('storage/' . (json_decode($relatedBerita->gambar_berita)[0] ?? 'images/logo_skensa.png')) }}"
                                     alt="{{ $relatedBerita->judul }}"
                                     class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700">
                            </a>
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center gap-1.5 bg-white/90 backdrop-blur-sm text-blue-700 px-3 py-1.5 rounded-full text-xs font-bold border border-blue-200">
                                    <i data-feather="bookmark" class="w-3 h-3"></i>
                                    {{ $relatedBerita->category->nama ?? 'Berita' }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <!-- Date -->
                            <div class="flex items-center gap-2 text-gray-500 text-sm mb-3">
                                <i data-feather="calendar" class="w-3 h-3"></i>
                                <span>{{ $relatedBerita->created_at->translatedFormat('d M, Y') }}</span>
                            </div>

                            <!-- Title -->
                            <a href="{{ route('berita.show', $relatedBerita->id) }}">
                                <h3 class="text-lg font-bold text-gray-900 hover:text-blue-600 transition-colors leading-tight mb-3 line-clamp-2">
                                    {{ $relatedBerita->judul }}
                                </h3>
                            </a>

                            <!-- Read More -->
                            <a href="{{ route('berita.show', $relatedBerita->id) }}" 
                               class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-semibold text-sm group-hover:gap-3 transition-all">
                                Read More
                                <i data-feather="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Back Button -->
            <div class="flex justify-center">
                <a href="{{ url('/berita') }}" 
                   class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold px-8 py-4 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                    <i data-feather="arrow-left" class="w-5 h-5"></i>
                    Back to All News
                </a>
            </div>
        </section>
    </div>
</div>

<style>
    .prose img {
        @apply rounded-xl shadow-lg my-6;
    }
    
    .prose h2 {
        @apply text-2xl font-bold text-gray-900 mt-8 mb-4 flex items-center gap-3;
    }
    
    .prose h2:before {
        content: '';
        @apply w-1 h-6 bg-gradient-to-b from-blue-500 to-indigo-500 rounded-full;
    }
    
    .prose p {
        @apply mb-4;
    }
    
    .prose ul {
        @apply space-y-2;
    }
    
    .prose li {
        @apply flex items-start gap-2;
    }
    
    .prose li:before {
        content: '';
        @apply w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

<script>
    // Initialize Feather Icons
    feather.replace();

    // Image carousel functionality
    let currentImage = 0;
    const images = document.querySelectorAll('.berita-gambar img');
    const dots = document.querySelectorAll('[data-dot]');
    const counter = document.getElementById('imageCounter');
    const totalImages = images.length;

    function showImage(index) {
        // Hide all images
        images.forEach((img, i) => {
            if (i === index) {
                img.classList.remove('hidden', 'opacity-0');
                img.classList.add('opacity-100');
            } else {
                img.classList.add('opacity-0');
                img.classList.remove('opacity-100');
                setTimeout(() => {
                    img.classList.add('hidden');
                }, 1000);
            }
        });

        // Update dots
        dots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.remove('bg-gray-300', 'w-3');
                dot.classList.add('bg-blue-500', 'w-8');
            } else {
                dot.classList.remove('bg-blue-500', 'w-8');
                dot.classList.add('bg-gray-300', 'w-3');
            }
        });

        // Update counter
        if (counter) {
            counter.textContent = index + 1;
        }

        currentImage = index;
    }

    function goToImage(index) {
        showImage(index);
    }

    // Auto-advance carousel
    if (totalImages > 1) {
        setInterval(() => {
            const nextIndex = (currentImage + 1) % totalImages;
            showImage(nextIndex);
        }, 5000);
    }

    // Smooth scroll behavior for anchor links
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

    // Add loading animation for images
    document.querySelectorAll('img').forEach(img => {
        img.addEventListener('load', function() {
            this.classList.add('loaded');
        });
    });
</script>
@endsection