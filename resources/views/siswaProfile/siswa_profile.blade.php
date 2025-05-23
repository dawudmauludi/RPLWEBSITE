@extends('layouts.master')

@section('title', 'Tambah Siswa')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6">Tambah Siswa</h1>

    <form action="{{ route('siswa_profile.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <!-- Nama -->
        <div>
            <label for="nama" class="block font-medium">Nama</label>
            <input type="text" name="nama" id="nama" class="w-full border rounded px-4 py-2" required>
        </div>

        <!-- NISN -->
        <div>
            <label for="nisn" class="block font-medium">NISN</label>
            <input type="text" name="nisn" id="nisn" class="w-full border rounded px-4 py-2" required>
        </div>

        <!-- Jenis Kelamin -->
        <div>
            <label for="jenkel" class="block font-medium">Jenis Kelamin</label>
            <select name="jenkel" id="jenkel" class="w-full border rounded px-4 py-2" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>

        <!-- Telepon -->
        <div>
            <label for="telepon" class="block font-medium">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="w-full border rounded px-4 py-2" required>
        </div>

        <!-- Alamat -->
        <div>
            <label for="alamat" class="block font-medium">Alamat</label>
            <textarea name="alamat" id="alamat" class="w-full border rounded px-4 py-2" required></textarea>
        </div>

        <!-- Tempat Lahir -->
        <div>
            <label for="tempat_lahir" class="block font-medium">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="w-full border rounded px-4 py-2" required>
        </div>

        <!-- Tanggal Lahir -->
        <div>
            <label for="tanggal_lahir" class="block font-medium">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="w-full border rounded px-4 py-2" required>
        </div>

        <!-- Agama -->
        <div>
            <label for="agama" class="block font-medium">Agama</label>
            <select name="agama" id="agama" class="w-full border rounded px-4 py-2" required>
                <option value="">-- Pilih Agama --</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>

        <!-- Kelas -->
        <div>
            <label for="kelas_id" class="block font-medium">Kelas</label>
            <select name="kelas_id" id="kelas_id" class="w-full border rounded px-4 py-2" required>
                <option value="">-- Pilih Kelas --</option>
               @foreach($kelas as $k)
            <option value="{{ $k->id }}" {{ old('kelas_id', $siswa->kelas_id ?? '') == $k->id ? 'selected' : '' }}>
                {{ $k->nama }}
            </option>
        @endforeach
            </select>
        </div>

        <!-- Foto -->
        <div>
            <label for="foto" class="block font-medium">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/*" class="w-full border rounded px-4 py-2" required>
        </div>

        <!-- Submit -->
        <div class="pt-4">
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded shadow">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
