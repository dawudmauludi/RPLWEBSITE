@extends('layouts.masterDashboard')

@section('title', 'Ubah Kelas')

@section('content')

<div class="container mx-auto px-4 py-6">
    <h2 class="text-xl font-semibold mb-4">Ubah</h2>

  <form action="{{ route('admin.kelas.update', $kelas->id) }}" method="POST" class="bg-white p-6 rounded-xl shadow-md space-y-4">
        @csrf
       @method('PUT')
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" required 
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" value="{{ old('nama', $kelas->nama) }}"">
        </div>
        <div class="text-right">
            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded shadow-md transition">Simpan</button>
        </div>
    </form>
</div>
@endsection