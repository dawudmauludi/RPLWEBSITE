@extends('layouts.masterDashboard')

@section('title', 'Dashboard Jobs')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 to-indigo-100 p-6">
    <div class="max-w-7xl mx-auto">

        <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border-l-4 border-purple-500">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center space-x-3 mb-4 md:mb-0">
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <i data-feather="briefcase" class="w-8 h-8 text-purple-600"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Daftar Lowongan Kerja</h1>
                        <p class="text-gray-600 mt-1">Kelola data lowongan kerja dengan sistem</p>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 w-full md:w-auto">
                    <form method="GET" action="{{ route('admin.jobs.index') }}" id="searchForm" autocomplete="off" class="w-full sm:w-auto">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-feather="search" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input type="text"
                                name="search"
                                id="searchInput"
                                value="{{ request('search') }}"
                                placeholder="Cari berdasarkan nama pekerjaan, perusahaan"
                                class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 text-gray-900 placeholder-gray-500">
                        </div>
                    </form>
                    <div class="flex gap-2">
                        <select name="filter_tipe" id="filterTipe" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200">
                            <option value="">Semua Tipe</option>
                            <option value="Magang">Magang</option>
                            <option value="Paruh Waktu">Paruh Waktu</option>
                            <option value="Penuh Waktu">Penuh Waktu</option>
                            <option value="Harian">Harian</option>
                            <option value="Kontrak">Kontrak</option>
                            <option value="Freelance">Freelance</option>
                        </select>
                        <a href="{{ route('admin.jobs.create') }}"
                            class="inline-flex items-center space-x-2 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i data-feather="plus" class="w-5 h-5"></i>
                            <span>Tambah Lowongan</span>
                        </a>
                    </div>
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
                        confirmButtonColor: '#2563eb'
                    });
                });
            </script>
        @endif

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div id="jobTable">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-purple-600 to-purple-700">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <i data-feather="briefcase" class="w-4 h-4"></i>
                                        <span>Pekerjaan</span>
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <i data-feather="building" class="w-4 h-4"></i>
                                        <span>Perusahaan</span>
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <i data-feather="map-pin" class="w-4 h-4"></i>
                                        <span>Lokasi</span>
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <i data-feather="dollar-sign" class="w-4 h-4"></i>
                                        <span>Gaji</span>
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <i data-feather="tag" class="w-4 h-4"></i>
                                        <span>Tipe</span>
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <i data-feather="home" class="w-4 h-4"></i>
                                        <span>Tempat</span>
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <i data-feather="clock" class="w-4 h-4"></i>
                                        <span>Waktu</span>
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
                            @foreach($jobs as $job)
                            <tr class="hover:bg-purple-50 transition-colors duration-150">
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0 w-12 h-12">
                                            <img class="w-12 h-12 rounded-lg object-cover border-2 border-gray-200" 
                                                 src="{{ asset('storage/' . $job->image) }}" 
                                                 alt="{{ $job->nama_pekerjaan }}"
                                                 onerror="this.src='https://via.placeholder.com/48x48/3B82F6/FFFFFF?text=JOB'">
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-gray-900">{{ Str::limit($job->nama_pekerjaan, 20) }}</div>
                                            <div class="text-sm text-gray-500">{{ $job->slug }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $job->nama_perusahaan }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i data-feather="map-pin" class="w-4 h-4 mr-1 text-gray-400"></i>
                                        {{ $job->lokasi }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-green-600">{{ $job->gaji }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                        {{ $job->tipe_pekerjaan == 'Penuh Waktu' ? 'bg-green-100 text-green-800' : 
                                           ($job->tipe_pekerjaan == 'Paruh Waktu' ? 'bg-purple-100 text-purple-800' : 
                                           ($job->tipe_pekerjaan == 'Magang' ? 'bg-yellow-100 text-yellow-800' : 
                                           ($job->tipe_pekerjaan == 'Kontrak' ? 'bg-purple-100 text-purple-800' : 
                                           ($job->tipe_pekerjaan == 'Freelance' ? 'bg-pink-100 text-pink-800' : 'bg-gray-100 text-gray-800')))) }}">
                                        {{ $job->tipe_pekerjaan }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                        {{ $job->tempat_kerja == 'WFH' ? 'bg-purple-100 text-purple-800' : 'bg-orange-100 text-orange-800' }}">
                                        <i data-feather="{{ $job->tempat_kerja == 'WFH' ? 'wifi' : 'building' }}" class="w-3 h-3 mr-1"></i>
                                        {{ $job->tempat_kerja }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-600">{{ $job->waktu_pekerjaan }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ $job->link_pendaftaran }}" target="_blank"
                                           class="inline-flex items-center px-3 py-1.5 bg-green-100 hover:bg-green-200 text-green-700 rounded-lg transition-colors duration-150"
                                           title="Lihat Detail">
                                            <i data-feather="external-link" class="w-4 h-4"></i>
                                        </a>
                                        <a href="{{ route('admin.jobs.show', $job->id) }}"
                                           class="inline-flex items-center px-3 py-1.5 bg-indigo-100 hover:bg-indigo-200 text-indigo-700 rounded-lg transition-colors duration-150"
                                           title="Detail">
                                            <i data-feather="eye" class="w-4 h-4"></i>
                                        </a>
                                        <a href="{{ route('admin.jobs.edit', $job->id) }}"
                                           class="inline-flex items-center px-3 py-1.5 bg-purple-100 hover:bg-purple-200 text-purple-700 rounded-lg transition-colors duration-150"
                                           title="Edit Data">
                                            <i data-feather="edit-2" class="w-4 h-4"></i>
                                        </a>
                                        <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" class="inline delete-job-form">
                                            @csrf @method('DELETE')
                                            <button type="button"
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg transition-colors duration-150 delete-job-btn"
                                                    data-nama="{{ $job->nama_pekerjaan }}"
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

                    @if($jobs->isEmpty())
                    <div class="text-center py-12">
                        <div class="flex flex-col items-center">
                            <div class="bg-purple-100 p-6 rounded-full mb-4">
                                <i data-feather="briefcase" class="w-12 h-12 text-purple-600"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak ada data lowongan kerja</h3>
                            <p class="text-gray-600 mb-4">Belum ada lowongan kerja yang terdaftar dalam sistem</p>
                            <a href="{{ route('admin.jobs.create') }}"
                               class="inline-flex items-center space-x-2 bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                                <i data-feather="plus" class="w-4 h-4"></i>
                                <span>Tambah Lowongan Pertama</span>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Pagination -->
            @if($jobs->hasPages())
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="flex-1 flex justify-between sm:hidden">
                        @if ($jobs->onFirstPage())
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                Previous
                            </span>
                        @else
                            <a href="{{ $jobs->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-purple-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                Previous
                            </a>
                        @endif

                        @if ($jobs->hasMorePages())
                            <a href="{{ $jobs->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-purple-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                Next
                            </a>
                        @else
                            <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                Next
                            </span>
                        @endif
                    </div>

                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700 leading-5">
                                Showing
                                <span class="font-medium">{{ $jobs->firstItem() }}</span>
                                to
                                <span class="font-medium">{{ $jobs->lastItem() }}</span>
                                of
                                <span class="font-medium">{{ $jobs->total() }}</span>
                                results
                            </p>
                        </div>
                        <div>
                            {{ $jobs->links() }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
// Initialize Feather Icons
document.addEventListener('DOMContentLoaded', function() {
    if (typeof feather !== 'undefined') {
        feather.replace();
    }

    // Delete confirmation
    document.querySelectorAll('.delete-job-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const form = btn.closest('form');
            const nama = btn.getAttribute('data-nama');
            
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Yakin hapus?',
                    text: `Apakah Anda yakin ingin menghapus lowongan "${nama}"?`,
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
                if (confirm(`Apakah Anda yakin ingin menghapus lowongan "${nama}"?`)) {
                    form.submit();
                }
            }
        });
    });
});

// Search functionality
document.getElementById('searchInput').addEventListener('input', function() {
    clearTimeout(this.delay);
    this.delay = setTimeout(() => {
        performSearch();
    }, 400);
});

// Filter functionality
document.getElementById('filterTipe').addEventListener('change', function() {
    performSearch();
});

function performSearch() {
    const searchValue = document.getElementById('searchInput').value;
    const filterValue = document.getElementById('filterTipe').value;
    
    const tableContainer = document.querySelector('#jobTable');
    const originalContent = tableContainer.innerHTML;

    tableContainer.innerHTML = `
        <div class="flex items-center justify-center py-12">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-purple-600"></div>
            <span class="ml-2 text-gray-600">Mencari data...</span>
        </div>
    `;

    const params = new URLSearchParams();
    if (searchValue) params.append('search', searchValue);
    if (filterValue) params.append('filter_tipe', filterValue);

    fetch(`{{ route('admin.jobs.index') }}?${params.toString()}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.text())
    .then(html => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const newTable = doc.querySelector('#jobTable').innerHTML;
        document.querySelector('#jobTable').innerHTML = newTable;

        // Re-initialize Feather icons and event listeners
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
        
        // Re-attach delete event listeners
        document.querySelectorAll('.delete-job-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const form = btn.closest('form');
                const nama = btn.getAttribute('data-nama');
                
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        title: 'Yakin hapus?',
                        text: `Apakah Anda yakin ingin menghapus lowongan "${nama}"?`,
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
                    if (confirm(`Apakah Anda yakin ingin menghapus lowongan "${nama}"?`)) {
                        form.submit();
                    }
                }
            });
        });
    })
    .catch(error => {
        console.error('Error:', error);
        tableContainer.innerHTML = originalContent;
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
}
</script>

@endsection