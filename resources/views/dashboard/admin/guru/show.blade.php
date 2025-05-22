@extends('layouts.masterDashboard')

@section('title', 'Detail Guru')

@section('content')
    <h1>Detail Guru</h1>
    <p>Nama: {{ $guru->nama }}</p>
    <p>NIP: {{ $guru->nip }}</p>
    <p>Jenis Kelamin: {{ $guru->jenkel }}</p>
    <p>Telepon: {{ $guru->telepon }}</p>
    <p>Alamat: {{ $guru->alamat }}</p>
    <p>Tempat Lahir: {{ $guru->tempat_lahir }}</p>
    <p>Tanggal Lahir: {{ $guru->tanggal_lahir }}</p>
    <p>Agama: {{ $guru->agama }}</p>
    <p>Foto: 
        @if($guru->foto)
            <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto Guru" width="120">
        @else
            Tidak ada foto
        @endif
    </p>
    <a href="{{ route('admin.guru.index') }}">Kembali</a>
@endsection
