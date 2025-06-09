@extends('layouts.master')
@section('title', $job->nama_pekerjaan . ' - ' . $job->nama_perusahaan)

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    body { font-family: 'Inter', sans-serif; }

    .detail-card {
        backdrop-filter: blur(10px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .skill-badge {
        animation: float 3s ease-in-out infinite;
    }

    .skill-badge:nth-child(2) { animation-delay: 0.5s; }
    .skill-badge:nth-child(3) { animation-delay: 1s; }
    .skill-badge:nth-child(4) { animation-delay: 1.5s; }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-3px); }
    }

    .premium-badge {
        background: linear-gradient(45deg, #ffd700, #ffed4e);
        box-shadow: 0 4px 15px rgba(255, 215, 0, 0.4);
    }

    .hot-badge {
        background: linear-gradient(45deg, #ff6b6b, #ff8e8e);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.8; }
    }

    .sticky-apply-bar {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.95);
        border-top: 1px solid rgba(229, 231, 235, 0.8);
    }

    .section-divider {
        background: linear-gradient(90deg, transparent, #e5e7eb, transparent);
        height: 1px;
        margin: 2rem 0;
    }
</style>
@endpush

@section('content')
<div class="bg-gray-50 min-h-screen mt-20">
    <!-- Back Navigation -->
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 py-4">
            <a href="{{ route('alumni.jobs.index') }}" class="inline-flex items-center text-gray-600 hover:text-gray-800 transition-colors">
                <i data-feather="arrow-left" class="w-5 h-5 mr-2"></i>
                Kembali ke Daftar Lowongan
            </a>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Job Header -->
                <div class="detail-card bg-white rounded-2xl shadow-lg border border-gray-100 p-8 mb-8">
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex items-center space-x-6">
                            <div class="w-20 h-20 rounded-2xl bg-gray-100 overflow-hidden flex items-center justify-center">
                                @if($job->image)
                                    <img src="{{ asset('storage/' . $job->image) }}" alt="Logo {{ $job->nama_perusahaan }}" class="object-cover w-full h-full">
                                @else
                                    <span class="text-gray-500 font-bold text-2xl">{{ strtoupper(substr($job->nama_perusahaan, 0, 2)) }}</span>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $job->nama_pekerjaan }}</h1>
                                <h2 class="text-xl text-gray-600 font-medium mb-2">{{ $job->nama_perusahaan }}</h2>
                                <div class="flex items-center text-gray-500 mb-3">
                                    <i data-feather="map-pin" class="w-5 h-5 mr-2"></i>
                                    <span>{{ $job->lokasi }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Job Quick Info -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div class="text-center p-3 bg-blue-50 rounded-xl">
                            @if($job->tempat_kerja)
                                <i data-feather="home" class="w-8 h-8 mx-auto mb-2 text-blue-600"></i>
                            @else
                                <i data-feather="briefcase" class="w-8 h-8 mx-auto mb-2 text-blue-600"></i>
                            @endif
                            <div class="font-semibold text-gray-800">{{ $job->tempat_kerja }}</div>
                            <div class="text-sm text-gray-600">Lokasi Kerja</div>
                        </div>

                        <div class="text-center p-3 bg-green-50 rounded-xl">
                            <i data-feather="clock" class="w-8 h-8 mx-auto mb-2 text-green-600"></i>
                            <div class="font-semibold text-gray-800">{{ $job->waktu_pekerjaan }}</div>
                            <div class="text-sm text-gray-600">Waktu Kerja</div>
                        </div>

                        <div class="text-center p-3 bg-purple-50 rounded-xl">
                            <i data-feather="users" class="w-8 h-8 mx-auto mb-2 text-purple-600"></i>
                            <div class="font-semibold text-gray-800">{{ $job->tipe_pekerjaan }}</div>
                            <div class="text-sm text-gray-600">Tipe Pekerjaan</div>
                        </div>

                        <div class="text-center p-3 bg-purple-50 rounded-xl">
                            <i data-feather="dollar-sign" class="w-8 h-8 mx-auto mb-2 text-yellow-600"></i>
                            <div class="font-semibold text-gray-800">{{ $job->gaji }}</div>
                            <div class="text-sm text-gray-600">Gaji</div>
                        </div>
                    </div>
                </div>

                <!-- Job Description -->
              <div x-data="{ showFull: false }" class="detail-card bg-white rounded-2xl shadow-lg border border-gray-100 p-8 mb-8">
    <h3 class="text-2xl font-bold text-gray-800 mb-6">Deskripsi Pekerjaan</h3>

    <div
        class="prose prose-lg max-w-none text-gray-700 transition-all duration-300 overflow-hidden"
        :class="{ 'max-h-40': !showFull, 'max-h-full': showFull }"
        x-ref="descContainer"
    >
        {!! $job->deskripsi_pekerjaan !!}
    </div>

    <div class="mt-4 text-right">
        <button
            @click="showFull = !showFull"
            class="text-blue-600 hover:underline font-medium"
            x-text="showFull ? 'Sembunyikan' : 'Tampilkan Semua'"
        ></button>
    </div>
</div>


                 @if($job->skill && $job->skill->count() > 0)
                <div class="detail-card bg-white rounded-2xl shadow-lg border border-gray-100 p-8 mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Skills yang Dibutuhkan</h3>
                    <div class="flex flex-wrap gap-3">
                        @php
                            $skillColors = ['blue', 'green', 'purple', 'yellow', 'pink', 'indigo', 'red', 'orange'];
                        @endphp
                        @foreach($job->skill as $index => $skill)
                            @php $color = $skillColors[$index % count($skillColors)]; @endphp
                            <span class="skill-badge bg-{{ $color }}-100 text-{{ $color }}-800 text-sm font-medium px-4 py-2 rounded-full border border-{{ $color }}-200">
                                {{ $skill->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Apply Card -->
                <div class="detail-card bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-8 top-4">
                    <div class="text-center mb-6">
                        <div class="text-3xl font-bold text-gray-800 mb-2">{{ $job->gaji }}</div>
                        <div class="text-gray-600">Gaji</div>
                    </div>

                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Diposting:</span>
                            <span class="font-semibold text-gray-800">{{ $job->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Tipe:</span>
                            <span class="font-semibold text-gray-800">{{ $job->tipe_pekerjaan }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Lokasi:</span>
                            <span class="font-semibold text-gray-800">{{ $job->tempat_kerja }}</span>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <a href="{{ $job->link_pendaftaran }}" target="_blank"
                           class="block w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center font-bold py-4 px-6 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 transform hover:scale-105">
                            <i data-feather="external-link" class="w-5 h-5 inline mr-2"></i>
                            Lamar Sekarang
                        </a>
                    </div>
                </div>

                <!-- Company Info -->
                <div class="detail-card bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Tentang Perusahaan</h3>

                    <div class="space-y-4">
                        <div>
                            <div class="text-sm text-gray-600 mb-1">Nama Perusahaan</div>
                            <div class="font-semibold text-gray-800">{{ $job->nama_perusahaan }}</div>
                        </div>

                        <div>
                            <div class="text-sm text-gray-600 mb-1">Lokasi</div>
                            <div class="font-semibold text-gray-800">{{ $job->lokasi }}</div>
                        </div>

                        <div>
                            <div class="text-sm text-gray-600 mb-1">Waktu Kerja</div>
                            <div class="font-semibold text-gray-800">{{ $job->waktu_pekerjaan }}</div>
                        </div>
                    </div>
                </div>

                <!-- Similar Jobs -->
                @if(isset($similarJobs) && $similarJobs->count() > 0)
                <div class="detail-card bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Lowongan Serupa</h3>

                    <div class="space-y-4">
                        @foreach($similarJobs->take(3) as $similarJob)
                        <a href="{{ route('alumni.jobs.show', $similarJob->slug) }}" class="block p-4 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all">
                            <div class="font-semibold text-gray-800 text-sm mb-1">{{ $similarJob->nama_pekerjaan }}</div>
                            <div class="text-gray-600 text-sm mb-2">{{ $similarJob->nama_perusahaan }}</div>
                            <div class="flex items-center text-xs text-gray-500">
                                <i data-feather="map-pin" class="w-3 h-3 mr-1"></i>
                                <span>{{ $similarJob->lokasi }}</span>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    <a href="{{ route('alumni.jobs.index') }}" class="block text-center text-blue-600 hover:text-blue-800 font-medium mt-4">
                        Lihat Semua Lowongan
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Sticky Apply Bar (Mobile) -->
    <div class="lg:hidden fixed bottom-0 left-0 right-0 sticky-apply-bar p-4 z-50">
        <div class="flex space-x-3">
            <button class="bookmark-btn p-3 rounded-xl bg-gray-100 hover:bg-gray-200 transition-colors" data-job-id="{{ $job->id }}">
                <i data-feather="heart" class="w-6 h-6 text-gray-600"></i>
            </button>
            <a href="{{ $job->link_pendaftaran }}" target="_blank"
               class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center font-bold py-3 px-6 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all">
                Lamar Sekarang
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/feather-icons"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Feather icons
        feather.replace();

        // Bookmark functionality
        document.querySelectorAll('.bookmark-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const jobId = this.dataset.jobId;
                const icon = this.querySelector('[data-feather="heart"]');

                // Toggle visual state
                if (this.classList.contains('bookmarked')) {
                    this.classList.remove('bookmarked');
                    this.style.color = '';
                    icon.style.fill = '';
                } else {
                    this.classList.add('bookmarked');
                    this.style.color = 'rgb(239, 68, 68)';
                    icon.style.fill = 'rgb(239, 68, 68)';
                }

                // AJAX call to save bookmark
                fetch('/alumni/jobs/bookmark', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ job_id: jobId })
                }).then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showNotification(data.message);
                    }
                }).catch(error => {
                    console.error('Error:', error);
                });
            });
        });

        // Share functionality
        document.querySelector('.share-btn')?.addEventListener('click', function() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $job->nama_pekerjaan }} - {{ $job->nama_perusahaan }}',
                    text: 'Lihat lowongan pekerjaan menarik ini!',
                    url: window.location.href
                });
            } else {
                // Fallback - copy to clipboard
                navigator.clipboard.writeText(window.location.href).then(() => {
                    showNotification('Link berhasil disalin!');
                });
            }
        });

        // Smooth scroll for anchor links
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

        // Reading progress indicator
        const readingProgress = document.createElement('div');
        readingProgress.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            z-index: 1000;
            transition: width 0.3s ease;
        `;
        document.body.appendChild(readingProgress);

        window.addEventListener('scroll', () => {
            const scrolled = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
            readingProgress.style.width = scrolled + '%';
        });
    });

    function showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform';
        notification.textContent = message;
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);

        setTimeout(() => {
            notification.style.transform = 'translateX(full)';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
</script>
@endpush
