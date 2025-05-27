@extends('layouts.masterDashboard')

@section('title', 'Daftar Siswa')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 to-indigo-100 p-6">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border-t-4 border-purple-500">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
                <i data-feather="users" class="text-purple-600"></i>
                Daftar Siswa
                </h1>
                <p class="text-gray-600 mt-2">Kelola data siswa sekolah</p>
            </div>
            <a href="{{ route('admin.siswa.create') }}"
               class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-6 py-3 rounded-lg font-medium transition-all duration-300 shadow-lg hover:shadow-xl flex items-center gap-2">
                <i data-feather="plus" class="w-5 h-5"></i>
                Tambah Siswa
            </a>
            </div>
            <div class="mt-6">
            <form method="GET" action="{{ route('admin.siswa.index') }}" id="searchForm" autocomplete="off">
                <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i data-feather="search" class="text-gray-400 w-5 h-5"></i>
                </div>
                <input type="text"
                       name="search"
                       id="searchInput"
                       value="{{ request('search') }}"
                       placeholder="Cari siswa berdasarkan nama atau NIS..."
                       class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-gray-700 placeholder-gray-400">
                </div>
            </form>
            </div>
        </div>
         @if(session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: '{{ session('success') }}',
                            confirmButtonColor: '#7c3aed'
                        });
                    });
                </script>
        @endif
        @if(session('success'))
            <div id="successAlert" class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-lg shadow-sm transition-opacity duration-700">
            <div class="flex items-center">
                <i data-feather="check-circle" class="text-green-500 w-5 h-5 mr-3"></i>
                <p class="text-green-800 font-medium">{{ session('success') }}</p>
            </div>
            </div>
            <script>
            setTimeout(() => {
                const alert = document.getElementById('successAlert');
                if(alert){
                alert.style.opacity = '0';
                setTimeout(() => alert.style.display = 'none', 700);
                }
            }, 2500);
            </script>
        @endif


        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full" id="siswaTable">
                    <thead class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left font-semibold">
                                <div class="flex items-center gap-2">
                                    <i data-feather="hash" class="w-4 h-4"></i>
                                    NIS
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold">
                                <div class="flex items-center gap-2">
                                    <i data-feather="user" class="w-4 h-4"></i>
                                    Nama
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold">
                                <div class="flex items-center gap-2">
                                    <i data-feather="home" class="w-4 h-4"></i>
                                    Kelas
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left font-semibold">
                                <div class="flex items-center gap-2">
                                    <i data-feather="calendar" class="w-4 h-4"></i>
                                    Tanggal Lahir
                                </div>
                            </th>
                            <th class="px-6 py-4 text-center font-semibold">
                                <div class="flex items-center justify-center gap-2">
                                    <i data-feather="settings" class="w-4 h-4"></i>
                                    Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($siswa as $s)
                            <tr class="hover:bg-purple-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-md text-sm font-medium">
                                        {{ $s->nisn }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900">{{ $s->nama }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded-md text-sm font-medium">
                                        {{ $s->kelas->nama }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2 text-gray-700">
                                        {{ \Carbon\Carbon::parse($s->tanggal_lahir)->format('d M Y') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.siswa.show', $s->id) }}"
                                           class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md"
                                           title="Lihat Detail">
                                          p
                                        </a>
                                        <a href="{{ route('admin.siswa.edit', $s->id) }}"
                                           class="bg-amber-500 hover:bg-amber-600 text-white p-2 rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md"
                                           title="Edit">
                                            <i data-feather="edit" class="w-4 h-4"></i>
                                        </a>
                                        <form action="{{ route('admin.siswa.destroy', $s->id) }}" method="POST" class="inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                    class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md delete-btn"
                                                    data-nama="{{ $s->nama }}"
                                                    title="Hapus">
                                                <i data-feather="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Empty State -->
            @if($siswa->isEmpty())
                <div class="text-center py-12">
                    <div class="w-24 h-24 mx-auto mb-4 bg-purple-100 rounded-full flex items-center justify-center">
                        <i data-feather="users" class="w-12 h-12 text-purple-400"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data siswa</h3>
                    <p class="text-gray-500 mb-4">Mulai dengan menambahkan siswa baru</p>
                    <a href="{{ route('admin.siswa.create') }}"
                       class="inline-flex items-center gap-2 bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                        <i data-feather="plus" class="w-4 h-4"></i>
                        Tambah Siswa
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function (e) {
        const form = this.closest('form');
        const nama = this.getAttribute('data-nama');

        Swal.fire({
            title: `Hapus siswa "${nama}"?`,
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>

<script>
feather.replace();

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
            // Re-initialize Feather Icons after DOM update
            feather.replace();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }, 400);
});

document.getElementById('searchInput').addEventListener('input', function() {
    this.classList.add('animate-pulse');
    setTimeout(() => {
        this.classList.remove('animate-pulse');
    }, 800);
});
</script>
@endsection
