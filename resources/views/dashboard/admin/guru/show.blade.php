@extends('layouts.masterDashboard')

@section('title', 'Detail Guru')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 to-indigo-100 p-6">
    <div class="max-w-6xl mx-auto">

        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center space-x-3">
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <i data-feather="user" class="w-8 h-8 text-purple-600"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800">Detail Guru</h1>
                        <p class="text-gray-600 mt-1">Informasi lengkap data guru</p>
                    </div>
                </div>

                <div class="flex space-x-3">
                    <a href="{{ route('admin.guru.edit', $guru->id) }}"
                       class="inline-flex items-center space-x-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i data-feather="edit-2" class="w-4 h-4"></i>
                        <span>Edit Data</span>
                    </a>

                    <a href="{{ route('admin.guru.index') }}"
                       class="inline-flex items-center space-x-2 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white px-4 py-2 rounded-lg font-medium transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i data-feather="arrow-left" class="w-4 h-4"></i>
                        <span>Kembali</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

            <!-- Profile Photo Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-6">
                    <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                        <h2 class="text-lg font-bold text-white flex items-center">
                            <i data-feather="image" class="w-5 h-5 mr-2"></i>
                            Foto Profil
                        </h2>
                    </div>

                    <div class="p-6 text-center">
                        @if($guru->foto)
                            <div class="relative inline-block">
                                <img src="{{ asset('storage/' . $guru->foto) }}"
                                     alt="Foto {{ $guru->nama }}"
                                     class="w-32 h-32 lg:w-40 lg:h-40 rounded-xl object-cover border-4 border-purple-200 shadow-lg mx-auto">
                                <div class="absolute -bottom-2 -right-2 bg-green-500 text-white p-1.5 rounded-full shadow-lg">
                                    <i data-feather="check" class="w-3 h-3"></i>
                                </div>
                            </div>
                            <p class="text-xs text-gray-600 mt-3">Foto tersedia</p>
                        @else
                            <div class="w-32 h-32 lg:w-40 lg:h-40 rounded-xl bg-gradient-to-br from-purple-100 to-purple-200 flex items-center justify-center mx-auto border-4 border-purple-200 shadow-lg">
                                <div class="text-center">
                                    <i data-feather="user" class="w-12 h-12 text-purple-400 mx-auto mb-2"></i>
                                    <p class="text-purple-600 font-medium text-sm">No Photo</p>
                                </div>
                            </div>
                            <div class="mt-3 p-2 bg-amber-50 rounded-lg border border-amber-200">
                                <div class="flex items-center justify-center">
                                    <i data-feather="alert-triangle" class="w-4 h-4 text-amber-500 mr-1"></i>
                                    <p class="text-xs text-amber-700">Foto belum tersedia</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Information Cards -->
            <div class="lg:col-span-3 space-y-6">

                <!-- Personal Information -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <i data-feather="user" class="w-5 h-5 mr-2"></i>
                            Informasi Personal
                        </h2>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3">
                                    <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                        <i data-feather="type" class="w-5 h-5 text-purple-600"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-500">Nama Lengkap</p>
                                        <p class="text-lg font-semibold text-gray-900 break-words">{{ $guru->nama }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                        <i data-feather="hash" class="w-5 h-5 text-purple-600"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-500">NIP</p>
                                        <p class="text-lg font-semibold text-gray-900 font-mono break-all">
                                            {{ $guru->nip ?: '-' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                        <i data-feather="users" class="w-5 h-5 text-purple-600"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-500">Jenis Kelamin</p>
                                        <div class="flex items-center mt-1">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                {{ $guru->jenkel == 'Laki-laki' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                                <i data-feather="user" class="w-4 h-4 mr-1"></i>
                                                {{ $guru->jenkel }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="flex items-start space-x-3">
                                    <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                        <i data-feather="map" class="w-5 h-5 text-purple-600"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-500">Tempat Lahir</p>
                                        <p class="text-lg font-semibold text-gray-900 break-words">
                                            {{ $guru->tempat_lahir ?: '-' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                        <i data-feather="calendar" class="w-5 h-5 text-purple-600"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-500">Tanggal Lahir</p>
                                        <p class="text-lg font-semibold text-gray-900">
                                            @if($guru->tanggal_lahir)
                                                {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->translatedFormat('d F Y') }}
                                                <span class="text-sm text-gray-500 font-normal block sm:inline">
                                                    ({{ \Carbon\Carbon::parse($guru->tanggal_lahir)->age }} tahun)
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3">
                                    <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                        <i data-feather="heart" class="w-5 h-5 text-purple-600"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-500">Agama</p>
                                        <p class="text-lg font-semibold text-gray-900">
                                            {{ $guru->agama ?: '-' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <i data-feather="phone" class="w-5 h-5 mr-2"></i>
                            Informasi Kontak
                        </h2>
                    </div>

                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                    <i data-feather="smartphone" class="w-5 h-5 text-purple-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-500">Nomor Telepon</p>
                                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 mt-1">
                                        @if($guru->telepon)
                                            <p class="text-lg font-semibold text-gray-900 font-mono break-all">{{ $guru->telepon }}</p>
                                            <a href="tel:{{ $guru->telepon }}"
                                               class="inline-flex items-center px-3 py-1 bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition-colors duration-150 text-sm flex-shrink-0">
                                                <i data-feather="phone-call" class="w-4 h-4 mr-1"></i>
                                                <span>Hubungi</span>
                                            </a>
                                        @else
                                            <p class="text-lg text-gray-400">Tidak tersedia</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                    <i data-feather="map-pin" class="w-5 h-5 text-purple-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-500">Alamat Lengkap</p>
                                    <div class="mt-1">
                                        @if($guru->alamat)
                                            <p class="text-lg text-gray-900 leading-relaxed break-words">{{ $guru->alamat }}</p>
                                            <a href="https://maps.google.com/?q={{ urlencode($guru->alamat) }}"
                                               target="_blank"
                                               class="mt-2 inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors duration-150 text-sm">
                                                <i data-feather="map" class="w-4 h-4 mr-1"></i>
                                                <span>Lihat di Maps</span>
                                            </a>
                                        @else
                                            <p class="text-lg text-gray-400">Alamat tidak tersedia</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account Information -->
                @if(isset($guru->user))
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <i data-feather="shield" class="w-5 h-5 mr-2"></i>
                            Informasi Akun
                        </h2>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-start space-x-3">
                                <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                    <i data-feather="user" class="w-5 h-5 text-purple-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-500">Nama User</p>
                                    <p class="text-lg font-semibold text-gray-900 break-words">{{ $guru->user->nama }}</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="bg-purple-100 p-2 rounded-lg flex-shrink-0">
                                    <i data-feather="mail" class="w-5 h-5 text-purple-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-500">Email</p>
                                    <p class="text-lg font-semibold text-gray-900 break-all">{{ $guru->user->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-8 bg-white rounded-xl shadow-lg p-6">
            <div class="flex flex-wrap gap-3 justify-center">
            <a href="{{ route('admin.guru.edit', $guru->id) }}"
               class="inline-flex items-center space-x-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <i data-feather="edit-2" class="w-5 h-5"></i>
                <span>Edit Data Guru</span>
            </a>

            <form id="deleteGuruForm" action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="button"
                onclick="confirmDeleteGuru()"
                class="inline-flex items-center space-x-2 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <i data-feather="trash-2" class="w-5 h-5"></i>
                <span>Hapus Data Guru</span>
                </button>
            </form>

            <a href="{{ route('admin.guru.index') }}"
               class="inline-flex items-center space-x-2 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <i data-feather="list" class="w-5 h-5"></i>
                <span>Kembali ke Daftar</span>
            </a>
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof feather !== 'undefined') {
        feather.replace();
    }
});
</script>
<script>
    function confirmDeleteGuru() {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data guru ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteGuruForm').submit();
            }
        });
    }
</script>

@endsection

