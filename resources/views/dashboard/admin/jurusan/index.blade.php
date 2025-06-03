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
                        <h1 class="text-3xl font-bold text-gray-800">Data Jurusan</h1>
                        <p class="text-gray-600 mt-1">Kelola data Jurusan dengan sistem</p>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 w-full md:w-auto">
                    <a href="{{ route('admin.jurusan.create') }}"
                        class="inline-flex items-center space-x-2 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i data-feather="plus" class="w-5 h-5"></i>
                        <span>Tambah Jurusan</span>
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
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
                </script>
        @endif
         @if(session('error'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: '{{ session('error') }}',
                            confirmButtonColor: '#e3342f',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
                </script>
        @endif
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
                                        <i data-feather="hash" class="w-4 h-4"></i>
                                        <span>Image</span>
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
                            @foreach($jurusans as $jurusan)
                            <tr class="hover:bg-purple-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600 font-mono">{{ $jurusan->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <img src="{{ $jurusan->image ? url('storage/' . $jurusan->image) : asset('images/no-image.png') }}"
                                             alt="{{ $jurusan->name }}"
                                             class="w-12 h-12 rounded-full object-cover">
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('admin.jurusan.edit', $jurusan->id) }}"
                                           class="inline-flex items-center px-3 py-1.5 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-lg transition-colors duration-150"
                                           title="Edit Data">
                                            <i data-feather="edit-2" class="w-4 h-4"></i>
                                        </a>
                                        <form action="{{ route('admin.jurusan.destroy', $jurusan->id) }}" method="POST" class="inline delete-user-form">
                                            @csrf @method('DELETE')
                                            <button type="button"
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg transition-colors duration-150 delete-user-btn"
                                                    data-nama="{{ $jurusan->name }}"
                                                    title="Hapus Data">
                                                <i data-feather="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($jurusans->isEmpty())
                    <div class="text-center py-12">
                        <div class="flex flex-col items-center">
                            <div class="bg-purple-100 p-6 rounded-full mb-4">
                                <i data-feather="users" class="w-12 h-12 text-purple-600"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada data Jurusan</h3>
                            <p class="text-gray-600 mb-4">Belum ada jurusan yang terdaftar dalam sistem</p>
                            <a href="{{ route('admin.jurusan.create') }}"
                               class="inline-flex items-center space-x-2 bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                                <i data-feather="plus" class="w-4 h-4"></i>
                                <span>Tambah jurusan Pertama</span>
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
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-user-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const form = button.closest('form');
            const nama = button.getAttribute('data-nama');

            Swal.fire({
                title: 'Yakin hapus?',
                text: `Apakah Anda yakin ingin menghapus data kategori karya ${nama}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then(result => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    if (session('success')) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
    }
});
</script>

<!-- Tambahkan ini di layout master atau sebelum closing body tag -->

@endsection
