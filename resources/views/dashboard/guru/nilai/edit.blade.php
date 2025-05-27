@extends('layouts.masterDashboard')
@section('title', 'Edit Nilai')

@section('content')
    <!-- Include Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <div class="min-h-screen bg-gradient-to-br from-purple-50 via-white to-purple-50 py-8">
        <div class="max-w-7xl mx-auto px-6">
            
            <!-- Header Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-purple-100 p-8 mb-8">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <div class="bg-purple-100 p-3 rounded-xl mr-4">
                            <i data-feather="edit-3" class="w-6 h-6 text-purple-600"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Edit Nilai Ulangan</h1>
                            <p class="text-gray-600 mt-1">Kelola dan perbarui nilai siswa</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <i data-feather="calendar" class="w-4 h-4"></i>
                        <span>{{ date('d M Y') }}</span>
                    </div>
                </div>

                <!-- Exam Info Card -->
                <div class="bg-gradient-to-r from-purple-600 to-purple-700 rounded-xl p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="bg-white/20 p-2 rounded-lg mr-4">
                                <i data-feather="file-text" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold">{{ $ulangan->judul }}</h3>
                                <p class="text-purple-100 text-sm">Ulangan yang akan diedit nilainya</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="bg-white/20 rounded-lg px-3 py-1">
                                <span class="text-sm font-medium">{{ $ulangan->nilaiUlangans->count() }} Siswa</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="bg-white rounded-2xl shadow-lg border border-purple-100 overflow-hidden">
                @if($ulangan->nilaiUlangans->isEmpty())
                    <!-- Empty State -->
                    <div class="p-12 text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-6">
                            <i data-feather="inbox" class="w-10 h-10 text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum Ada Data Nilai</h3>
                        <p class="text-gray-600 mb-6">Tidak ada siswa yang mengikuti ulangan ini atau belum ada nilai yang diinput.</p>
                        <button onclick="history.back()" 
                                class="inline-flex items-center bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-xl font-medium transition-all duration-200">
                            <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
                            Kembali
                        </button>
                    </div>
                @else
                    <form action="{{ route('nilai.bulkUpdate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="ulangan_id" value="{{ $ulangan->id }}">

                        <!-- Table Header -->
                        <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-8 py-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-white">
                                    <i data-feather="users" class="w-5 h-5 mr-3"></i>
                                    <h2 class="text-lg font-semibold">Daftar Nilai Siswa</h2>
                                </div>
                                <div class="flex items-center space-x-4 text-purple-100 text-sm">
                                    <div class="flex items-center">
                                        <i data-feather="user-check" class="w-4 h-4 mr-1"></i>
                                        <span>{{ $ulangan->nilaiUlangans->count() }} siswa</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Table Content -->
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-purple-50 border-b border-purple-100">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-purple-700 uppercase tracking-wider">
                                            <div class="flex items-center">
                                                <i data-feather="hash" class="w-4 h-4 mr-2"></i>
                                                No
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-purple-700 uppercase tracking-wider">
                                            <div class="flex items-center">
                                                <i data-feather="user" class="w-4 h-4 mr-2"></i>
                                                Nama Siswa
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-left text-xs font-semibold text-purple-700 uppercase tracking-wider">
                                            <div class="flex items-center">
                                                <i data-feather="book-open" class="w-4 h-4 mr-2"></i>
                                                Kelas
                                            </div>
                                        </th>
                                        <th class="px-6 py-4 text-center text-xs font-semibold text-purple-700 uppercase tracking-wider">
                                            <div class="flex items-center justify-center">
                                                <i data-feather="star" class="w-4 h-4 mr-2"></i>
                                                Nilai
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach ($ulangan->nilaiUlangans as $index => $nilai)
                                        <tr class="hover:bg-purple-25 transition-colors duration-150 group">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center justify-center w-8 h-8 bg-purple-100 rounded-full text-purple-700 font-semibold text-sm group-hover:bg-purple-200 transition-colors">
                                                    {{ $index + 1 }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm mr-3">
                                                        {{ substr($nilai->user->nama, 0, 1) }}
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-semibold text-gray-900">{{ $nilai->user->nama }}</div>
                                                        <div class="text-xs text-gray-500">Siswa</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700">
                                                    <i data-feather="bookmark" class="w-3 h-3 mr-1"></i>
                                                    {{ $nilai->user->kelas->nama ?? '-' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div class="flex items-center justify-center">
                                                    <div class="relative">
                                                        <input
                                                            type="number"
                                                            name="nilai[{{ $nilai->id }}]"
                                                            value="{{ $nilai->nilai }}"
                                                            class="w-20 h-12 text-center border-2 border-gray-200 rounded-xl font-semibold text-gray-900
                                                                   focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500
                                                                   transition-all duration-200 hover:border-purple-300"
                                                            step="0.01" min="0" max="100"
                                                            required
                                                            placeholder="0-100"
                                                        />
                                                        <div class="absolute -top-2 -right-2 w-4 h-4 bg-purple-500 rounded-full flex items-center justify-center">
                                                            <i data-feather="edit-2" class="w-2 h-2 text-white"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Action Buttons -->
                        <div class="bg-gray-50 px-8 py-6 border-t border-gray-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i data-feather="info" class="w-4 h-4 mr-2"></i>
                                    <span>Pastikan semua nilai sudah benar sebelum menyimpan</span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <button type="button" onclick="history.back()" 
                                            class="inline-flex items-center px-6 py-3 border-2 border-gray-300 rounded-xl text-gray-700 
                                                   font-medium hover:bg-gray-50 hover:border-gray-400 transition-all duration-200">
                                        <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
                                        Batal
                                    </button>
                                    <button type="submit" 
                                            class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-purple-600 to-purple-700 
                                                   hover:from-purple-700 hover:to-purple-800 text-white rounded-xl font-semibold 
                                                   shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
                                        <i data-feather="save" class="w-4 h-4 mr-2"></i>
                                        Simpan Nilai
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>

            <!-- Quick Stats (if not empty) -->
            @if(!$ulangan->nilaiUlangans->isEmpty())
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    <div class="bg-white rounded-xl shadow-md border border-purple-100 p-6">
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-3 rounded-xl mr-4">
                                <i data-feather="users" class="w-6 h-6 text-blue-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Total Siswa</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $ulangan->nilaiUlangans->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-md border border-purple-100 p-6">
                        <div class="flex items-center">
                            <div class="bg-green-100 p-3 rounded-xl mr-4">
                                <i data-feather="trending-up" class="w-6 h-6 text-green-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Nilai Tertinggi</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $ulangan->nilaiUlangans->max('nilai') ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-md border border-purple-100 p-6">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-3 rounded-xl mr-4">
                                <i data-feather="bar-chart-2" class="w-6 h-6 text-purple-600"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Rata-rata</p>
                                <p class="text-2xl font-bold text-gray-800">{{ number_format($ulangan->nilaiUlangans->avg('nilai') ?? 0, 1) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Initialize Feather Icons -->
    <script>
        feather.replace();
        
        // Auto-save indication (optional)
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('input', function() {
                this.style.borderColor = '#8b5cf6';
                this.style.backgroundColor = '#faf5ff';
            });
        });
    </script>
@endsection