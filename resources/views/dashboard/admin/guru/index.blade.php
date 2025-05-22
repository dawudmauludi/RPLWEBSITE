@extends('layouts.masterDashboard')

@section('title', 'Dashboard guru')

@section('content')
<h1>Daftar Guru</h1>
<a href="{{ route('admin.guru.create') }}">Tambah Guru</a>

<form method="GET" action="{{ route('admin.guru.index') }}" id="searchForm" autocomplete="off">
    <input type="text" name="search" id="searchInput" value="{{ request('search') }}" placeholder="Cari guru...">
</form>

<div id="guruTable">
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
</div>

<script>
document.getElementById('searchInput').addEventListener('input', function() {
    clearTimeout(this.delay);
    this.delay = setTimeout(() => {
        fetch(`{{ route('admin.guru.index') }}?search=${encodeURIComponent(this.value)}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newTable = doc.querySelector('#guruTable').innerHTML;
            document.querySelector('#guruTable').innerHTML = newTable;
        });
    }, 400);
});
</script>
@endsection
