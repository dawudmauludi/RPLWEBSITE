@extends('layouts.masterDashboard')

@section('title', 'Dashboard guru')

@section('content')
<h1>Daftar Guru</h1>
<a href="{{ route('admin.guru.create') }}">Tambah Guru</a>
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($gurus as $guru)
        <tr>
            <td>{{ $guru->nama }}</td>
            <td>{{ $guru->nip }}</td>
            <td>{{ $guru->jenkel }}</td>
            <td>{{ $guru->telepon }}</td>
            <td>{{ $guru->alamat }}</td>
            <td>{{ $guru->tempat_lahir }}</td>
            <td>{{ $guru->tanggal_lahir }}</td>
            <td>{{ $guru->agama }}</td>
            <td>
                <a href="{{ route('admin.guru.show', $guru->id) }}">Lihat</a>
                <a href="{{ route('admin.guru.edit', $guru->id) }}">Edit</a>
                <form action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
