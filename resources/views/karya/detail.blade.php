x@extends('layouts.master')
@section('title', 'Karya Siswa')
@section('content')
<!-- Feather Icons -->

<section class="relative w-full min-h-screen text-white overflow-hidden bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900" style="font-family: 'DM Sans', sans-serif;">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"></div>
    </div>

    <div class="relative z-10 py-24 pb-0">
        <!-- Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 bg-purple-500/20 backdrop-blur-sm border border-purple-500/30 rounded-full px-4 py-2 mb-6">
                <i data-feather="star" class="w-4 h-4 text-purple-400"></i>
                <span class="text-sm text-purple-300">Featured Project</span>
            </div>
            <h1 class="text-6xl font-black bg-gradient-to-r from-purple-400 via-pink-400 to-indigo-400 bg-clip-text text-transparent mb-4 leading-tight">
                {{ $karya->judul }}
            </h1>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
               Berikut Adalah Detail Karya Siswa Yang berjudul {{ $karya->judul }}
            </p>
        </div>

        <!-- Main Content -->
        <section class="px-6 max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left Column - Image and Content -->
                <div class="w-full lg:w-2/3 space-y-8">
                    <!-- Image Section -->
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl blur opacity-25 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
                        <div class="relative">
                            <img src="{{ asset('storage/' . $karya->gambar_karya) }}"
                                 alt="Project Image"
                                 class="w-full rounded-2xl shadow-2xl border border-purple-500/20 hover:scale-[1.02] transition-transform duration-500" />
                            <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                    </div>

                    <!-- Content Tabs -->
                    <div class="bg-slate-900/40 backdrop-blur-xl rounded-2xl border border-purple-500/20 overflow-hidden">
                        <!-- Tab Headers -->
                        <div class="flex border-b border-purple-700/30 bg-slate-800/40">
                            <button id="tabOverview"
                                    class="flex items-center gap-2 px-6 py-4 text-sm font-semibold text-white border-b-2 border-purple-500 bg-purple-500/10 transition-all duration-300">
                                <i data-feather="file-text" class="w-4 h-4"></i>
                                Overview
                            </button>
                            <button id="tabFeature"
                                    class="flex items-center gap-2 px-6 py-4 text-sm font-semibold text-gray-400 hover:text-white hover:bg-slate-700/30 transition-all duration-300">
                                <i data-feather="list" class="w-4 h-4"></i>
                                Features
                            </button>
                        </div>

                        <!-- Tab Contents -->
                        <div class="p-8">
                            <div id="contentOverview" class="text-gray-300 leading-relaxed">
                                <div class="flex items-start gap-4">
                                    <div class="p-2 bg-blue-500/20 rounded-lg mt-1">
                                        <i data-feather="book-open" class="w-5 h-5 text-blue-400"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-white mb-3">Project Overview</h4>
                                        <p class="text-gray-300 leading-relaxed">
                                            {{ $karya->deskripsi ?? 'No overview provided.' }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div id="contentFeature" class="hidden text-gray-300 leading-relaxed">
                                <div class="flex items-start gap-4">
                                    <div class="p-2 bg-green-500/20 rounded-lg mt-1">
                                        <i data-feather="settings" class="w-5 h-5 text-green-400"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-lg font-semibold text-white mb-4">Key Features</h4>
                                        <div class="space-y-3">
                                            @foreach($karya->fiturKarya as $fitur)
                                                <div class="flex items-start gap-3 p-3 bg-slate-800/30 rounded-lg border border-slate-700/50 hover:border-purple-500/30 transition-colors">
                                                    <div class="p-1 bg-purple-500/20 rounded mt-0.5">
                                                        <i data-feather="arrow-right" class="w-3 h-3 text-purple-400"></i>
                                                    </div>
                                                    <span class="text-gray-300">{{ $fitur->penjelasan }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Documentation Gallery -->
                    <div class="bg-slate-900/40 backdrop-blur-xl rounded-2xl border border-purple-500/20 p-8">
                        <div class="flex items-center gap-3 mb-8">
                            <div class="p-2 bg-orange-500/20 rounded-lg">
                                <i data-feather="camera" class="w-5 h-5 text-orange-400"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-white">Project Documentation</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($karya->dokumentasi as $index => $dok)
                                <div class="group relative overflow-hidden rounded-xl bg-slate-800/30 border border-slate-700/50 hover:border-purple-500/50 transition-all duration-300">
                                    <div class="aspect-video overflow-hidden">
                                        <img onclick="openModal('{{ asset('storage/' . $dok->gambar) }}')"
                                             src="{{ asset('storage/' . $dok->gambar) }}"
                                             class="w-full h-full object-cover cursor-pointer group-hover:scale-110 transition-transform duration-700"
                                             alt="Documentation {{ $index + 1 }}">
                                    </div>
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                                        <div class="p-4 w-full">
                                            <div class="flex items-center gap-2 text-white">
                                                <i data-feather="zoom-in" class="w-4 h-4"></i>
                                                <span class="text-sm font-medium">Click to enlarge</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Column - Sticky Project Details -->
                <div class="w-full lg:w-1/3">
                    <div class="sticky top-8">
                        <div class="bg-gradient-to-br from-purple-900/40 to-slate-900/40 backdrop-blur-xl p-8 rounded-2xl shadow-2xl border border-purple-500/20 hover:border-purple-400/40 transition-all duration-300">
                            <div class="flex items-center gap-3 mb-8">
                                <div class="p-2 bg-purple-500/20 rounded-lg">
                                    <i data-feather="info" class="w-5 h-5 text-purple-400"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-white">Project Details</h3>
                            </div>

                            <div class="space-y-8">
                                <!-- Category -->
                                <div class="group">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="p-1.5 bg-blue-500/20 rounded-lg group-hover:bg-blue-500/30 transition-colors">
                                            <i data-feather="folder" class="w-4 h-4 text-blue-400"></i>
                                        </div>
                                        <p class="text-sm font-semibold text-blue-400 uppercase tracking-wider">Category</p>
                                    </div>
                                    <h4 class="text-lg font-semibold text-white ml-9">{{ $karya->category->nama ?? 'Uncategorized' }}</h4>
                                </div>

                                <div class="border-t border-purple-700/50"></div>

                                <!-- Tech Stack -->
                                <div class="group">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="p-1.5 bg-green-500/20 rounded-lg group-hover:bg-green-500/30 transition-colors">
                                            <i data-feather="layers" class="w-4 h-4 text-green-400"></i>
                                        </div>
                                        <p class="text-sm font-semibold text-green-400 uppercase tracking-wider">Tech Stack</p>
                                    </div>
                                    <div class="ml-9 flex flex-wrap gap-2">
                                        @foreach($karya->tools as $tool)
                                            <span class="inline-flex items-center gap-1.5 bg-slate-800/60 hover:bg-slate-700/60 border border-slate-600/50 rounded-full px-3 py-1.5 text-sm font-medium text-gray-300 transition-colors">
                                                <i data-feather="zap" class="w-3 h-3"></i>
                                                {{ $tool->nama }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="border-t border-purple-700/50"></div>

                                <!-- Link Project -->
                                <div class="group">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="p-1.5 bg-purple-500/20 rounded-lg group-hover:bg-purple-500/30 transition-colors">
                                            <i data-feather="external-link" class="w-4 h-4 text-purple-400"></i>
                                        </div>
                                        <p class="text-sm font-semibold text-purple-400 uppercase tracking-wider">Project Link</p>
                                    </div>
                                    <a href="{{ $karya->link }}"
                                       target="_blank"
                                       class="ml-9 inline-flex items-center gap-2 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-500 hover:to-pink-500 text-white font-semibold py-2.5 px-5 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                                        <i data-feather="globe" class="w-4 h-4"></i>
                                        Visit Website
                                    </a>
                                </div>

                                <div class="border-t border-purple-700/50"></div>

                                <!-- Developer/Creator -->
                                <div class="group">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="p-1.5 bg-orange-500/20 rounded-lg group-hover:bg-orange-500/30 transition-colors">
                                            <i data-feather="user" class="w-4 h-4 text-orange-400"></i>
                                        </div>
                                        <p class="text-sm font-semibold text-orange-400 uppercase tracking-wider">Developer</p>
                                    </div>

                                    <div class="ml-9 flex flex-col gap-2">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 bg-gradient-to-r from-orange-500 to-red-500 rounded-full flex items-center justify-center">
                                                <i data-feather="code" class="w-4 h-4 text-white"></i>
                                            </div>
                                            <h4 class="text-lg font-semibold text-white">{{ $karya->user->name ?? 'Unknown Developer' }}</h4>
                                        </div>

                                        @if ($karya->user)
                                            <a href="{{ url('/chatify/' . $karya->user->id) }}"
                                            onclick="event.preventDefault();
                                                        localStorage.setItem('chatifyPresetMessage', 'Halo, saya tertarik dengan karya: {{ $karya->judul }}');
                                                        window.location.href = this.href;"
                                            class="inline-block w-fit px-3 py-1.5 text-sm font-medium text-white bg-orange-500 rounded-lg hover:bg-orange-600 transition">
                                                Chat Developer
                                            </a>
                                        @endif
                                    </div>
                                </div>


                                <div class="border-t border-purple-700/50"></div>

                                <!-- Class -->
                                <div class="group">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="p-1.5 bg-cyan-500/20 rounded-lg group-hover:bg-cyan-500/30 transition-colors">
                                            <i data-feather="users" class="w-4 h-4 text-cyan-400"></i>
                                        </div>
                                        <p class="text-sm font-semibold text-cyan-400 uppercase tracking-wider">Class</p>
                                    </div>
                                    <div class="ml-9 flex items-center gap-3">
                                        <div class="w-8 h-8 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full flex items-center justify-center">
                                            <i data-feather="book" class="w-4 h-4 text-white"></i>
                                        </div>
                                        <h4 class="text-lg font-semibold text-white">{{ $karya->user->kelas->nama ?? 'Unknown Class' }}</h4>
                                    </div>
                                </div>

                                <div class="border-t border-purple-700/50"></div>

                                <!-- Status -->
                                <div class="group">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="p-1.5 bg-emerald-500/20 rounded-lg group-hover:bg-emerald-500/30 transition-colors">
                                            <i data-feather="check-circle" class="w-4 h-4 text-emerald-400"></i>
                                        </div>
                                        <p class="text-sm font-semibold text-emerald-400 uppercase tracking-wider">Status</p>
                                    </div>
                                    <div class="ml-9">
                                        <span class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500 to-green-500 text-white rounded-full px-4 py-2 text-sm font-bold shadow-lg">
                                            <i data-feather="check" class="w-3 h-3"></i>
                                            Completed
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Action Card -->

                    </div>
                </div>
            </div>
        </section>

        <!-- Enhanced Image Modal -->
        <div id="imageModal" class="fixed inset-0 bg-black/90 backdrop-blur-sm flex items-center justify-center z-50 hidden">
            <div class="relative max-w-7xl max-h-[90vh] mx-4">
                <button onclick="closeModal()"
                        class="absolute -top-12 right-0 flex items-center gap-2 text-white/80 hover:text-white bg-black/50 hover:bg-black/70 rounded-lg px-4 py-2 transition-all duration-300">
                    <i data-feather="x" class="w-4 h-4"></i>
                    <span class="text-sm">Close</span>
                </button>
                <img id="modalImage" class="max-w-full max-h-full rounded-xl shadow-2xl border border-purple-500/20" />
            </div>
        </div>
    </div>
</section>

<script>
    const tabOverview = document.getElementById('tabOverview');
    const tabFeature = document.getElementById('tabFeature');
    const contentOverview = document.getElementById('contentOverview');
    const contentFeature = document.getElementById('contentFeature');

    function switchTab(activeTab, activeContent, inactiveTab, inactiveContent) {
        // Show active content
        activeContent.classList.remove('hidden');
        inactiveContent.classList.add('hidden');

        // Update active tab styling
        activeTab.classList.add('text-white', 'border-b-2', 'border-purple-500', 'bg-purple-500/10');
        activeTab.classList.remove('text-gray-400');

        // Update inactive tab styling
        inactiveTab.classList.remove('text-white', 'border-b-2', 'border-purple-500', 'bg-purple-500/10');
        inactiveTab.classList.add('text-gray-400');
    }

    tabOverview.addEventListener('click', () => {
        switchTab(tabOverview, contentOverview, tabFeature, contentFeature);
    });

    tabFeature.addEventListener('click', () => {
        switchTab(tabFeature, contentFeature, tabOverview, contentOverview);
    });

    function openModal(src) {
        document.getElementById('modalImage').src = src;
        document.getElementById('imageModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }

    function closeModal() {
        document.getElementById('imageModal').classList.add('hidden');
        document.body.style.overflow = 'auto'; // Restore scrolling
    }

    // Close modal on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

    // Close modal on backdrop click
    document.getElementById('imageModal').addEventListener('click', (e) => {
        if (e.target.id === 'imageModal') {
            closeModal();
        }
    });
</script>
@endsection
