@extends('layouts.masterDashboard')

@section('title', 'Dashboard users')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 to-indigo-100 p-6">
    <div class="max-w-7xl mx-auto">

        <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border-l-4 border-purple-500">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center space-x-3 mb-4 md:mb-0">
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <i data-feather="users" class="w-8 h-8 text-purple-600"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Daftar User</h1>
                        <p class="text-gray-600 mt-1">Kelola data User dengan sistem</p>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 w-full md:w-auto">
                    <form method="GET" action="{{ route('admin.user.index') }}" id="searchForm" autocomplete="off" class="w-full sm:w-auto">
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
                    <a href="{{ route('admin.user.create') }}"
                        class="inline-flex items-center space-x-2 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i data-feather="plus" class="w-5 h-5"></i>
                        <span>Tambah User</span>
                    </a>
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
                                        <i data-feather="hash" class="w-4 h-4"></i>
                                        <span>Nama</span>
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <i data-feather="user" class="w-4 h-4"></i>
                                        <span>Email</span>
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <i data-feather="phone" class="w-4 h-4"></i>
                                        <span>Role</span>
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <i data-feather="settings" class="w-4 h-4"></i>
                                        <span>Aksi</span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($users as $user)
                            <tr class="hover:bg-purple-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600 font-mono">{{ $user->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-gray-900">{{ $user->email }}</div>
                                </td>

                                   <td class="px-6 py-4">
                                        @foreach($user->roles as $role)
                                            <span class="inline-block bg-purple-100 text-purple-700 text-xs px-2 py-1 rounded-full">{{ $role->name }}</span>
                                        @endforeach
                                    </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('admin.user.edit', $user->id) }}"
                                           class="inline-flex items-center px-3 py-1.5 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-lg transition-colors duration-150"
                                           title="Edit Data">
                                            <i data-feather="edit-2" class="w-4 h-4"></i>
                                        </a>
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="inline delete-user-form">
                                            @csrf @method('DELETE')
                                            <button type="button"
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg transition-colors duration-150 delete-user-btn"
                                                    data-nama="{{ $user->nama }}"
                                                    title="Hapus Data">
                                                <i data-feather="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                        <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            document.querySelectorAll('.delete-user-btn').forEach(function(btn) {
                                                btn.addEventListener('click', function(e) {
                                                    e.preventDefault();
                                                    const form = btn.closest('form');
                                                    const nama = btn.getAttribute('data-nama');
                                                    if (typeof Swal !== 'undefined') {
                                                        Swal.fire({
                                                            title: 'Yakin hapus?',
                                                            text: `Apakah Anda yakin ingin menghapus data user ${nama}?`,
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
                                                    } else {
                                                        if (confirm(`Apakah Anda yakin ingin menghapus data user ${nama}?`)) {
                                                            form.submit();
                                                        }
                                                    }
                                                });
                                            });

                                            @if(session('success'))
                                                if (typeof Swal !== 'undefined') {
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Berhasil!',
                                                        text: '{{ session('success') }}',
                                                        timer: 2000,
                                                        showConfirmButton: false
                                                    });
                                                }
                                            @endif
                                        });
                                        </script>
                                    </div>
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
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada data user</h3>
                            <p class="text-gray-600 mb-4">Belum ada user yang terdaftar dalam sistem</p>
                            <a href="{{ route('admin.user.create') }}"
                               class="inline-flex items-center space-x-2 bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                                <i data-feather="plus" class="w-4 h-4"></i>
                                <span>Tambah User Pertama</span>
                            </a>
                        </div>
                    </div>
                    @endif
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

        fetch(`{{ route('admin.user.index') }}?search=${encodeURIComponent(searchValue)}`, {
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
