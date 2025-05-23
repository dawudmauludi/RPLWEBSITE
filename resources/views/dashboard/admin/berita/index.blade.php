@extends('layouts.masterDashboard')

@section('title', 'Add Berita')

@section('content')
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Daftar Berita</h1>
        <a href="{{ route('admin.berita.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Berita</a>
    </div>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Judul</th>
                <th class="py-2 px-4 border">Slug</th>
                <th class="py-2 px-4 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($beritas as $berita)
                <tr>
                    <td class="py-2 px-4 border">{{ $berita->judul }}</td>
                    <td class="py-2 px-4 border">{{ $berita->slug }}</td>
                    <td class="py-2 px-4 border">
                         <a href="{{ route('berita.show', $berita) }}" class="text-blue-500">Lihat</a>
                        <a href="{{ route('admin.berita.edit', $berita) }}" class="text-yellow-500 ml-2">Edit</a>
                        <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
