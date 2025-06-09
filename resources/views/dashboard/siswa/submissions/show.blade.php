@extends('layouts.masterDashboard')

@section('title', 'Detail Tugas')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Detail Tugas</h1>

    <div class="bg-white shadow rounded p-4 mb-6">
        <h2 class="text-xl font-bold">{{ $assignment->title }}</h2>
        <p class="text-gray-700 mt-2"><strong>Instruksi:</strong> </p><br>
        <p class="text-gray-700 mb-1">{!! $assignment->instructions !!}</p>
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
                    <img src="{{ asset('storage/' . $photo->photo_path) }}" class="w-full h-auto rounded shadow cursor-pointer"  alt="Foto Tugas" onclick="openModal('{{ asset('storage/' . $photo->photo_path) }}')">
                @endforeach
            </div>
        @endif
    </div>

    <h2 class="text-xl font-semibold mb-4">History Pengumpulan Tugas Kamu</h2>
     @php
                $now = \Carbon\Carbon::now();
                $dueDate = \Carbon\Carbon::parse($assignment->due_date);
                $isLate = $now->gt($dueDate);
    @endphp
    @if ($submission->isNotEmpty())
        <table class="min-w-full bg-white shadow rounded overflow-hidden">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2 border">Link Tugas</th>
                    <th class="px-4 py-2 border">File Tugas</th>
                    <th class="px-4 py-2 border">Foto Tugas</th>
                    <th class="px-4 py-2 border">Waktu Submit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submission as $sub)
                <tr>

                    <td class="px-4 py-2 border align-top">
                        @if ($sub->link)
                            <a href="{{ $sub->link }}" target="_blank" class="text-blue-500 underline">{{ $sub->link }}</a>
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-4 py-2 border align-top">
                        @if ($sub->file)
                            <a href="{{ asset('storage/' . $sub->file) }}" target="_blank" class="text-blue-500 underline">Download</a>
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-4 py-2 border">
                        @if ($sub->photos && $sub->photos->count())
                            <div class="flex flex-wrap gap-2">
                                @foreach ($sub->photos as $photo)
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
                            </td>
                            <td class="px-4 py-2 border align-top">
                                {{ $sub->created_at->timezone('Asia/Jakarta')->format('d M Y H:i') }}
                            </td>
                        </tr>
                        @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-600">Kamu belum mengumpulkan tugas ini.</p>
        @if ($isLate)
                        <button class="w-full bg-gray-300 text-gray-600 font-semibold py-2 px-4 rounded-lg cursor-not-allowed" disabled>
                            Waktu pengumpulan telah berakhir
                        </button>
                    @else
                        <a href="{{ route('submissions.create', $assignment->id) }}"
                           class="w-full inline-block text-center bg-primary hover:bg-primary-dark text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
                            ✔ Kumpulkan Tugas
                        </a>
                    @endif
    @endif
    <div class="mt-4">
        <a href="{{ route('submissions.index')}}" class="btn btn-secondary">Kembali</a>
    </div>

    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
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

        // Optional: tutup modal jika klik di luar gambar
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target.id === 'imageModal') {
                closeModal();
            }
        });
    </script>

</div>
@endsection
