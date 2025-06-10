@extends('layouts.masterDashboard')
@section('title', 'Tugas')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">📘 Daftar Tugas</h2>

    <a href="{{ route('assignments.create') }}" class="inline-flex items-center bg-primary text-white px-5 py-2 rounded-full shadow hover:bg-primary-dark transition mb-6">
        <i data-feather="plus" class="w-4 h-4 mr-2"></i> Buat Daftar
    </a>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4 shadow-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
        <table class="min-w-full text-sm text-gray-800">
            <thead>
                <tr class="bg-primary text-white uppercase text-xs tracking-wider">
                    <th class="py-4 px-6 text-left">Judul</th>
                    <th class="py-4 px-6 text-left">Kelas</th>
                    <th class="py-4 px-6 text-left">Tanggal Selesai</th>
                    <th class="py-4 px-6 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($assignments as $ass)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-4 px-6 font-medium">{{ $ass->title }}</td>
                        <td class="py-4 px-6">{{ $ass->kelas->nama }}</td>
                        <td class="py-4 px-6">
                            <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                                {{ \Carbon\Carbon::parse($ass->due_date)->setTimezone('Asia/Jakarta')->endOfDay()->format('d M Y H:i') }}
                            </span>
                        </td>
                        <td class="py-4 px-6 space-x-2">
                            <a href="{{ route('assignments.show', $ass) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition">
                                <i data-feather="eye" class="w-4 h-4 mr-1"></i> Lihat
                            </a>
                            <a href="{{ route('assignments.edit', $ass->id) }}" class="inline-flex items-center text-yellow-600 hover:text-yellow-700 transition">
                                <i data-feather="edit" class="w-4 h-4 mr-1"></i> Edit
                            </a>
                            <form action="{{ route('assignments.destroy', $ass->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center text-red-600 hover:text-red-700 transition">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-500">Belum ada tugas tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Feather Icons --}}
@push('scripts')
    <script>
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    </script>
@endpush
@endsection
