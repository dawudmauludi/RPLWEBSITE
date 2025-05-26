@extends('layouts.masterDashboard')

@section('title', 'Detail Siswa')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 to-indigo-100 p-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border-t-4 border-purple-500">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
                        <i data-feather="user" class="text-purple-600"></i>
                        Detail Siswa
                    </h1>
                    <p class="text-gray-600 mt-2">Informasi lengkap data siswa</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.siswa.edit', $siswa->id) }}"
                       class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg font-medium transition-all duration-300 shadow-lg hover:shadow-xl flex items-center gap-2">
                        <i data-feather="edit" class="w-4 h-4"></i>
                        Edit
                    </a>
                    <form id="form-hapus-siswa" action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                            onclick="hapusSiswaConfirm()"
                            class="bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white px-4 py-2 rounded-lg font-medium transition-all duration-300 shadow-lg hover:shadow-xl flex items-center gap-2">
                            <i data-feather="trash-2" class="w-4 h-4"></i>
                            Hapus Siswa
                        </button>
                    </form>
                    <a href="{{ route('admin.siswa.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium transition-all duration-300 shadow-lg hover:shadow-xl flex items-center gap-2">
                        <i data-feather="arrow-left" class="w-4 h-4"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="mb-4">
                        @if($siswa->foto)
                            <img src="{{ asset('storage/' . $siswa->foto) }}"
                                 alt="Foto {{ $siswa->nama }}"
                                 class="w-32 h-32 rounded-full object-cover mx-auto border-4 border-purple-200 shadow-lg">
                        @else
                            <div class="w-32 h-32 bg-gradient-to-br from-purple-400 to-indigo-500 rounded-full flex items-center justify-center mx-auto border-4 border-purple-200 shadow-lg">
                                <i data-feather="user" class="w-16 h-16 text-white"></i>
                            </div>
                        @endif
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $siswa->nama }}</h2>
                    <div class="flex items-center justify-center gap-2">
                        <i data-feather="home" class="w-4 h-4 text-indigo-600"></i>
                        <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $siswa->kelas->nama }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-600 to-indigo-600 px-6 py-4">
                        <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                            <i data-feather="info" class="w-5 h-5"></i>
                            Informasi Personal
                        </h3>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i data-feather="user" class="w-4 h-4 text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500 mb-1">Nama Lengkap</p>
                                        <p class="text-gray-800 font-semibold">{{ $siswa->nama }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i data-feather="hash" class="w-4 h-4 text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500 mb-1">NISN</p>
                                        <p class="text-gray-800 font-semibold">{{ $siswa->nisn }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i data-feather="users" class="w-4 h-4 text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500 mb-1">Jenis Kelamin</p>
                                        <div class="flex items-center gap-2">
                                            @if($siswa->jenkel)
                                                <i data-feather="user" class="w-4 h-4 text-blue-500"></i>
                                                <span class="text-blue-700 font-semibold">Laki-laki</span>
                                            @else
                                                <i data-feather="user" class="w-4 h-4 text-pink-500"></i>
                                                <span class="text-pink-700 font-semibold">Perempuan</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i data-feather="phone" class="w-4 h-4 text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500 mb-1">Nomor Telepon</p>
                                        <p class="text-gray-800 font-semibold">
                                            {{ $siswa->telepon ?: '-' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i data-feather="book" class="w-4 h-4 text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500 mb-1">Agama</p>
                                        <p class="text-gray-800 font-semibold">{{ $siswa->agama }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Location & Birth Information -->
                            <div class="space-y-4">
                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i data-feather="map" class="w-4 h-4 text-indigo-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500 mb-1">Tempat Lahir</p>
                                        <p class="text-gray-800 font-semibold">
                                            {{ $siswa->tempat_lahir ?: '-' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i data-feather="calendar" class="w-4 h-4 text-indigo-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500 mb-1">Tanggal Lahir</p>
                                        <p class="text-gray-800 font-semibold">
                                            @if($siswa->tanggal_lahir)
                                                {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d F Y') }}
                                                <span class="text-sm text-gray-500 ml-2">
                                                    ({{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->age }} tahun)
                                                </span>
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i data-feather="home" class="w-4 h-4 text-indigo-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500 mb-1">Kelas</p>
                                        <p class="text-gray-800 font-semibold">{{ $siswa->kelas->nama }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                        <i data-feather="map-pin" class="w-4 h-4 text-indigo-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500 mb-1">Alamat</p>
                                        <p class="text-gray-800 font-semibold">
                                            {{ $siswa->alamat ?: '-' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-purple-600 to-indigo-600 px-6 py-4">
                    <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                        <i data-feather="file-text" class="w-5 h-5"></i>
                        Informasi Akun
                    </h3>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="flex items-center gap-3 p-4 bg-purple-50 rounded-lg border border-purple-200">
                            <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center">
                                <i data-feather="user-check" class="w-5 h-5 text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-purple-600">Email</p>
                                <p class="text-xs text-purple-600">{{ $siswa->user->email }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-green-50 rounded-lg border border-green-200">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                <i data-feather="calendar-plus" class="w-5 h-5 text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-green-600">Tanggal Daftar</p>
                                <p class="text-green-900 font-semibold">
                                    {{ \Carbon\Carbon::parse($siswa->created_at)->format('d M Y') }}
                                </p>
                                <p class="text-xs text-green-600">
                                    {{ \Carbon\Carbon::parse($siswa->created_at)->diffForHumans() }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <i data-feather="edit-3" class="w-5 h-5 text-white"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-blue-600">Terakhir Update</p>
                                <p class="text-blue-900 font-semibold">
                                    {{ \Carbon\Carbon::parse($siswa->updated_at)->format('d M Y') }}
                                </p>
                                <p class="text-xs text-blue-600">
                                    {{ \Carbon\Carbon::parse($siswa->updated_at)->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-6 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('admin.siswa.edit', $siswa->id) }}"
               class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white px-8 py-3 rounded-lg font-medium transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                <i data-feather="edit" class="w-5 h-5"></i>
                Edit Data Siswa
            </a>
            <a href="{{ route('admin.siswa.index') }}"
               class="bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white px-8 py-3 rounded-lg font-medium transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                <i data-feather="arrow-left" class="w-5 h-5"></i>
                Kembali ke Daftar
            </a>
        </div>


    </div>
</div>

<script>
function hapusSiswaConfirm() {
    Swal.fire({
        title: 'Yakin ingin menghapus siswa ini?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e3342f',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('form-hapus-siswa').submit();
        }
    });
}
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });

    document.querySelectorAll('.bg-white').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});

@if($siswa->foto)
document.querySelector('img[alt="Foto {{ $siswa->nama }}"]').addEventListener('click', function() {
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4';
    modal.innerHTML = `
        <div class="relative max-w-2xl max-h-full">
            <img src="{{ asset('storage/' . $siswa->foto) }}"
                 alt="Foto {{ $siswa->nama }}"
                 class="max-w-full max-h-full rounded-lg shadow-2xl">
            <button class="absolute top-4 right-4 text-white bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-75 transition-all duration-200">
                <i data-feather="x" class="w-6 h-6"></i>
            </button>
        </div>
    `;

    document.body.appendChild(modal);
    feather.replace();

    modal.addEventListener('click', function(e) {
        if (e.target === modal || e.target.querySelector('[data-feather="x"]')) {
            document.body.removeChild(modal);
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && document.body.contains(modal)) {
            document.body.removeChild(modal);
        }
    });
});
@endif
</script>
@endsection
