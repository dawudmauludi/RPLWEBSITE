@extends('layouts.master')
@section('title','Profil Siswa')
@section('content')

<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mt-10 mx-auto">
        <!-- Header Card -->
        <div class="bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 rounded-t-2xl lg:rounded-2xl p-8 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"><g fill=\"none\" fill-rule=\"evenodd\"><g fill=\"%23ffffff\" opacity=\"0.4\"><circle cx=\"30\" cy=\"30\" r=\"2\"/></g></svg>');"></div>
            </div>

            <!-- Edit Button -->
            <div class="absolute top-6 right-6">
                <button onclick="openEditModal()" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm border border-white/30 text-white px-4 py-2 rounded-full font-medium transition-all duration-300 hover:scale-105 flex items-center space-x-2 group">
                    <i data-feather="edit-3" class="w-4 h-4 group-hover:rotate-12 transition-transform duration-300"></i>
                    <span class="hidden sm:inline">Edit Profile</span>
                </button>
            </div>

            <!-- Profile Content -->
            <div class="flex flex-col lg:flex-row items-center lg:items-start space-y-6 lg:space-y-0 lg:space-x-8 relative z-10">
                <!-- Photo -->
                <div class="flex-shrink-0">
                    <div class="w-32 h-32 lg:w-40 lg:h-40 rounded-full bg-white/20 backdrop-blur-sm border-4 border-white/30 flex items-center justify-center overflow-hidden shadow-2xl">
                        @if(isset($student->foto) && $student->foto)
                            <img src="{{ asset('storage/' . $student->foto) }}" alt="Foto {{ $student->nama ?? 'Siswa' }}" class="w-full h-full object-cover">
                        @else
                            <i data-feather="user" class="w-16 h-16 lg:w-20 lg:h-20 text-white/80"></i>
                        @endif
                    </div>
                </div>

                <!-- Info -->
                <div class="text-center lg:text-left text-white flex-1">
                    <h1 class="text-3xl lg:text-4xl font-bold mb-2">{{ $student->nama ?? 'Ahmad Rizki Pratama' }}</h1>
                    <div class="flex items-center justify-center lg:justify-start space-x-2 mb-4">
                        <i data-feather="book-open" class="w-5 h-5 text-purple-200"></i>
                        <span class="text-lg text-purple-200">Kelas {{ $student->kelas->nama ?? 'XII IPA 1' }}</span>
                    </div>
                    <div class="flex items-center justify-center lg:justify-start space-x-2">
                        <i data-feather="hash" class="w-4 h-4 text-purple-300"></i>
                        <span class="text-purple-300">NISN: {{ $student->nisn ?? '1234567890' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Cards -->
        <div class="bg-white rounded-b-2xl lg:rounded-2xl lg:mt-6 shadow-xl">
    <div class="p-8">
        <!-- Section Title -->
        <div class="flex items-center space-x-3 mb-8">
            <div class="w-1 h-8 bg-gradient-to-b from-purple-600 to-indigo-600 rounded-full"></div>
            <h2 class="text-2xl font-bold text-gray-800">Informasi Pribadi</h2>
        </div>

        <!-- Info Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Personal Info Card -->
            <div class="bg-gradient-to-br from-purple-50 to-indigo-50 rounded-xl p-6 border border-purple-100 hover:shadow-lg transition-all duration-300 hover:scale-[1.02]">
                <h3 class="text-lg font-semibold text-gray-800 mb-6 flex items-center">
                    <i data-feather="user" class="w-5 h-5 text-purple-600 mr-2"></i>
                    Data Pribadi
                </h3>

                <div class="space-y-5">
                    <!-- Gender -->
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg">
                            <i data-feather="users" class="w-5 h-5 text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Jenis Kelamin</p>
                            <p class="text-gray-800 font-medium">{{ $student->jenkel ?? 'Laki-laki' }}</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg">
                            <i data-feather="phone" class="w-5 h-5 text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Telepon</p>
                            <p class="text-gray-800 font-medium">{{ $student->telepon ?? '+62 812-3456-7890' }}</p>
                        </div>
                    </div>

                    <!-- Religion -->
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg">
                            <i data-feather="heart" class="w-5 h-5 text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Agama</p>
                            <p class="text-gray-800 font-medium">{{ $student->agama ?? 'Islam' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Location Info Card -->
            <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-6 border border-indigo-100 hover:shadow-lg transition-all duration-300 hover:scale-[1.02]">
                <h3 class="text-lg font-semibold text-gray-800 mb-6 flex items-center">
                    <i data-feather="map-pin" class="w-5 h-5 text-indigo-600 mr-2"></i>
                    Lokasi & Kelahiran
                </h3>

                <div class="space-y-5">
                    <!-- Address -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center shadow-lg flex-shrink-0 mt-1">
                            <i data-feather="home" class="w-5 h-5 text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Alamat</p>
                            <p class="text-gray-800 font-medium leading-relaxed">{{ $student->alamat ?? 'Jl. Merdeka No. 123, Kota Bandung, Jawa Barat 40123' }}</p>
                        </div>
                    </div>

                    <!-- Birth Place -->
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center shadow-lg">
                            <i data-feather="map" class="w-5 h-5 text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Tempat Lahir</p>
                            <p class="text-gray-800 font-medium">{{ $student->tempat_lahir ?? 'Bandung' }}</p>
                        </div>
                    </div>

                    <!-- Birth Date -->
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center shadow-lg">
                            <i data-feather="calendar" class="w-5 h-5 text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Tanggal Lahir</p>
                            <p class="text-gray-800 font-medium">
                                {{ isset($student->tanggal_lahir) ? \Carbon\Carbon::parse($student->tanggal_lahir)->format('d F Y') : '15 Januari 2005' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Map Section - Now in full width below the cards -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl p-6 border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i data-feather="map" class="w-5 h-5 text-purple-600 mr-2"></i>
                        Lokasi Siswa
                    </h3>
                    <div class="relative z-0">
                        <div id="map" style="height: 400px; width: 100%; border-radius: 0.5rem; overflow: hidden;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                <!-- Action Buttons -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <button onclick="openEditModal()" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-6 py-3 rounded-lg font-medium transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
                            <i data-feather="edit" class="w-5 h-5"></i>
                            <span>Edit Profil</span>
                        </button>

                        <button onclick="printProfile()" class="bg-white hover:bg-gray-50 text-gray-700 border-2 border-gray-300 hover:border-purple-300 px-6 py-3 rounded-lg font-medium transition-all duration-300 hover:scale-105 flex items-center justify-center space-x-2">
                            <i data-feather="printer" class="w-5 h-5"></i>
                            <span>Cetak Profil</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden z-50 transition-all duration-300">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 p-6 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <i data-feather="edit" class="w-6 h-6 text-white"></i>
                        <h3 class="text-xl font-bold text-white">Edit Profil Siswa</h3>
                    </div>
                    <button onclick="closeEditModal()" class="text-white hover:bg-white/20 p-2 rounded-full transition-colors duration-200">
                        <i data-feather="x" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
          <form action="{{ route('siswa.profileSiswa.update', $student->id) }}"
            id="editProfileForm"
            class="p-6"
            method="POST"
            enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <input type="hidden" name="user_id" value="{{ $student->user_id }}">
                    <!-- Nama -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="user" class="w-4 h-4 inline mr-1"></i>
                            Nama Lengkap
                        </label>
                        <input type="text" name="nama" id="edit_nama" value="{{ $student->nama ?? 'Ahmad Rizki Pratama' }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all duration-200" required>
                    </div>

                    <!-- NISN -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="hash" class="w-4 h-4 inline mr-1"></i>
                            NISN
                        </label>
                        <input type="text" name="nisn" id="edit_nisn" value="{{ $student->nisn ?? '1234567890' }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all duration-200" required>
                    </div>
                    <!-- ABSEN -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="hash" class="w-4 h-4 inline mr-1"></i>
                            Nomer Absen
                        </label>
                        <input type="text" name="no_absen" id="edit_nisn" value="{{ $student->nisn ?? '1234567890' }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all duration-200" required>
                    </div>

                    <!-- Kelas -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="book-open" class="w-4 h-4 inline mr-1"></i>
                            Kelas
                        </label>
                        <select name="kelas_id" id="edit_kelas_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all duration-200" required>
                            @foreach($kelas as $k)
                                      <option value="{{ $k->id }}" {{ old('kelas_id', $student->kelas_id ?? '') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                                    @endforeach
                        </select>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="users" class="w-4 h-4 inline mr-1"></i>
                            Jenis Kelamin
                        </label>
                        <select name="jenkel" id="edit_jenkel"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all duration-200" required>
                            <option value="Laki-laki" {{ ($student->jenkel ?? 'Laki-laki') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ ($student->jenkel ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <!-- Telepon -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="phone" class="w-4 h-4 inline mr-1"></i>
                            Telepon
                        </label>
                        <input type="tel" name="telepon" id="edit_telepon" value="{{ $student->telepon ?? '+62 812-3456-7890' }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all duration-200" required>
                    </div>

                    <!-- Alamat -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="home" class="w-4 h-4 inline mr-1"></i>
                            Alamat
                        </label>
                        <textarea name="alamat" id="edit_alamat" rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all duration-200" required>{{ $student->alamat ?? 'Jl. Merdeka No. 123, Kota Bandung, Jawa Barat 40123' }}</textarea>
                    </div>


                    <!-- Tempat Lahir -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="map" class="w-4 h-4 inline mr-1"></i>
                            Tempat Lahir
                        </label>
                        <input type="text" name="tempat_lahir" id="edit_tempat_lahir" value="{{ $student->tempat_lahir ?? 'Bandung' }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all duration-200" required>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="calendar" class="w-4 h-4 inline mr-1"></i>
                            Tanggal Lahir
                        </label>
                        <input type="date" name="tanggal_lahir" id="edit_tanggal_lahir"
                               value="{{ isset($student->tanggal_lahir) ? \Carbon\Carbon::parse($student->tanggal_lahir)->format('Y-m-d') : '2005-01-15' }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all duration-200" required>
                    </div>

                    <!-- Agama -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="heart" class="w-4 h-4 inline mr-1"></i>
                            Agama
                        </label>
                        <select name="agama" id="edit_agama"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all duration-200" required>
                            <option value="">-- Pilih Agama --</option>
                             @foreach(['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'] as $agama)
                                        <option value="{{ $agama }}" {{ old('agama', $student->agama ?? '') == $agama ? 'selected' : '' }}>
                                            {{ $agama }}
                                        </option>
                                    @endforeach
                        </select>
                    </div>

                    @if(!empty($student->foto))
                                <div class="mb-4 p-4 bg-purple-50 rounded-lg border border-purple-200">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset('storage/' . $student->foto) }}"
                                             alt="Foto saat ini"
                                             class="w-16 h-16 rounded-full object-cover border-2 border-purple-300">
                                        <div>
                                            <p class="text-sm font-medium text-purple-900">Foto saat ini</p>
                                            <p class="text-xs text-purple-600">Upload foto baru untuk mengubah</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                    <!-- Foto -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="camera" class="w-4 h-4 inline mr-1"></i>
                            Foto Profil
                        </label>
                        <input type="file" name="foto" id="edit_foto" accept="image/*"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent transition-all duration-200"
                               onchange="previewImage(this)">
                        <div id="imagePreview" class="mt-2"></div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex flex-col sm:flex-row gap-3 mt-8 pt-6 border-t border-gray-200">
                    <button type="button" onclick="closeEditModal()"
                            class="w-full sm:w-auto px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition-colors duration-200 flex items-center justify-center space-x-2">
                        <i data-feather="x" class="w-4 h-4"></i>
                        <span>Batal</span>
                    </button>
                    <button type="submit"
                            class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-medium rounded-lg transition-all duration-200 flex items-center justify-center space-x-2">
                        <i data-feather="save" class="w-4 h-4"></i>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
<script>
    // Initialize Feather Icons
     document.addEventListener('DOMContentLoaded', function() {
        feather.replace();

        // Animasi masuk untuk kartu
        const cards = document.querySelectorAll('.bg-gradient-to-br');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            setTimeout(() => {
                card.style.transition = 'all 0.6s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 150);
        });

        // Inisialisasi peta utama (tampilan profil)
        initMainMap();
        
        // Inisialisasi peta edit (modal)
    });

    // Fungsi untuk inisialisasi peta utama
    function initMainMap() {
        var defaultLat = {{ $student->latitude ?? '-7.250445' }};
        var defaultLng = {{ $student->longitude ?? '112.768845' }};
        
        var map = L.map('map').setView([defaultLat, defaultLng], 18);

        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles © Esri'
        }).addTo(map);

        @if($student->latitude && $student->longitude)
            L.marker([{{ $student->latitude }}, {{ $student->longitude }}])
                .addTo(map)
                .bindPopup("<b>{{ $student->nama }}</b><br>{{ $student->alamat }}")
                .openPopup();
        @endif
    }

    // Fungsi untuk inisialisasi peta edit
   

    // Fungsi untuk modal
    function openEditModal() {
        const modal = document.getElementById('editModal');
        const modalContent = document.getElementById('modalContent');

        modal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
            
            // Inisialisasi ulang peta saat modal dibuka
            if (typeof editMap === 'undefined' || !editMap) {
                initEditMap();
            } else {
                // Refresh peta jika sudah ada
                setTimeout(function() {
                    editMap.invalidateSize();
                }, 300);
            }
        }, 10);

        document.body.style.overflow = 'hidden';
        feather.replace();
    }

    function openEditModal() {
        const modal = document.getElementById('editModal');
        const modalContent = document.getElementById('modalContent');

        // Show modal
        modal.classList.remove('hidden');

        // Add animation
        setTimeout(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);

        // Prevent body scroll
        document.body.style.overflow = 'hidden';

        // Re-initialize feather icons in modal
        feather.replace();
    }

    function closeEditModal() {
        const modal = document.getElementById('editModal');
        const modalContent = document.getElementById('modalContent');

        // Add closing animation
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');

        // Hide modal after animation
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }, 300);
    }

    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        preview.innerHTML = '';

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `
                    <div class="mt-2">
                        <img src="${e.target.result}" alt="Preview" class="w-20 h-20 object-cover rounded-lg border-2 border-gray-200">
                        <p class="text-xs text-gray-500 mt-1">Preview foto baru</p>
                    </div>
                `;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


    document.getElementById('foto').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('photoPreview');
    const previewImage = document.getElementById('imagePreview');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('hidden');
    }
});



    function showNotification(message, type = 'info') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-[60] p-4 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full ${
            type === 'success' ? 'bg-green-500 text-white' :
            type === 'error' ? 'bg-red-500 text-white' :
            'bg-blue-500 text-white'
        }`;

        notification.innerHTML = `
            <div class="flex items-center space-x-2">
                <i data-feather="${type === 'success' ? 'check-circle' : type === 'error' ? 'x-circle' : 'info'}" class="w-5 h-5"></i>
                <span>${message}</span>
            </div>
        `;

        document.body.appendChild(notification);
        feather.replace();

        // Show notification
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);

        // Hide notification after 3 seconds
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    // Close modal when clicking outside
    document.addEventListener('click', function(event) {
        const modal = document.getElementById('editModal');
        const modalContent = document.getElementById('modalContent');

        if (event.target === modal) {
            closeEditModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const modal = document.getElementById('editModal');
            if (!modal.classList.contains('hidden')) {
                closeEditModal();
            }
        }
    });

    function editProfile() {
        // Redirect ke halaman edit atau buka modal
        // Atau jika menggunakan modal:
         window.location.href = "{{ route('siswa.profileSiswa.edit', $student->id) }}";
        // openEditModal();
    }

    function printProfile() {
        // Function untuk print profil
        window.print();
    }

    // Add hover effects
    document.querySelectorAll('.hover\\:scale-\\[1\\.02\\]').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
</script>

<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .print-area, .print-area * {
            visibility: visible;
        }
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(45deg, #8b5cf6, #6366f1);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(45deg, #7c3aed, #4f46e5);
    }
</style>

@endsection
