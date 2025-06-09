@extends('layouts.masterDashboard')

@section('title', 'Detail Tugas')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Detail Tugas</h1>

    <div class="bg-white shadow rounded p-4 mb-6">
        <h2 class="text-xl font-bold">{{ $assignment->title }}</h2>
        <p class="text-gray-700 mt-2"><strong>Instruksi:</strong></p>
        <p class="text-gray-700 mb-2">{!! $assignment->instructions !!}</p>
        <p class="text-gray-700"><strong>Batas Waktu:</strong> {{ \Carbon\Carbon::parse($assignment->due_date)->format('d M Y H:i') }}</p>
        <p class="text-gray-700"><strong>Kelas:</strong> {{ $assignment->kelas->nama ?? '-' }}</p>
        @if ($assignment->link)
            <p class="text-blue-600 mt-2"><strong>Link:</strong> <a href="{{ $assignment->link }}" target="_blank">{{ $assignment->link }}</a></p>
        @endif

        @if ($assignment->file)
            <p class="mt-2">
                <strong>File Tugas:</strong>
                <a href="{{ asset('storage/' . $assignment->file) }}" class="text-blue-500 underline" target="_blank">Download</a>
            </p>
        @endif

        @if ($assignment->photos && $assignment->photos->count())
            <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($assignment->photos as $photo)
                    <img src="{{ asset('storage/' . $photo->photo_path) }}" class="w-full h-auto rounded shadow" alt="Foto Tugas">
                @endforeach
            </div>
        @endif
    </div>

    <div class="mt-4">
        <a href="{{ route('assignments.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg flex items-center space-x-2 transition-colors">
            <i data-feather="arrow-left" class="w-4 h-4"></i>
            <span>Kembali ke Daftar Tugas</span>
        </a>
    </div>


    <h2 class="text-xl font-semibold mb-4">Daftar Pengumpul Tugas</h2>

    @if ($submissions->count())
        <div class="bg-white shadow rounded p-4 overflow-x-auto">
            <table class="min-w-full text-left">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">Nama Siswa</th>
                        <th class="px-4 py-2 border-b">Link Tugas</th>
                        <th class="px-4 py-2 border-b">File</th>
                        <th class="px-4 py-2 border-b">Foto</th>
                        <th class="px-4 py-2 border-b">Waktu Submit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($submissions as $submission)
                        <tr>
                            <td class="px-4 py-2 border-b">{{ $submission->user->name }}</td>
                            <td class="px-4 py-2 border-b">
                                <a href="{{ $submission->link }}" target="_blank" class="text-blue-500 underline">Lihat Link</a>
                            </td>
                            <td class="px-4 py-2 border-b">
                                @if ($submission->file)
                                    <a href="{{ asset('storage/' . $submission->file) }}" target="_blank" class="text-blue-500 underline">Download</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-2 border-b">
                                @if ($submission->photos && $submission->photos->count())
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($submission->photos as $photo)
                                            <img
                                                src="{{ asset('storage/' . $photo->photo_path) }}"
                                                alt="Photo"
                                                class="w-16 h-16 rounded object-cover cursor-pointer"
                                                onclick="openModal('{{ asset('storage/' . $photo->photo_path) }}')"
                                            >
                                        @endforeach
                                    </div>
                                @else
                                    -
                                @endif

                                <!-- Modal -->
                                <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden z-50">
                                    <span class="absolute top-5 right-5 text-white cursor-pointer text-3xl font-bold" onclick="closeModal()">&times;</span>
                                    <img id="modalImage" src="" alt="Large Photo" class="max-w-full max-h-full rounded">
                                </div>

                                <script>
                                    function openModal(src) {
                                        document.getElementById('modalImage').src = src;
                                        document.getElementById('imageModal').classList.remove('hidden');
                                    }
                                    function closeModal() {
                                        document.getElementById('imageModal').classList.add('hidden');
                                        document.getElementById('modalImage').src = '';
                                    }

                                    // Optional: close modal if click outside image
                                    document.getElementById('imageModal').addEventListener('click', function(e) {
                                        if (e.target.id === 'imageModal') {
                                            closeModal();
                                        }
                                    });
                                </script>
                            </td>

                            <td class="px-4 py-2 border-b">
                                {{ $submission->created_at->timezone('Asia/Jakarta')->format('d M Y H:i') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-600">Belum ada siswa yang mengumpulkan tugas.</p>
    @endif
</div>
@endsection

