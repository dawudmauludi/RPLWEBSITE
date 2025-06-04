@extends('layouts.master')
@section('title', 'Detail Programming Language')
@section('content')

<!-- Hero Section with Coding Theme -->
<section class="relative bg-white overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-10 left-10 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
        <div class="absolute top-0 right-4 w-96 h-96 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
    </div>

    <!-- Code Pattern Background -->
    <div class="absolute inset-0 opacity-5">
        <div class="grid grid-cols-12 h-full">
            <div class="col-span-12 flex items-center justify-center text-6xl font-mono text-purple-300">
                &lt;/&gt;
            </div>
        </div>
    </div>
    
    <div class="relative container mx-auto px-6 py-20 pt-32">
        <div class="max-w-6xl mx-auto">
            <!-- Breadcrumb -->
            <nav data-aos="fade-right" data-aos-duration="600" class="flex items-center space-x-2 text-sm mb-8">
                <a href="#" class="text-gray-500 hover:text-purple-600 transition-colors">Home</a>
                <i data-feather="chevron-right" class="w-4 h-4 text-gray-400"></i>
                <a href="#" class="text-gray-500 hover:text-purple-600 transition-colors">Programming Languages</a>
                <i data-feather="chevron-right" class="w-4 h-4 text-gray-400"></i>
                <span class="text-purple-600 font-medium">{{ $language->name }}</span>
            </nav>

            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Content Side -->
                <div class="space-y-8">
                    <!-- Language Badge -->
                    <div data-aos="fade-up" data-aos-duration="600" class="inline-flex items-center">
                        <div class="flex items-center bg-gradient-to-r from-purple-100 to-indigo-100 text-purple-700 px-5 py-3 rounded-2xl text-sm font-semibold border border-purple-200">
                            <i data-feather="code" class="w-4 h-4 mr-2"></i>
                            {{ $language->slug }}
                        </div>
                    </div>

                    <!-- Title -->
                    <div class="space-y-6">
                        <h1 data-aos="fade-up" data-aos-duration="800" class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                            {{ $language->name ?? 'Tidak ditemukan language' }}
                        </h1>
                        <p data-aos="fade-up" data-aos-duration="1000" class="text-xl text-gray-600 leading-relaxed">
                            Pelajari bahasa pemrograman yang powerful dan versatile untuk mengembangkan aplikasi modern
                        </p>
                    </div>

                    <!-- Language Stats -->
                    <div data-aos="fade-up" data-aos-duration="1200" class="grid grid-cols-2 gap-4">
                        <div class="bg-white p-6 rounded-2xl border border-purple-100 shadow-sm">
                            <div class="flex items-center mb-3">
                                <div class="flex items-center justify-center w-10 h-10 bg-purple-100 rounded-xl mr-3">
                                    <i data-feather="zap" class="w-5 h-5 text-purple-600"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Performance</div>
                                    <div class="font-semibold text-gray-900">High</div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-2xl border border-indigo-100 shadow-sm">
                            <div class="flex items-center mb-3">
                                <div class="flex items-center justify-center w-10 h-10 bg-indigo-100 rounded-xl mr-3">
                                    <i data-feather="users" class="w-5 h-5 text-indigo-600"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Community</div>
                                    <div class="font-semibold text-gray-900">Large</div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-2xl border border-green-100 shadow-sm">
                            <div class="flex items-center mb-3">
                                <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-xl mr-3">
                                    <i data-feather="trending-up" class="w-5 h-5 text-green-600"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Popularity</div>
                                    <div class="font-semibold text-gray-900">Rising</div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-2xl border border-orange-100 shadow-sm">
                            <div class="flex items-center mb-3">
                                <div class="flex items-center justify-center w-10 h-10 bg-orange-100 rounded-xl mr-3">
                                    <i data-feather="book" class="w-5 h-5 text-orange-600"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Learning</div>
                                    <div class="font-semibold text-gray-900">Easy</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Side with Code Theme -->
                <div data-aos="fade-left" data-aos-duration="1000" class="relative">
                    <div class="relative">
                        <!-- Code Window Frame -->
                        <div class="bg-gray-900 rounded-3xl p-8 shadow-2xl">
                            <!-- Window Controls -->
                            <div class="flex items-center mb-6">
                                <div class="flex space-x-2">
                                    <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                    <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                </div>
                                <div class="flex-1 text-center">
                                    <span class="text-gray-400 text-sm font-mono">{{ $language->name }}.code</span>
                                </div>
                            </div>
                            
                            <!-- Language Logo/Image -->
                            <div class="bg-gradient-to-br from-purple-100 to-indigo-100 p-8 rounded-2xl relative overflow-hidden">
                                <!-- Decorative Code Lines -->
                                <div class="absolute top-4 left-4 text-purple-300 opacity-20 font-mono text-xs">
                                    <div>&lt;html&gt;</div>
                                    <div class="ml-4">&lt;body&gt;</div>
                                    <div class="ml-8">&lt;code/&gt;</div>
                                </div>
                                
                                <img
                                    src="{{ asset('storage/' . $language->image) }}"
                                    alt="{{ $language->name }}"
                                    class="w-full h-64 object-contain relative z-10 filter drop-shadow-2xl"
                                >
                                
                                <!-- Floating Code Symbols -->
                                <div class="absolute bottom-4 right-4 text-indigo-300 opacity-20 font-mono text-xs">
                                    <div class="text-right">&lt;/body&gt;</div>
                                    <div class="text-right">&lt;/html&gt;</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Floating Elements -->
                        <div class="absolute -top-6 -right-6 bg-white/90 backdrop-blur-sm p-4 rounded-full shadow-xl">
                            <i data-feather="terminal" class="w-6 h-6 text-purple-600"></i>
                        </div>
                        <div class="absolute -bottom-6 -left-6 bg-white/90 backdrop-blur-sm p-4 rounded-full shadow-xl">
                            <i data-feather="cpu" class="w-6 h-6 text-indigo-600"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content Section -->
<section class="bg-gray-50 py-20">
    <div class="container mx-auto px-6">
        <div class="max-w-5xl mx-auto">
            <!-- Section Header -->
            <div data-aos="fade-up" data-aos-duration="600" class="text-center mb-16">
                <div class="inline-flex items-center bg-white px-6 py-3 rounded-full shadow-sm mb-6">
                    <i data-feather="file-text" class="w-5 h-5 text-purple-600 mr-2"></i>
                    <span class="text-purple-700 font-medium">Language Overview</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                    Tentang {{ $language->name }}
                </h2>
                <p class="text-gray-600 text-lg">Explore the power and capabilities of this programming language</p>
            </div>

            <!-- Description Card -->
            <div data-aos="fade-up" data-aos-duration="800" class="bg-white rounded-3xl shadow-xl p-8 lg:p-12 mb-12">
                <!-- Content Header -->
                <div class="flex items-center mb-8">
                    <div class="flex items-center justify-center w-12 h-12 bg-purple-100 rounded-xl mr-4">
                        <i data-feather="info" class="w-6 h-6 text-purple-600"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Deskripsi Bahasa Pemrograman</h3>
                        <p class="text-gray-600">Informasi lengkap tentang {{ $language->name }}</p>
                    </div>
                </div>

                <!-- Description Content -->
                <div class="prose prose-lg max-w-none">
                    <div class="bg-gradient-to-r from-purple-50 to-indigo-50 p-8 rounded-2xl border-l-4 border-purple-400 mb-8">
                        <div class="text-gray-700 leading-relaxed">
                            {!! $language->description ?? '<p class="text-gray-500 italic">Deskripsi tidak tersedia</p>' !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div data-aos="fade-up" data-aos-duration="1000" class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="javascript:history.back()" 
                   class="inline-flex items-center px-8 py-4 bg-white text-purple-600 border-2 border-purple-600 rounded-2xl font-semibold hover:bg-purple-600 hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl group">
                    <i data-feather="arrow-left" class="w-5 h-5 mr-2 group-hover:transform group-hover:-translate-x-1 transition-transform"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>
</section>



<style>
@keyframes blob {
    0% { transform: translate(0px, 0px) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
    100% { transform: translate(0px, 0px) scale(1); }
}
.animate-blob {
    animation: blob 7s infinite;
}
.animation-delay-2000 {
    animation-delay: 2s;
}
.animation-delay-4000 {
    animation-delay: 4s;
}
</style>
@endsection

