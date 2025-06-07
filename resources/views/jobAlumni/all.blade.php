@extends('layouts.master')
@section('title', 'Semua Berita')

@section('content')


@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    body { font-family: 'Inter', sans-serif; }
    
    .job-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        backdrop-filter: blur(10px);
    }
    
    .job-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
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
    
    .company-logo {
        background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%);
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

    .gradient-company-1 { background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%); }
    .gradient-company-2 { background: linear-gradient(45deg, #667eea 0%, #764ba2 100%); }
    .gradient-company-3 { background: linear-gradient(45deg, #ff9a9e 0%, #fecfef 100%); }
    .gradient-company-4 { background: linear-gradient(45deg, #a8edea 0%, #fed6e3 100%); }
    .gradient-company-5 { background: linear-gradient(45deg, #ffecd2 0%, #fcb69f 100%); }
    .gradient-company-6 { background: linear-gradient(45deg, #89f7fe 0%, #66a6ff 100%); }
</style>
@endpush

@section('content')
<div class="bg-gray-50 min-h-screen py-8 mt-20">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Portal Karier Alumni</h1>
            <p class="text-gray-600 text-lg">Temukan peluang karier terbaik untuk masa depan cemerlang</p>
            
            <!-- Stats -->
            <div class="flex justify-center space-x-8 mt-6">
                <div class="text-center">
                    <div class="text-2xl font-bold text-blue-600">{{ $totalJobs ?? 0 }}</div>
                    <div class="text-sm text-gray-500">Total Lowongan</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-green-600">{{ $activeJobs ?? 0 }}</div>
                    <div class="text-sm text-gray-500">Aktif Merekrut</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-purple-600">{{ $companiesCount ?? 0 }}</div>
                    <div class="text-sm text-gray-500">Perusahaan</div>
                </div>
            </div>
        </div>

        <!-- Filter & Search -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <form method="GET" action="{{ route('alumni.jobs.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Cari pekerjaan atau perusahaan..." 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <select name="lokasi" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua Lokasi</option>
                        @foreach($locations ?? [] as $location)
                            <option value="{{ $location }}" {{ request('lokasi') == $location ? 'selected' : '' }}>
                                {{ $location }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select name="tipe_pekerjaan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua Tipe</option>
                        @foreach($jobTypes ?? [] as $type)
                            <option value="{{ $type }}" {{ request('tipe_pekerjaan') == $type ? 'selected' : '' }}>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium py-2 px-4 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all">
                        <i data-feather="search" class="w-4 h-4 inline mr-2"></i>
                        Cari
                    </button>
                </div>
            </form>
        </div>

        @if($jobs && $jobs->count() > 0)
            <!-- Job Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($jobs as $index => $job)
                    <div class="job-card bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <!-- Header with badges -->
                        <div class="relative p-6 pb-4">
                            
                            <!-- Company Info -->
                            <div class="flex items-center space-x-4 mb-4">
                                <div class="w-16 h-16 rounded-xl bg-gray-100 overflow-hidden flex items-center justify-center">
                                @if($job->image)
                                    <img src="{{ asset('storage/' . $job->image) }}" alt="Logo {{ $job->nama_perusahaan }}" class="object-cover w-full h-full">
                                @else
                                    <span class="text-gray-500 font-bold text-xl">{{ strtoupper(substr($job->nama_perusahaan, 0, 2)) }}</span>
                                @endif
                            </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-bold text-gray-800 text-lg truncate">{{ $job->nama_pekerjaan }}</h3>
                                    <p class="text-gray-600 text-sm font-medium truncate">{{ $job->nama_perusahaan }}</p>
                                    <div class="flex items-center text-gray-500 text-sm mt-1">
                                        <i data-feather="map-pin" class="w-4 h-4 mr-1 flex-shrink-0"></i>
                                        <span class="truncate">{{ $job->lokasi }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Job Details -->
                        <div class="px-6 pb-4">
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    @if($job->tempat_kerja == 'Remote')
                                        <i data-feather="home" class="w-4 h-4 mr-2 text-blue-500 flex-shrink-0"></i>
                                    @elseif($job->tempat_kerja == 'Hybrid')
                                        <i data-feather="briefcase" class="w-4 h-4 mr-2 text-blue-500 flex-shrink-0"></i>
                                    @else
                                        <i data-feather="building" class="w-4 h-4 mr-2 text-blue-500 flex-shrink-0"></i>
                                    @endif
                                    <span class="truncate">{{ $job->tempat_kerja }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i data-feather="clock" class="w-4 h-4 mr-2 text-green-500 flex-shrink-0"></i>
                                    <span class="truncate">{{ $job->waktu_pekerjaan }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i data-feather="users" class="w-4 h-4 mr-2 text-purple-500 flex-shrink-0"></i>
                                    <span class="truncate">{{ $job->tipe_pekerjaan }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i data-feather="dollar-sign" class="w-4 h-4 mr-2 text-yellow-500 flex-shrink-0"></i>
                                    <span class="truncate">{{ $job->gaji }}</span>
                                </div>
                            </div>

                            <!-- Skills -->
                            @if($job->skill && $job->skill->count() > 0)
                                <div class="mb-4">
                                    <p class="text-sm font-medium text-gray-700 mb-2">Skills Required:</p>
                                    <div class="flex flex-wrap gap-2">
                                        @php
                                            $skillColors = ['blue', 'green', 'purple', 'yellow', 'pink', 'indigo', 'red', 'gray'];
                                            $displayedSkills = $job->skill->take(3);
                                            $remainingCount = $job->skill->count() - 3;
                                        @endphp
                                        
                                        @foreach($displayedSkills as $skillIndex => $skill)
                                            @php $color = $skillColors[$skillIndex % count($skillColors)]; @endphp
                                            <span class="skill-badge bg-{{ $color }}-100 text-{{ $color }}-800 text-xs font-medium px-3 py-1 rounded-full">
                                                {{ $skill->name }}
                                            </span>
                                        @endforeach
                                        
                                        @if($remainingCount > 0)
                                            <span class="skill-badge bg-gray-100 text-gray-800 text-xs font-medium px-3 py-1 rounded-full">
                                                +{{ $remainingCount }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <!-- Description Preview -->
                            <div class="mb-4">
                                <p class="text-sm text-gray-600 line-clamp-2">
                                    {{ Str::limit(strip_tags($job->deskripsi_pekerjaan), 120) }}
                                </p>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center text-sm text-gray-500">
                                    @if($job->created_at->diffInDays(now()) <= 7)
                                        <i data-feather="activity" class="w-4 h-4 mr-1 text-green-500"></i>
                                        <span class="text-green-600 font-medium">Aktif Merekrut</span>
                                    @else
                                        <i data-feather="eye" class="w-4 h-4 mr-1 text-blue-500"></i>
                                        <span class="text-blue-600 font-medium">{{ rand(50, 500) }} views</span>
                                    @endif
                                </div>
                                <span class="text-xs text-gray-400">{{ $job->created_at->diffForHumans() }}</span>
                            </div>
                            
                            <div class="flex space-x-2">
                                <a href="{{ route('alumni.jobs.show', $job->slug) }}" 
                                   class="flex-1 bg-gradient-to-r from-gray-600 to-gray-700 text-white text-center font-medium py-2.5 px-4 rounded-lg hover:from-gray-700 hover:to-gray-800 transition-all duration-200">
                                    Detail
                                </a>
                                <a href="{{ $job->link_pendaftaran }}" target="_blank"
                                   class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center font-medium py-2.5 px-4 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-200 transform hover:scale-105">
                                    Lamar Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if(method_exists($jobs, 'links'))
                <div class="mt-12">
                    {{ $jobs->appends(request()->query())->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="mx-auto w-32 h-32 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                    <i data-feather="briefcase" class="w-16 h-16 text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Tidak Ada Lowongan Ditemukan</h3>
                <p class="text-gray-600 mb-6">Maaf, tidak ada lowongan pekerjaan yang sesuai dengan kriteria pencarian Anda.</p>
                <a href="{{ route('jobs.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    Lihat Semua Lowongan
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/feather-icons"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Feather icons
        feather.replace();

        // Job card hover effects
        document.querySelectorAll('.job-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

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

                // Here you can add AJAX call to save bookmark to database
                // fetch('/jobs/bookmark', {
                //     method: 'POST',
                //     headers: {
                //         'Content-Type': 'application/json',
                //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                //     },
                //     body: JSON.stringify({ job_id: jobId })
                // });
            });
        });

        // Auto-submit form on select change
        document.querySelectorAll('select[name="lokasi"], select[name="tipe_pekerjaan"]').forEach(select => {
            select.addEventListener('change', function() {
                this.closest('form').submit();
            });
        });
    });
</script>
@endpush






@endsection