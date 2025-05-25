@extends('layouts.masterDashboard')

@section('title', 'Daftar Ulangan')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="mb-8">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <!-- Purple Header -->
                <div class="bg-primary px-6 py-6">
    <!-- Header -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-purple-800 rounded-lg">
                                <i data-feather="clipboard" class="w-6 h-6 text-white"></i>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-white">Daftar Ulangan</h1>
                                <p class="text-purple-100 text-sm">Kelola semua ulangan dengan mudah</p>
                            </div>
                        </div>
                        <a href="{{ route('ulangans.create') }}"
           class="inline-flex items-center px-4 py-2 bg-white text-purple-600 font-semibold rounded-lg hover:bg-purple-50 transition-colors duration-200 shadow-sm">
            <i data-feather="plus" class="w-4 h-4 mr-2"></i>
            Tambah Ulangan
        </a>
                    </div>

                    <!-- Search & Filter -->
                    <form action="{{ route('ulangans.index') }}" method="GET" class="flex flex-col md:flex-row md:items-center md:space-x-3 space-y-3 md:space-y-0 mb-6">
                        <div class="w-full md:w-1/2">
                            <label for="search" class="sr-only">Cari</label>
                            <input type="text" name="search" id="search" value="{{ request()->input('search') }}"
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors"
                                placeholder="Cari berdasarkan judul...">
                        </div>
                        <div class="w-full md:w-1/3">
                            <label for="kelas" class="sr-only">Kelas</label>
                            <select name="kelas_id" id="kelas"
                                    class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors">
                                <option value="">Semua Kelas</option>
                                @foreach ($kelas as $kelasOption)
                                    <option value="{{ $kelasOption->id }}" {{ request()->input('kelas') == $kelasOption->id ? 'selected' : '' }}>
                                        {{ $kelasOption->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-white text-purple-600 font-semibold rounded-lg hover:bg-purple-50 transition-colors duration-200 shadow-sm">
                                <i data-feather="search" class="w-4 h-4 mr-2"></i>
                                Cari
                            </button>
                        </div>
                    </form>
                </div>

        </div>

        <!-- Alert Messages -->
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

        @if(session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: '{{ session('error') }}',
                        confirmButtonColor: '#f56565'
                    });
                });
            </script>
        @endif

        <!-- Main Content Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">

            <!-- Stats Bar -->
            <div class="bg-purple-50 px-6 py-4 border-b border-purple-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-6">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-purple-500 rounded-full"></div>
                            <span class="text-sm font-medium text-purple-700">Total: {{ $ulangans->total() }} Ulangan</span>
                        </div>
                    </div>
                    <div class="text-sm text-purple-600">
                        Halaman {{ $ulangans->currentPage() }} dari {{ $ulangans->lastPage() }}
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center space-x-1">
                                    <i data-feather="book" class="w-4 h-4"></i>
                                    <span>Judul</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center space-x-1">
                                    <i data-feather="users" class="w-4 h-4"></i>
                                    <span>Kelas</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center space-x-1">
                                    <i data-feather="play" class="w-4 h-4"></i>
                                    <span>Mulai</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center space-x-1">
                                    <i data-feather="stop-circle" class="w-4 h-4"></i>
                                    <span>Selesai</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center justify-center space-x-1">
                                    <i data-feather="activity" class="w-4 h-4"></i>
                                    <span>Status</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center justify-center space-x-1">
                                    <i data-feather="settings" class="w-4 h-4"></i>
                                    <span>Aksi</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($ulangans as $ulangan)
                            <tr class="hover:bg-purple-25 transition-colors duration-150 group">


                                <!-- Title -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div>
                                            <h3 class="text-sm font-semibold text-gray-900">{{ $ulangan->judul }}</h3>
                                        </div>
                                    </div>
                                </td>

                                <!-- Class -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $ulangan->kelas->nama ?? '-' }}
                                    </span>
                                </td>


                                <!-- Start Time -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 font-medium">
                                        {{ $ulangan->mulai->timezone('Asia/Jakarta')->format('d M Y') }}
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        {{ $ulangan->mulai->timezone('Asia/Jakarta')->format('H:i') }} WIB
                                    </div>
                                </td>

                                <!-- End Time -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 font-medium">
                                        {{ $ulangan->selesai->timezone('Asia/Jakarta')->format('d M Y') }}
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        {{ $ulangan->selesai->timezone('Asia/Jakarta')->format('H:i') }} WIB
                                    </div>
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="space-y-2">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold
                                            {{ $ulangan->status === 'Sedang Berlangsung' ? 'bg-green-100 text-green-800' :
                                               ($ulangan->status === 'Belum Dimulai' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                            @if($ulangan->status === 'Sedang Berlangsung')
                                                <i data-feather="play-circle" class="w-3 h-3 mr-1"></i>
                                            @elseif($ulangan->status === 'Belum Dimulai')
                                                <i data-feather="clock" class="w-3 h-3 mr-1"></i>
                                            @else
                                                <i data-feather="check-circle" class="w-3 h-3 mr-1"></i>
                                            @endif
                                            {{ $ulangan->status }}
                                        </span>

                                        <div>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold
                                                {{ $ulangan->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                @if($ulangan->is_active)
                                                    <i data-feather="power" class="w-3 h-3 mr-1"></i>
                                                    Aktif
                                                @else
                                                    <i data-feather="pause" class="w-3 h-3 mr-1"></i>
                                                    Nonaktif
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center space-x-2 mb-2">
                                        <!-- View Button -->
                                        <a href="{{ route('ulangans.show', $ulangan) }}"
                                           class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-lg transition-colors duration-200"
                                           title="Lihat Detail">
                                            <i data-feather="eye" class="w-4 h-4"></i>
                                        </a>

                                        <form action="{{ route('ulangans.toggle-active', $ulangan) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                    class="inline-flex items-center justify-center w-8 h-8 {{ $ulangan->is_active ? 'bg-gray-100 hover:bg-gray-200 text-gray-600' : 'bg-green-100 hover:bg-green-200 text-green-600' }} rounded-lg transition-colors duration-200"
                                                    title="Toggle Status">
                                                <i data-feather="{{ $ulangan->is_active ? 'pause' : 'play' }}" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <div class="flex items-center justify-center space-x-2 mb-2">
                                        @if(Auth::user()->hasRole('admin') || $ulangan->created_by == Auth::user()->id)
                                            <!-- Edit Button -->
                                            @if(now() < $ulangan->mulai || now() > $ulangan->selesai)
                                                <a href="{{ route('ulangans.edit', $ulangan) }}"
                                                   class="inline-flex items-center justify-center w-8 h-8 bg-yellow-100 hover:bg-yellow-200 text-yellow-600 rounded-lg transition-colors duration-200"
                                                   title="Edit">
                                                    <i data-feather="edit" class="w-4 h-4"></i>
                                                </a>
                                            @endif

                                            <!-- Toggle Active Button -->


                                            <!-- Delete Button -->
                                            @if(now() < $ulangan->mulai || now() > $ulangan->selesai)
                                                <form action="{{ route('ulangans.destroy', $ulangan) }}" method="POST" class="inline"
                                                      onsubmit="return confirmDelete(event)">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="inline-flex items-center justify-center w-8 h-8 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg transition-colors duration-200"
                                                            title="Hapus">
                                                        <i data-feather="trash-2" class="w-4 h-4"></i>
                                                    </button>
                                                </form>
                                                <script>
                                                    function confirmDelete(event) {
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: 'Yakin ingin menghapus ulangan ini?',
                                                            text: "Data yang dihapus tidak dapat dikembalikan!",
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            cancelButtonColor: '#d33',
                                                            confirmButtonText: 'Ya, hapus!'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                event.target.submit();
                                                            }
                                                        })
                                                    }
                                                </script>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center">
                                            <i data-feather="inbox" class="w-8 h-8 text-purple-400"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                                @if(request()->has('search'))
                                                    Pencarian tidak ditemukan
                                                @else
                                                    Belum Ada Ulangan
                                                @endif
                                            </h3>
                                            <p class="text-gray-500 text-sm">
                                                @if(request()->has('search'))
                                                    Pencarian tidak ditemukan, silahkan coba lagi.
                                                @else
                                                    Tidak ada data ulangan yang tersedia.
                                                @endif
                                            </p>
                                        </div>
                                        @if(!request()->has('search') && !request()->has('filter'))
                                            @role('guru|admin')
                                                <a href="{{ route('ulangans.create') }}"
                                                   class="inline-flex items-center px-4 py-2 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition-colors duration-200">
                                                    <i data-feather="plus" class="w-4 h-4 mr-2"></i>
                                                    Buat Ulangan Pertama
                                                </a>
                                            @endrole
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($ulangans->hasPages())
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Menampilkan {{ $ulangans->firstItem() }} - {{ $ulangans->lastItem() }}
                            dari {{ $ulangans->total() }} hasil
                        </div>
                        <div class="flex items-center space-x-2">
                            {{ $ulangans->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    // Initialize Feather Icons
    feather.replace();

    // Auto hide alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.animate-pulse');
        alerts.forEach(function(alert) {
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';
            setTimeout(function() {
                alert.style.display = 'none';
            }, 300);
        });
    }, 5000);
</script>
@endsection
