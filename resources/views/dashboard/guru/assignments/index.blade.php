@extends('layouts.masterDashboard')
@section('title', 'Tugas')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Daftar Tugas</h2>

    <a href="{{ route('assignments.create') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mb-6">
        + Buat Daftar
    </a>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow-md">
            <thead>
                <tr class="bg-gray-200 text-gray-700 text-left">
                    <th class="py-3 px-4">Judul</th>
                    <th class="py-3 px-4">Kelas</th>
                    <th class="py-3 px-4">Tanggal Selesai</th>
                    <th class="py-3 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assignments as $ass)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 px-4">{{ $ass->title }}</td>
                        <td class="py-2 px-4">{{ $ass->kelas->nama }}</td>
                        <td class="py-2 px-4">{{ \Carbon\Carbon::parse($ass->due_date)->setTimezone('Asia/Jakarta')->endOfDay()->format('d M Y H:i') }}</td>
                        <td class="py-2 px-4 space-x-2">
                            <a href="{{ route('assignments.show', $ass) }}" class="text-blue-600 hover:underline">Lihat</a>
                            <a href="{{ route('assignments.edit', $ass->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('assignments.destroy', $ass->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
