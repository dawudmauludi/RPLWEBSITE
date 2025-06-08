@csrf

<div class="min-h-screen bg-gradient-to-br from-purple-50 to-indigo-100 p-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 px-8 py-6">
                <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                    <i data-feather="user-plus" class="w-6 h-6"></i>
                    {{ isset($alumni) ? 'Edit Data alumni' : 'Tambah Data alumni' }}
                </h2>
                <p class="text-purple-100 mt-2">Lengkapi informasi alumni dengan benar</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mx-8 mt-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                    <div class="flex items-start">
                        <i data-feather="alert-circle" class="text-red-500 w-5 h-5 mt-0.5 mr-3 flex-shrink-0"></i>
                        <div>
                            <h3 class="text-sm font-medium text-red-800 mb-2">Terdapat kesalahan:</h3>
                            <ul class="text-sm text-red-700 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li class="flex items-center gap-2">
                                        <i data-feather="x" class="w-3 h-3"></i>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-6">
                        @if(isset($alumni))
                            <input type="hidden" name="user_id" value="{{ $alumni->user_id }}">
                            <div class="bg-purple-50 p-4 rounded-lg border border-purple-200">
                                <label class="text-sm font-semibold text-purple-900 mb-2 flex items-center gap-2">
                                    <i data-feather="user-check" class="w-4 h-4"></i>
                                    User Terkait
                                </label>
                                <div class="bg-white p-3 rounded-md border text-purple-800 font-medium opacity-70 cursor-not-allowed">
                                    {{ $alumni->user->name }} ({{ $alumni->user->email }})
                                </div>
                                <p class="mt-2 text-xs text-gray-500 flex items-center gap-1">
                                    <i data-feather="info" class="w-3 h-3"></i>
                                    User account tidak dapat diubah setelah alumni dibuat
                                </p>
                            </div>
                        @else
                            <div>
                                <label for="user_id" class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                    <i data-feather="user-plus" class="w-4 h-4 text-purple-600"></i>
                                    Pilih User <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <select name="user_id" id="user_id" required
                                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white">
                                        <option value="">-- Pilih User --</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                        @endforeach
                                    </select>
                                    <i data-feather="users" class="absolute left-3 top-3.5 w-4 h-4 text-gray-400"></i>
                                </div>
                            </div>
                        @endif

                        <div>
                            <label for="nama" class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i data-feather="user" class="w-4 h-4 text-purple-600"></i>
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" name="nama" id="nama" required
                                       value="{{ old('nama', $alumni->nama ?? '') }}"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                       placeholder="Masukkan nama lengkap">
                                <i data-feather="user" class="absolute left-3 top-3.5 w-4 h-4 text-gray-400"></i>
                            </div>
                        </div>

                        <div>
                            <label for="nisn" class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i data-feather="hash" class="w-4 h-4 text-purple-600"></i>
                                NISN <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" name="nisn" id="nisn" required
                                       value="{{ old('nisn', $alumni->nisn ?? '') }}"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                       placeholder="Masukkan NISN">
                                <i data-feather="hash" class="absolute left-3 top-3.5 w-4 h-4 text-gray-400"></i>
                            </div>
                        </div>
                    
                        <div>
                            <label class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i data-feather="users" class="w-4 h-4 text-purple-600"></i>
                                Jenis Kelamin <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <select name="jenkel" id="jenkel" required
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{ old('jenkel', $alumni->jenkel ?? '') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenkel', $alumni->jenkel ?? '') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                <i data-feather="users" class="absolute left-3 top-3.5 w-4 h-4 text-gray-400"></i>
                            </div>
                        </div>

                        <div>
                            <label for="telepon" class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i data-feather="phone" class="w-4 h-4 text-purple-600"></i>
                                Nomor Telepon
                            </label>
                            <div class="relative">
                                <input type="text" name="telepon" id="telepon"
                                       value="{{ old('telepon', $alumni->telepon ?? '') }}"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                       placeholder="Contoh: 08123456789">
                                <i data-feather="phone" class="absolute left-3 top-3.5 w-4 h-4 text-gray-400"></i>
                            </div>
                        </div>

                        <div>
                            <label for="alamat" class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i data-feather="map-pin" class="w-4 h-4 text-purple-600"></i>
                                Alamat Lengkap
                            </label>
                            <textarea name="alamat" id="alamat" rows="3"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 resize-none"
                                      placeholder="Masukkan alamat lengkap">{{ old('alamat', $alumni->alamat ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label for="tempat_lahir" class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i data-feather="map" class="w-4 h-4 text-purple-600"></i>
                                Tempat Lahir
                            </label>
                            <div class="relative">
                                <input type="text" name="tempat_lahir" id="tempat_lahir"
                                       value="{{ old('tempat_lahir', $alumni->tempat_lahir ?? '') }}"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                       placeholder="Contoh: Pasuruan">
                                <i data-feather="map" class="absolute left-3 top-3.5 w-4 h-4 text-gray-400"></i>
                            </div>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div>
                            <label for="tanggal_lahir" class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i data-feather="calendar" class="w-4 h-4 text-purple-600"></i>
                                Tanggal Lahir
                            </label>
                            <div class="relative">
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                       value="{{ old('tanggal_lahir', $alumni->tanggal_lahir ?? '') }}"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200">
                                <i data-feather="calendar" class="absolute left-3 top-3.5 w-4 h-4 text-gray-400"></i>
                            </div>
                        </div>

                        <!-- Agama -->
                        <div>
                            <label for="agama" class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i data-feather="book" class="w-4 h-4 text-purple-600"></i>
                                Agama <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <select name="agama" id="agama" required
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 bg-white">
                                    <option value="">-- Pilih Agama --</option>
                                    @foreach(['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'] as $agama)
                                        <option value="{{ $agama }}" {{ old('agama', $alumni->agama ?? '') == $agama ? 'selected' : '' }}>
                                            {{ $agama }}
                                        </option>
                                    @endforeach
                                </select>
                                <i data-feather="book" class="absolute left-3 top-3.5 w-4 h-4 text-gray-400"></i>
                            </div>
                        </div>

                         <div>
                            <label for="tahun_lulus" class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i data-feather="map" class="w-4 h-4 text-purple-600"></i>
                                Tahun Lulus
                            </label>
                            <div class="relative">
                                <input type="numeric" name="tahun_lulus" id="tahun_lulus"
                                       value="{{ old('tahun_lulus', $alumni->tahun_lulus ?? '') }}"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                       placeholder="Contoh: 2025">
                                <i data-feather="map" class="absolute left-3 top-3.5 w-4 h-4 text-gray-400"></i>
                            </div>
                        </div>

                        <!-- Foto Upload -->
                        <div>
                            <label for="foto" class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <i data-feather="camera" class="w-4 h-4 text-purple-600"></i>
                                Foto Profil
                            </label>

                            @if(!empty($alumni->foto))
                                <div class="mb-4 p-4 bg-purple-50 rounded-lg border border-purple-200">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset('storage/' . $alumni->foto) }}"
                                             alt="Foto saat ini"
                                             class="w-16 h-16 rounded-full object-cover border-2 border-purple-300">
                                        <div>
                                            <p class="text-sm font-medium text-purple-900">Foto saat ini</p>
                                            <p class="text-xs text-purple-600">Upload foto baru untuk mengubah</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- File Input -->
                            <div class="relative">
                                <input type="file" name="foto" id="foto" accept="image/*"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200
                                              file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-medium
                                              file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                            </div>
                            <p class="mt-2 text-xs text-gray-500 flex items-center gap-1">
                                <i data-feather="info" class="w-3 h-3"></i>
                                Format: JPG, PNG, GIF. Maksimal 2MB
                            </p>

                            <!-- Preview -->
                            <div id="photoPreview" class="hidden mt-4 p-4 bg-gray-50 rounded-lg border">
                                <p class="text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                    <i data-feather="eye" class="w-4 h-4"></i>
                                    Preview
                                </p>
                                <img id="previewImage" class="w-20 h-20 rounded-full object-cover border-2 border-purple-300">
                            </div>
                        </div>


                         <div class="">
                     <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                     <i data-feather="map-pin" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Lokasi (Klik pada peta untuk memilih koordinat)
                    </label>
                    <div id="map-container" class="relative">
        <!-- Pastikan ID map konsisten -->
        <div id="student-map" style="height: 300px; z-index: 0;" class="rounded-lg border border-gray-300"></div>
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                <input type="text" id="latitude" name="latitude" value="{{ $alumni->latitude ?? '' }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" readonly required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                <input type="text" id="longitude" name="longitude" value="{{ $alumni->longitude ?? '' }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg" readonly required>
            </div>
        </div>
    </div>
        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-4 pt-8 border-t border-gray-200 mt-8">
                    <button type="button" onclick="history.back()"
                            class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-all duration-200 flex items-center gap-2">
                        <i data-feather="arrow-left" class="w-4 h-4"></i>
                        Batal
                    </button>
                    <button type="submit"
                            class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-8 py-3 rounded-lg font-medium transition-all duration-200 shadow-lg hover:shadow-xl flex items-center gap-2">
                        <i data-feather="save" class="w-4 h-4"></i>
                        {{ isset($alumni) ? 'Update Data' : 'Simpan Data' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('foto').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('photoPreview');
    const previewImage = document.getElementById('previewImage');

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

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const requiredFields = document.querySelectorAll('[required]');

    requiredFields.forEach(field => {
        field.addEventListener('blur', function() {
            validateField(this);
        });

        field.addEventListener('input', function() {
            if (this.classList.contains('border-red-500')) {
                validateField(this);
            }
        });
    });

    if (form) {
        form.addEventListener('submit', function(e) {
            let isValid = true;

            requiredFields.forEach(field => {
                if (!validateField(field)) {
                    isValid = false;
                }
            });

            if (!isValid) {
                e.preventDefault();
                const firstInvalid = document.querySelector('.border-red-500');
                if (firstInvalid) {
                    firstInvalid.focus();
                    firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        });
    }

    initEditMap()
});

  function initEditMap() {
    // Gunakan koordinat alumni jika ada (edit mode), atau gunakan default (create mode)
    var defaultLat = {{ $alumni->latitude ?? '-7.250445' }};
    var defaultLng = {{ $alumni->longitude ?? '112.768845' }};
    var zoomLevel = {{ isset($alumni->latitude) ? '20' : '15' }};

    var map = L.map('student-map').setView([defaultLat, defaultLng], zoomLevel);
    var marker = null;

    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles © Esri'
    }).addTo(map);

    // Jika ada data koordinat (edit mode), tambahkan marker
    @if(isset($alumni) && $alumni->latitude && $alumni->longitude)
        marker = L.marker([defaultLat, defaultLng], {
            draggable: true
        }).addTo(map)
        .bindPopup("<b>Lokasi Saat Ini</b>")
        .openPopup();
    @endif

    // Event klik pada peta (untuk create dan edit)
    map.on('click', function(e) {
        updateMarkerPosition(e.latlng);
    });

    // Fungsi untuk update posisi marker dan form
    function updateMarkerPosition(latlng) {
        if (!marker) {
            marker = L.marker(latlng, {
                draggable: true
            }).addTo(map);
            marker.on('dragend', function(e) {
                updateMarkerPosition(marker.getLatLng());
            });
        } else {
            marker.setLatLng(latlng);
        }

        // Update form fields
        document.getElementById('latitude').value = latlng.lat.toFixed(6);
        document.getElementById('longitude').value = latlng.lng.toFixed(6);

        // Update popup
        marker.bindPopup("Lokasi Dipilih:<br>Lat: " + latlng.lat.toFixed(6) + "<br>Lng: " + latlng.lng.toFixed(6))
              .openPopup();
    }

    // Tambahkan geocoder control
    L.Control.geocoder({
        defaultMarkGeocode: false,
        position: 'topright'
    })
    .on('markgeocode', function(e) {
        var latlng = e.geocode.center;
        map.setView(latlng, 16);
        updateMarkerPosition(latlng);
    })
    .addTo(map);

    // Jika create mode, set marker pada posisi default
    @if(!isset($alumni) )
        if (!marker) {
            var defaultLatLng = L.latLng(defaultLat, defaultLng);
            updateMarkerPosition(defaultLatLng);
        }
    @endif
}

function validateField(field) {
    const value = field.value.trim();
    const isValid = value !== '';

    if (isValid) {
        field.classList.remove('border-red-500', 'ring-red-500');
        field.classList.add('border-gray-300');
    } else {
        field.classList.add('border-red-500', 'ring-red-500');
        field.classList.remove('border-gray-300');
    }

    return isValid;
}

document.getElementById('telepon').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 0 && !value.startsWith('0') && !value.startsWith('62')) {
        value = '0' + value;
    }
    e.target.value = value;
});
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
</script>
