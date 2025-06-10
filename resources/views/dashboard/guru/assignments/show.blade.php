@extends('layouts.masterDashboard')

@section('title', 'Detail Tugas')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Detail Tugas</h1>
            <p class="text-gray-600">Kelola dan pantau pengumpulan tugas siswa</p>
        </div>

        <!-- Assignment Details Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8 border border-gray-100">
            <!-- Header with gradient -->
            <div class="bg-primary px-8 py-6">
                <h2 class="text-3xl font-bold text-white">{{ $assignment->title }}</h2>
            </div>

            <div class="p-8 space-y-6">
                <!-- Instructions Section -->
                <div class="bg-gray-50 rounded-xl p-6">
                    <div class="flex items-start gap-3 mb-4">
                        <div class="bg-blue-100 rounded-lg p-2">
                            <i data-feather="file-text" class="w-5 h-5 text-blue-600"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Instruksi Tugas</h3>
                    </div>
                    <div class="prose max-w-full text-gray-700 leading-relaxed">
                        {!! $assignment->instructions !!}
                    </div>
                </div>

                <!-- Assignment Info Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Due Date -->
                    <div class="bg-red-50 rounded-xl p-6 border border-red-100">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="bg-red-100 rounded-lg p-2">
                                <i data-feather="clock" class="w-5 h-5 text-red-600"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800">Batas Waktu</h4>
                        </div>
                        <p class="text-red-700 font-medium">
                            {{ \Carbon\Carbon::parse($assignment->due_date)->setTimezone('Asia/Jakarta')->endOfDay()->format('d M Y H:i') }}
                        </p>
                    </div>

                    <!-- Class -->
                    <div class="bg-green-50 rounded-xl p-6 border border-green-100">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="bg-green-100 rounded-lg p-2">
                                <i data-feather="users" class="w-5 h-5 text-green-600"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800">Kelas</h4>
                        </div>
                        <p class="text-green-700 font-medium">{{ $assignment->kelas->nama ?? '-' }}</p>
                    </div>

                    <!-- Status -->
                    <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="bg-blue-100 rounded-lg p-2">
                                <i data-feather="check-circle" class="w-5 h-5 text-blue-600"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800">Status</h4>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            Aktif
                        </span>
                    </div>
                </div>

                <!-- Links and Files -->
                @if ($assignment->link || $assignment->file)
                    <div class="bg-yellow-50 rounded-xl p-6 border border-yellow-100">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="bg-yellow-100 rounded-lg p-2">
                                <i data-feather="paperclip" class="w-5 h-5 text-yellow-600"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800">Lampiran</h4>
                        </div>

                        <div class="space-y-3">
                            @if ($assignment->link)
                                <div class="flex items-center gap-3 p-3 bg-white rounded-lg border border-yellow-200">
                                    <i data-feather="link" class="w-4 h-4 text-yellow-600"></i>
                                    <a href="{{ $assignment->link }}"
                                       class="text-blue-600 hover:text-blue-800 font-medium underline transition-colors"
                                       target="_blank">
                                        Link Tugas
                                    </a>
                                </div>
                            @endif

                            @if ($assignment->file)
                                <div class="flex items-center gap-3 p-3 bg-white rounded-lg border border-yellow-200">
                                    <i data-feather="download" class="w-4 h-4 text-yellow-600"></i>
                                    <a href="{{ asset('storage/' . $assignment->file) }}"
                                       class="text-blue-600 hover:text-blue-800 font-medium underline transition-colors"
                                       target="_blank">
                                        Download File Tugas
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Photos Gallery -->
                @if ($assignment->photos && $assignment->photos->count())
                    <div class="bg-purple-50 rounded-xl p-6 border border-purple-100">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="bg-purple-100 rounded-lg p-2">
                                <i data-feather="image" class="w-5 h-5 text-purple-600"></i>
                            </div>
                            <h4 class="font-semibold text-gray-800">Galeri Foto</h4>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($assignment->photos as $photo)
                                <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300">
                                    <img
                                        src="{{ asset('storage/' . $photo->photo_path) }}"
                                        class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300 cursor-pointer"
                                        alt="Foto Tugas"
                                        onclick="openModal('{{ asset('storage/' . $photo->photo_path) }}')"
                                    >
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('assignments.index') }}"
               class="inline-flex items-center gap-3 bg-white hover:bg-gray-50 text-gray-700 px-6 py-3 rounded-xl shadow-md border border-gray-200 transition-all duration-200 hover:shadow-lg">
                <i data-feather="arrow-left" class="w-5 h-5"></i>
                <span class="font-medium">Kembali ke Daftar Tugas</span>
            </a>
        </div>

        <!-- Submissions Section -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <!-- Header -->
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-8 py-6">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <i data-feather="users" class="w-6 h-6"></i>
                    Daftar Pengumpul Tugas
                </h2>
            </div>

            <div class="p-8">
                <!-- Search Section -->
                <div class="mb-6">
                    <div class="relative max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i data-feather="search" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input
                            type="text"
                            id="searchInput"
                            placeholder="Cari nama siswa..."
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                        />
                        <div id="loader" class="hidden absolute right-4 top-1/2 transform -translate-y-1/2">
                            <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-500"></div>
                        </div>
                    </div>
                </div>

                <!-- Submissions Table -->
                <div id="submissionsTable" class="bg-gray-50 rounded-xl p-4">
                    @include('dashboard.guru.assignments.partials.submissions-table', ['submissions' => $submissions])
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden z-50">
    <span class="absolute top-5 right-5 text-white cursor-pointer text-3xl font-bold" onclick="closeModal()">&times;</span>
    <img id="modalImage" src="" alt="Large Photo" class="max-w-full max-h-full rounded">
</div>

<script>
    const imageModal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');

    function openModal(src) {
        modalImage.src = src;
        imageModal.classList.remove('hidden');
    }

    function closeModal() {
        imageModal.classList.add('hidden');
        modalImage.src = '';
    }

    imageModal.addEventListener('click', ({target}) => {
        if (target === imageModal) {
            closeModal();
        }
    });
</script>

<script>
    const input = document.getElementById('searchInput');
    const submissionsTable = document.getElementById('submissionsTable');
    const loader = document.getElementById('loader');
    const assignmentId = {{ $assignment->id }};

    let timeout = null;
    input.addEventListener('input', function () {
        clearTimeout(timeout);
        loader.classList.remove('hidden');

        timeout = setTimeout(() => {
            fetch(`/assignments/${assignmentId}/submissions/search?search=${input.value}`)
                .then(res => res.json())
                .then(data => {
                    submissionsTable.innerHTML = data.html;
                    loader.classList.add('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                    loader.classList.add('hidden');
                });
        }, 300);
    });

    // Initialize Feather Icons
    if (typeof feather !== 'undefined') {
        feather.replace();
    }


</script>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
</style>
@endsection
