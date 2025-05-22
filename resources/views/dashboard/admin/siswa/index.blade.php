@extends('layouts.masterDashboard')

@section('title', 'Daftar Siswa')

@section('content')
    <h1>Daftar Siswa</h1>
    <a href="{{ route('admin.siswa.create') }}">+ Tambah Siswa</a>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form method="GET" action="{{ route('admin.siswa.index') }}" id="searchForm" autocomplete="off">
    <input type="text" name="search" id="searchInput" value="{{ request('search') }}" placeholder="Cari siswa...">
    </form>

    <table border="1" cellpadding="10" cellspacing="0" id="siswaTable">
        <thead>
        <tr>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $s)
                <tr>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->nisn }}</td>
                    <td>{{ $s->kelas->nama }}</td>
                    <td>{{ $s->jenkel }}</td>
                    <td>{{ $s->telepon }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>{{ $s->tempat_lahir }}</td>
                    <td>{{ $s->tanggal_lahir }}</td>
                    <td>{{ $s->agama }}</td>
                    <td>
                        @if($s->foto)
                            <img src="{{ asset('storage/' . $s->foto) }}" alt="Foto" width="50">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.siswa.show', $s->id) }}">Lihat</a> |
                        <a href="{{ route('admin.siswa.edit', $s->id) }}">Edit</a> |
                        <form action="{{ route('admin.siswa.destroy', $s->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
document.getElementById('searchInput').addEventListener('input', function() {
    clearTimeout(this.delay);
    this.delay = setTimeout(() => {
        fetch(`{{ route('admin.siswa.index') }}?search=${encodeURIComponent(this.value)}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newTable = doc.querySelector('#siswaTable').innerHTML;
            document.querySelector('#siswaTable').innerHTML = newTable;
        });
    }, 400);
});
</script>
@endsection
