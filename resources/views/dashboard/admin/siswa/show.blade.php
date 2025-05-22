@extends('layouts.masterDashboard')

@section('title', 'Detail Siswa')

@section('content')
    <h1>Detail Siswa</h1>
    <ul>
        <li><strong>Nama:</strong> {{ $siswa->nama }}</li>
        <li><strong>NISN:</strong> {{ $siswa->nisn }}</li>
        <li><strong>Kelas:</strong> {{ $siswa->kelas->nama }}</li>
        <li><strong>Jenis Kelamin:</strong> {{ $siswa->jenkel }}</li>
        <li><strong>Telepon:</strong> {{ $siswa->telepon }}</li>
        <li><strong>Alamat:</strong> {{ $siswa->alamat }}</li>
        <li><strong>Tempat Lahir:</strong> {{ $siswa->tempat_lahir }}</li>
        <li><strong>Tanggal Lahir:</strong> {{ $siswa->tanggal_lahir }}</li>
        <li><strong>Agama:</strong> {{ $siswa->agama }}</li>
        <li>
            <strong>Foto:</strong><br>
            @if($siswa->foto)
                <img src="{{ asset('storage/' . $siswa->foto) }}" width="120">
            @else
                Tidak ada foto
            @endif
        </li>
    </ul>
    <a href="{{ route('admin.siswa.index') }}">← Kembali ke daftar</a>
@endsection
