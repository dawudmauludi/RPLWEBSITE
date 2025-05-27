@extends('layouts.masterDashboard')

@section('title', 'Detail Ulangan')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-white to-indigo-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Detail Ulangan</h1>
                    <p class="text-gray-600">Informasi lengkap mengenai ulangan yang dipilih</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-3">
                    @if(auth()->user()->hasRole('siswa'))
                        <a href="{{ route('ulangans.my-ulangans') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                            <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
                            Kembali
                        </a>

                    @else
                        <a href="{{ route('ulangans.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                            <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
                            Kembali
                        </a>
                        @if(auth()->user()->hasRole('admin') || $ulangan->created_by == auth()->id())
                            @if(\Carbon\Carbon::now() < $ulangan->mulai)
                                <a href="{{ route('ulangans.edit', $ulangan) }}"
                                   class="inline-flex items-center px-4 py-2 bg-amber-100 hover:bg-amber-200 text-amber-700 rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                                    <i data-feather="edit-3" class="w-4 h-4 mr-2"></i>
                                    Edit
                                </a>
                            @endif
                            <form action="{{ route('ulangans.toggle-active', $ulangan) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 {{ $ulangan->is_active ? 'bg-red-100 hover:bg-red-200 text-red-700' : 'bg-green-100 hover:bg-green-200 text-green-700' }} rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                                    <i data-feather="{{ $ulangan->is_active ? 'pause' : 'play' }}" class="w-4 h-4 mr-2"></i>
                                    {{ $ulangan->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                </button>
                            </form>
                        @endif
                    @endif
                </div>
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

        <!-- Status Badges -->
        <div class="mb-8 flex flex-wrap gap-3">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium
                {{ $ulangan->status == 'Sedang Berlangsung' ? 'bg-green-100 text-green-800 border border-green-200' :
                   ($ulangan->status == 'Belum Dimulai' ? 'bg-yellow-100 text-yellow-800 border border-yellow-200' :
                   'bg-gray-100 text-gray-800 border border-gray-200') }}">
                <i data-feather="clock" class="w-4 h-4 mr-2"></i>
                {{ $ulangan->status }}
            </span>

            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium
                {{ $ulangan->is_active ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200' }}">
                <i data-feather="{{ $ulangan->is_active ? 'check-circle' : 'x-circle' }}" class="w-4 h-4 mr-2"></i>
                {{ $ulangan->is_active ? 'Aktif' : 'Nonaktif' }}
            </span>


            @if(auth()->user()->hasRole('siswa') && $ulangan->is_available)
            <button onclick="window.open('{{ route('ulangans.access', $ulangan) }}', '_blank')"
             class="w-full bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded-md text-sm font-medium flex items-center justify-center ">
                <i data-feather="play" class="w-4 h-4 mr-2"></i>
                Mulai Ulangan
            </button>
            @else
            <button disabled
                    class="w-full bg-gray-200 text-gray-500 py-2 px-4 rounded-md text-sm font-medium flex items-center justify-center cursor-not-allowed">
                        <i data-feather="lock" class="mr-1 w-4 h-4"></i>
                        Tidak Tersedia
            </button>
            @endif

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Information -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl border border-purple-100 overflow-hidden">
                    <div class="flex items-center bg-primary px-8 py-6">
                        <i data-feather="info" class="w-5 h-5 mr-2 text-white"></i>
                        <h1 class="text-2xl font-bold text-white">Info Ulangan</h1>
                    </div>

                    <div class="p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $ulangan->judul }}</h2>
                        <p class="text-gray-600 mb-4">{{ $ulangan->deskripsi }}</p>
                        <!-- Info Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="flex items-center space-x-3 p-4 bg-purple-50 rounded-lg">
                                <div class="flex-shrink-0">
                                    <i data-feather="users" class="w-5 h-5 text-purple-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Kelas</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ $ulangan->kelas->nama ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3 p-4 bg-indigo-50 rounded-lg">
                                <div class="flex-shrink-0">
                                    <i data-feather="user" class="w-5 h-5 text-indigo-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Pembuat</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ $ulangan->creator->nama ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3 p-4 bg-green-50 rounded-lg">
                                <div class="flex-shrink-0">
                                    <i data-feather="play-circle" class="w-5 h-5 text-green-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Waktu Mulai</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ $ulangan->mulai->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3 p-4 bg-red-50 rounded-lg">
                                <div class="flex-shrink-0">
                                    <i data-feather="stop-circle" class="w-5 h-5 text-red-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Waktu Selesai</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ $ulangan->selesai->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="flex items-center space-x-3 p-4 bg-amber-50 rounded-lg mb-6">
                            <div class="flex-shrink-0">
                                <i data-feather="clock" class="w-5 h-5 text-amber-600"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Durasi</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $ulangan->mulai->diffForHumans($ulangan->selesai, true) }}</p>
                            </div>
                        </div>
                        @if(!auth()->user()->hasRole('siswa'))
                        <!-- Link Section -->
                        <div class="border-t border-gray-200 pt-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <i data-feather="link" class="w-5 h-5 text-purple-600"></i>
                                    <span class="font-medium text-gray-900">Link Ulangan</span>
                                </div>
                                <a href="{{ $ulangan->link }}" target="_blank"
                                   class="inline-flex items-center px-4 py-2 bg-purple-100 hover:bg-purple-200 text-purple-700 rounded-lg transition-all duration-200">
                                    <i data-feather="external-link" class="w-4 h-4 mr-2"></i>
                                    Buka Link
                                </a>
                            </div>
                        </div>
                        @endif

                        <!-- Timestamps -->
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-500">
                                <div class="flex items-center space-x-2">
                                    <i data-feather="calendar" class="w-4 h-4"></i>
                                    <span>Dibuat: {{ $ulangan->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i data-feather="edit" class="w-4 h-4"></i>
                                    <span>Diupdate: {{ $ulangan->updated_at->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-xl border border-purple-100 overflow-hidden">
                    <div class=" bg-primary px-6 py-4">
                        <h3 class="text-lg font-semibold text-white flex items-center">
                            <i data-feather="info" class="w-5 h-5 mr-2"></i>
                            Informasi Tambahan
                        </h3>
                    </div>

                    <div class="p-6 space-y-6">
                        <!-- Countdown Timer -->
                        @if($ulangan->status == 'Belum Dimulai')
                        <div class="bg-gradient-to-br from-yellow-50 to-amber-50 border border-yellow-200 rounded-lg p-4">
                            <div class="flex items-center mb-2">
                                <i data-feather="clock" class="w-5 h-5 text-yellow-600 mr-2"></i>
                                <h4 class="font-semibold text-yellow-800">Mulai dalam:</h4>
                            </div>
                            <div id="countdown-start" class="text-2xl font-bold text-yellow-900" data-target="{{ $ulangan->mulai->toISOString() }}">
                                {{ $ulangan->mulai->diffForHumans() }}
                            </div>
                        </div>
                        @elseif($ulangan->status == 'Sedang Berlangsung')
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-200 rounded-lg p-4">
                            <div class="flex items-center mb-2">
                                <i data-feather="clock" class="w-5 h-5 text-green-600 mr-2"></i>
                                <h4 class="font-semibold text-green-800">Berakhir dalam:</h4>
                            </div>
                            <div id="countdown-end" class="text-2xl font-bold text-green-900" data-target="{{ $ulangan->selesai->toISOString() }}">
                                {{ $ulangan->selesai->diffForHumans() }}
                            </div>
                        </div>
                        @else
                        <div class="bg-gradient-to-br from-gray-50 to-slate-50 border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center mb-2">
                                <i data-feather="flag" class="w-5 h-5 text-gray-600 mr-2"></i>
                                <h4 class="font-semibold text-gray-800">Ulangan Selesai</h4>
                            </div>
                            <p class="text-gray-600">Berakhir {{ $ulangan->selesai->diffForHumans() }}</p>
                        </div>
                        @endif

                        <!-- Instructions for Students -->
                        @if(auth()->user()->hasRole('siswa'))
                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                            <h4 class="font-semibold text-purple-800 mb-3 flex items-center">
                                <i data-feather="book-open" class="w-5 h-5 mr-2"></i>
                                Petunjuk
                            </h4>
                            <ul class="space-y-2 text-sm text-purple-700">
                                <li class="flex items-start">
                                    <i data-feather="wifi" class="w-4 h-4 mr-2 mt-0.5 text-purple-500"></i>
                                    Pastikan koneksi internet stabil
                                </li>
                                <li class="flex items-start">
                                    <i data-feather="pen-tool" class="w-4 h-4 mr-2 mt-0.5 text-purple-500"></i>
                                    Siapkan peralatan tulis jika diperlukan
                                </li>
                                <li class="flex items-start">
                                    <i data-feather="play" class="w-4 h-4 mr-2 mt-0.5 text-purple-500"></i>
                                    Klik "Mulai Ulangan" saat waktu dimulai
                                </li>
                                <li class="flex items-start">
                                    <i data-feather="check" class="w-4 h-4 mr-2 mt-0.5 text-purple-500"></i>
                                    Selesaikan sebelum waktu berakhir
                                </li>
                                @if($ulangan->is_available)
                                <a href="{{ route('ulangans.access', $ulangan) }}" target="_blank"
                                class="inline-flex items-center px-6 py-2 bg-primary hover:bg-primary-dark text-white rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5  w-full text-center">
                                    <i data-feather="play" class="w-4 h-4 mr-2"></i>
                                    Mulai Ulangan
                                </a>
                              @endif
                            </ul>
                        </div>
                        @endif

                        <!-- Admin/Teacher Tools -->
                       @if(!auth()->user()->hasRole('siswa'))
                        <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-6 shadow-md space-y-4">
                            <h4 class="text-lg font-semibold text-indigo-800 flex items-center mb-2">
                                <i data-feather="settings" class="w-5 h-5 mr-2"></i>
                                Aksi Cepat
                            </h4>

                            <div class="flex flex-col space-y-3">
                                @if(Auth::user()->hasRole('guru'))
                                    <form action="{{ route('nilai.store', $ulangan->id) }}" method="POST" class="w-full">
                                        @csrf
                                        <button type="submit"
                                            class="w-full inline-flex justify-center items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition">
                                            <i data-feather="plus-circle" class="w-4 h-4"></i>
                                            Buat Nilai
                                        </button>
                                    </form>

                                    <a href="{{ route('nilai.show', $ulangan->id) }}"
                                    class="w-full inline-flex justify-center items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg transition">
                                        <i data-feather="eye" class="w-4 h-4"></i>
                                        Lihat Nilai
                                    </a>
                                @endif

                                @if(\Carbon\Carbon::now('Asia/Jakarta') < $ulangan->mulai)
                                    <button onclick="copyToClipboard('{{ route('ulangans.show', $ulangan) }}')"
                                        class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-purple-100 hover:bg-purple-200 text-purple-700 font-medium rounded-lg transition">
                                        <i data-feather="copy" class="w-4 h-4"></i>
                                        Salin Link Detail
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/feather-icons"></script>
<script>
// Initialize Feather Icons
feather.replace();

// Countdown Timer
function updateCountdown(elementId, targetDate) {
    const element = document.getElementById(elementId);
    if (!element) return;

    const target = new Date(targetDate).getTime();

    const timer = setInterval(() => {
        const now = new Date().getTime();
        const distance = target - now;

        if (distance < 0) {
            element.innerHTML = "Waktu habis!";
            clearInterval(timer);
            location.reload(); // Refresh page when time is up
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        let display = '';
        if (days > 0) display += days + "h ";
        if (hours > 0) display += hours + "j ";
        display += minutes + "m " + seconds + "s";

        element.innerHTML = display;
    }, 1000);
}

// Initialize countdowns
document.addEventListener('DOMContentLoaded', function() {
    const countdownStart = document.getElementById('countdown-start');
    const countdownEnd = document.getElementById('countdown-end');

    if (countdownStart) {
        updateCountdown('countdown-start', countdownStart.dataset.target);
    }

    if (countdownEnd) {
        updateCountdown('countdown-end', countdownEnd.dataset.target);
    }
});

// Copy to clipboard function
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        const notification = document.createElement('div');
        notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300';
        notification.innerHTML = '<i data-feather="check" class="w-4 h-4 inline mr-2"></i>Link berhasil disalin!';
        document.body.appendChild(notification);

        feather.replace();

        setTimeout(() => {
            notification.remove();
        }, 3000);
    }).catch(() => {
        alert('Gagal menyalin link ke clipboard!');
    });
}
</script>
@endsection
