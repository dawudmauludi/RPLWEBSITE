@extends('layouts.masterDashboard')

@section('title', 'Dashboard Tambah Point')

@section('content')

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('error') }}',
        });
    </script>
@endif
<div class="min-h-screen bg-gradient-to-br from-purple-50 to-indigo-100 p-6">
    <div class="max-w-7xl mx-auto">

        <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border-l-4 border-purple-500">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center space-x-3 mb-4 md:mb-0">
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <i data-feather="users" class="w-8 h-8 text-purple-600"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Daftar Siswa</h1>
                        <p class="text-gray-600 mt-1">Kelola Point Siswa dengan sistem</p>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 w-full md:w-auto">
                    <form method="GET" action="{{ route('guru.users.index') }}" id="searchForm" autocomplete="off" class="w-full sm:w-auto">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-feather="search" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input type="text"
                                name="search"
                                id="searchInput"
                                value="{{ request('search') }}"
                                placeholder="Cari berdasarkan nama, Role"
                                class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 text-gray-900 placeholder-gray-500">
                        </div>
                    </form>
                </div>
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
        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div id="guruTable">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-purple-600 to-purple-700">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            <div class="flex items-center space-x-2">
                                <i data-feather="user" class="w-4 h-4"></i>
                                <span>Nama</span>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            <div class="flex items-center space-x-2">
                                <i data-feather="mail" class="w-4 h-4"></i>
                                <span>Email</span>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            <div class="flex items-center space-x-2">
                                <i data-feather="mail" class="w-4 h-4"></i>
                                <span>Point Siswa</span>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            <div class="flex items-center space-x-2">
                                <i data-feather="plus-circle" class="w-4 h-4"></i>
                                <span>Tambah Poin</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                    <tr class="hover:bg-purple-50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-600 font-mono">{{ $user->nama }}</div>
                        </td>                    
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-600 font-mono">{{ $user->email }}</div>
                        </td>                    
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-600 font-mono">{{ $user->poin }}</div>
                        </td>                    
                        <td class="px-6 py-4 whitespace-nowrap flex gap-x-2 text-sm font-medium">
                            <form action="{{ route('guru.users.addPoint', $user->id) }}" method="POST" class="flex items-center space-x-2">
                                @csrf
                                <input type="number" name="poin" min="1" value="1" class="w-16 px-2 py-1 border rounded text-sm">
                                <button type="submit"
                                        class="inline-flex items-center px-3 py-1.5 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors duration-150"
                                        title="Tambah Poin">
                                    <i data-feather="plus" class="w-4 h-4 mr-1"></i> Tambah
                                </button>
                            </form>
                              <form action="{{ route('guru.users.deletePoint', $user->id) }}" method="POST" class="inline" onsubmit="return confirmDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200 transform hover:scale-105">
                                               <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                            </svg>
                                                Kurangi Point
                                            </button>
                                        </form>

                                        <script>
                                            function confirmDelete(event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: 'Konfirmasi',
                                                    text: 'Yakin ingin mengurangi point siswa ini?',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Ya, hapus!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        event.target.submit();
                                                    }
                                                });
                                                return false;
                                            }
                                        </script>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($users->isEmpty())
            <div class="text-center py-12">
                <div class="flex flex-col items-center">
                    <div class="bg-purple-100 p-6 rounded-full mb-4">
                        <i data-feather="users" class="w-12 h-12 text-purple-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada data pengguna</h3>
                    <p class="text-gray-600 mb-4">Belum ada pengguna yang dapat diberikan poin.</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</div>

<script>
// Initialize Feather Icons
document.addEventListener('DOMContentLoaded', function() {
    if (typeof feather !== 'undefined') {
        feather.replace();
    }
});

document.getElementById('searchInput').addEventListener('input', function() {
    clearTimeout(this.delay);
    this.delay = setTimeout(() => {
        const searchValue = this.value;

        const tableContainer = document.querySelector('#guruTable');
        const originalContent = tableContainer.innerHTML;

        tableContainer.innerHTML = `
            <div class="flex items-center justify-center py-12">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-purple-600"></div>
                <span class="ml-2 text-gray-600">Mencari data...</span>
            </div>
        `;

        fetch(`{{ route('guru.kategoriKarya.index') }}?search=${encodeURIComponent(searchValue)}`, {
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

            // Re-initialize Feather icons
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            tableContainer.innerHTML = originalContent;
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    }, 400);
});
</script>

<!-- Tambahkan ini di layout master atau sebelum closing body tag -->

@endsection
