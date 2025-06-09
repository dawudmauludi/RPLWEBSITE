@extends('layouts.masterDashboard')

@section('title', 'Detail Tugas')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Detail Tugas</h1>

    <div class="bg-white rounded-xl shadow-md p-6 space-y-4">
        <h2 class="text-2xl font-semibold text-blue-700">{{ $assignment->title }}</h2>
        <div class="text-gray-700">
            <p><strong>Instruksi:</strong></p>
            <div class="prose max-w-full">{!! $assignment->instructions !!}</div>
        </div>

        <div class="text-gray-700 space-y-1">
            <p><strong>Batas Waktu:</strong> {{ \Carbon\Carbon::parse($assignment->due_date)->format('d M Y H:i') }}</p>
            <p><strong>Kelas:</strong> {{ $assignment->kelas->nama ?? '-' }}</p>

            @if ($assignment->link)
                <p><strong>Link:</strong> <a href="{{ $assignment->link }}" class="text-blue-600 underline" target="_blank">{{ $assignment->link }}</a></p>
            @endif

            @if ($assignment->file)
                <p><strong>File Tugas:</strong>
                    <a href="{{ asset('storage/' . $assignment->file) }}" class="text-blue-500 underline" target="_blank">Download</a>
                </p>
            @endif
        </div>

        @if ($assignment->photos && $assignment->photos->count())
            <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($assignment->photos as $photo)
                    <img
                        src="{{ asset('storage/' . $photo->photo_path) }}"
                        class="w-full h-48 object-cover rounded-lg shadow hover:scale-105 transform transition duration-200 cursor-pointer"
                        alt="Foto Tugas"
                        onclick="openModal('{{ asset('storage/' . $photo->photo_path) }}')"
                    >
                @endforeach
            </div>
        @endif
    </div>

    <div class="mt-6">
        <a href="{{ route('assignments.index') }}" class="inline-flex items-center gap-2 text-sm bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-colors">
            <i data-feather="arrow-left" class="w-4 h-4"></i>
            <span>Kembali ke Daftar Tugas</span>
        </a>
    </div>

    <div class="mt-10">
        <h2 class="text-xl font-semibold text-gray-800 mb-3">Daftar Pengumpul Tugas</h2>

        <div class="flex items-center gap-3 mb-4">
            <input
                type="text"
                id="searchInput"
                placeholder="Cari nama siswa..."
                class="w-full border border-gray-300 px-4 py-2 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            />
            <div id="loader" class="hidden text-sm text-gray-500">Mencari...</div>
        </div>

        <div id="submissionsTable">
            @include('dashboard.guru.assignments.partials.submissions-table', ['submissions' => $submissions])
        </div>
    </div>
</div>

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
                });
        }, 300);
    });
</script>
@endsection
