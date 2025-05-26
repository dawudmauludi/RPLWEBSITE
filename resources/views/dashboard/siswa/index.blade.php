    @extends('layouts.masterDashboard')

    @section('title', 'Dashboard siswa')

    @section('content')
        <div class="min-h-screen bg-gradient-to-br from-purple-50 to-indigo-100 py-8">
            <div class="container mx-auto px-4">
                <div class="mb-8">
                    <h1 class="text-4xl font-bold text-gray-800 mb-2">Dashboard Siswa</h1>
                    <p class="text-gray-600">Selamat datang! Berikut adalah ringkasan aktivitas Anda</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center">
                            <div class="p-3 bg-purple-100 rounded-full">
                                <i data-feather="book-open" class="w-6 h-6 text-purple-600"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-2xl font-bold text-gray-800">{{ $karyaSaya->count() }}</h3>
                                <p class="text-gray-600">Total Karya</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-indigo-500 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center">
                            <div class="p-3 bg-indigo-100 rounded-full">
                                <i data-feather="calendar" class="w-6 h-6 text-indigo-600"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-2xl font-bold text-gray-800">{{ $ulanganKelas->count() }}</h3>
                                <p class="text-gray-600">Ulangan Mendatang</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-violet-500 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center">
                            <div class="p-3 bg-violet-100 rounded-full">
                                <i data-feather="bell" class="w-6 h-6 text-violet-600"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-2xl font-bold text-gray-800">{{ $beritaHariIni->count() }}</h3>
                                <p class="text-gray-600">Berita Hari Ini</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="bg-primary px-6 py-4">
                            <div class="flex items-center text-white">
                                <i data-feather="folder" class="w-5 h-5 mr-3"></i>
                                <h3 class="text-lg font-semibold">Karya Saya</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            @if($karyaSaya->isEmpty())
                                <div class="text-center py-8">
                                    <i data-feather="file-x" class="w-12 h-12 text-gray-400 mx-auto mb-3"></i>
                                    <p class="text-gray-500">Belum ada karya yang dibuat</p>
                                    <button class="mt-3 px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-200">
                                        <i data-feather="plus" class="w-4 h-4 inline mr-2"></i>Buat Karya Baru
                                    </button>
                                </div>
                            @else
                                <div class="space-y-3 max-h-64 overflow-y-auto">
                                    @foreach($karyaSaya as $karya)
                                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-purple-50 transition-colors duration-200">
                                            <div class="flex items-center">
                                                <div class="p-2 bg-purple-100 rounded-lg mr-3">
                                                    <i data-feather="edit-3" class="w-4 h-4 text-purple-600"></i>
                                                </div>
                                                <div>
                                                    <h4 class="font-medium text-gray-800">{{ $karya->judul }}</h4>
                                                    <p class="text-sm text-gray-500">{{ $karya->created_at->format('d M Y') }}</p>
                                                </div>
                                            </div>
                                            <button class="p-2 text-gray-400 hover:text-purple-600 transition-colors duration-200">
                                                <i data-feather="external-link" class="w-4 h-4"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="bg-primary px-6 py-4">
                            <div class="flex items-center text-white">
                                <i data-feather="clipboard" class="w-5 h-5 mr-3"></i>
                                <h3 class="text-lg font-semibold">Ulangan Kelas Saya</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            @if($ulanganKelas->isEmpty())
                                <div class="text-center py-8">
                                    <i data-feather="calendar-x" class="w-12 h-12 text-gray-400 mx-auto mb-3"></i>
                                    <p class="text-gray-500">Tidak ada ulangan yang akan datang</p>
                                </div>
                            @else
                                <div class="space-y-3 max-h-64 overflow-y-auto">
                                    @foreach($ulanganKelas as $ulangan)
                                        <div class="p-3 bg-gray-50 rounded-lg hover:bg-indigo-50 transition-colors duration-200">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center">
                                                    <div class="p-2 bg-indigo-100 rounded-lg mr-3">
                                                        <i data-feather="clock" class="w-4 h-4 text-indigo-600"></i>
                                                    </div>
                                                    <div>
                                                        <h4 class="font-medium text-gray-800">{{ $ulangan->judul }}</h4>
                                                        <p class="text-sm text-gray-500">
                                                            <i data-feather="calendar" class="w-3 h-3 inline mr-1"></i>
                                                            {{ \Carbon\Carbon::parse($ulangan->mulai)->timezone('Asia/Jakarta')->format('d M Y H:i') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <span id="countdown-{{ $loop->index }}"
                                                    class="px-3 py-1 bg-indigo-100 text-indigo-700 text-xs font-medium rounded-full"
                                                    data-target="{{ $ulangan->mulai->toISOString() }}"
                                                    data-end="{{ $ulangan->selesai->toISOString() }}">
                                                    <span class="countdown-segera">{{ $ulangan->mulai->diffForHumans() }}</span>
                                                </span>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="bg-primary px-6 py-4">
                            <div class="flex items-center text-white">
                                <i data-feather="file-text" class="w-5 h-5 mr-3"></i>
                                <h3 class="text-lg font-semibold">Berita Hari Ini</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            @if($beritaHariIni->isEmpty())
                                <div class="text-center py-8">
                                    <i data-feather="info" class="w-12 h-12 text-gray-400 mx-auto mb-3"></i>
                                    <p class="text-gray-500">Tidak ada berita hari ini</p>
                                </div>
                            @else
                                <div class="space-y-4 max-h-64 overflow-y-auto">
                                    @foreach($beritaHariIni as $berita)
                                        <div class="p-3 bg-gray-50 rounded-lg hover:bg-violet-50 transition-colors duration-200">
                                            <div class="flex items-start">
                                                <div class="p-2 bg-violet-100 rounded-lg mr-3 mt-1">
                                                    <i data-feather="message-circle" class="w-4 h-4 text-violet-600"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <h4 class="font-medium text-gray-800 mb-1">{{ $berita->judul }}</h4>
                                                    <p class="text-sm text-gray-500">
                                                        <i data-feather="clock" class="w-3 h-3 inline mr-1"></i>
                                                        {{ $berita->created_at->timezone('Asia/Jakarta')->format('H:i') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="bg-primary px-6 py-4">
                        <div class="flex items-center text-white">
                            <i data-feather="bar-chart-2" class="w-5 h-5 mr-3"></i>
                            <h3 class="text-lg font-semibold">Statistik Karya Saya</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="relative h-[300px]">
                            <canvas id="karyaChart"></canvas>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        window.addEventListener('load', function () {
            const labels = @json($karyaPerBulan->pluck('bulan'));
            const data = @json($karyaPerBulan->pluck('jumlah'));

            console.log("Labels:", labels);
            console.log("Data:", data);

            const ctx = document.getElementById('karyaChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Karya per Bulan',
                        data: data,
                        backgroundColor: 'rgba(147, 51, 234, 0.7)',
                        borderColor: 'rgba(147, 51, 234, 1)',
                        borderWidth: 2,
                        borderRadius: 8,
                        borderSkipped: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(55, 48, 163, 0.9)',
                            titleColor: '#ffffff',
                            bodyColor: '#ffffff',
                            borderColor: 'rgba(147, 51, 234, 1)',
                            borderWidth: 1,
                            cornerRadius: 8,
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#6b7280'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(229, 231, 235, 0.5)'
                            },
                            ticks: {
                                stepSize: 1,
                                color: '#6b7280'
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },
                    animation: {
                        duration: 1000,
                        easing: 'easeInOutQuart'
                    }
                }
            });

            feather.replace();
        });
    </script>
  <script>
    function startCountdowns() {
        const countdownElements = document.querySelectorAll('[id^="countdown-"]');

        countdownElements.forEach(el => {
            const startStr = el.getAttribute('data-target');
            const endStr = el.getAttribute('data-end');

            const startTime = new Date(startStr);
            const endTime = new Date(endStr);

            const countdownText = el.querySelector('.countdown-segera');

            function updateCountdown() {
                const now = new Date();

                if (now < startTime) {
                    const diff = startTime - now;
                    const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
                    const minutes = Math.floor((diff / (1000 * 60)) % 60);
                    const seconds = Math.floor((diff / 1000) % 60);

                    countdownText.innerText = `${hours.toString().padStart(2, '0')}:${minutes
                        .toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                    countdownText.classList.remove("text-green-600", "text-red-600");
                    countdownText.classList.add("text-indigo-700");
                } else if (now >= startTime && now < endTime) {
                    countdownText.innerText = "Sudah Dimulai";
                    countdownText.classList.remove("text-indigo-700", "text-red-600");
                    countdownText.classList.add("text-green-600", "font-semibold");
                } else {
                    countdownText.innerText = "Sudah Berakhir";
                    countdownText.classList.remove("text-indigo-700", "text-green-600");
                    countdownText.classList.add("text-red-600", "font-semibold");
                }
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        });
    }

    document.addEventListener("DOMContentLoaded", startCountdowns);
</script>


@endsection
