@csrf

@if ($errors->any())
    <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-lg shadow-sm">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <i data-feather="alert-circle" class="w-5 h-5 text-red-400"></i>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">
                    Terdapat {{ count($errors->all()) }} kesalahan dalam form:
                </h3>
                <div class="mt-2 text-sm text-red-700">
                    <ul class="list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Success Message -->
@if(session('success'))
    <div class="mb-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-lg shadow-sm">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <i data-feather="check-circle" class="w-5 h-5 text-green-400"></i>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif

<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
        <h2 class="text-xl font-bold text-white flex items-center">
            <i data-feather="user-plus" class="w-6 h-6 mr-2"></i>
            {{ isset($guru) ? 'Edit Data Guru' : 'Tambah Data Guru' }}
        </h2>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <div class="lg:col-span-2">
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="user" class="w-4 h-4 mr-2 text-purple-600"></i>
                    User Account
                    <span class="text-red-500 ml-1">*</span>
                </label>
                @if(isset($guru) && isset($guru->user))
                    <input type="hidden" name="user_id" value="{{ $guru->user_id }}">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-feather="lock" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input type="text"
                               value="{{ $guru->user->nama }} ({{ $guru->user->email }})"
                               disabled
                               class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-500 cursor-not-allowed">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">User account tidak dapat diubah setelah guru dibuat</p>
                @else
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-feather="users" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <select name="user_id"
                                required
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 bg-white">
                            <option value="">-- Pilih User Account --</option>
                            @foreach($users ?? [] as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $guru->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                    {{ $user->nama }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>

            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="user" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Nama Lengkap
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="type" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <input type="text"
                           name="nama"
                           value="{{ old('nama', $guru->nama ?? '') }}"
                           required
                           placeholder="Masukkan nama lengkap"
                           class="block w-full pl-10 pr-3 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 @error('nama') border-red-500 @enderror">
                </div>
                @error('nama')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="hash" class="w-4 h-4 mr-2 text-purple-600"></i>
                    NIP (Nomor Induk Pegawai)
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="credit-card" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <input type="text"
                           name="nip"
                           value="{{ old('nip', $guru->nip ?? '') }}"
                           placeholder="Masukkan NIP"
                           required
                           class="block w-full pl-10 pr-3 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 @error('nip') border-red-500 @enderror">
                </div>
                @error('nip')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="users" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Jenis Kelamin
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="user-check" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <select name="jenkel"
                            required
                            class="block w-full pl-10 pr-3 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 bg-white @error('jenkel') border-red-500 @enderror">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" {{ old('jenkel', $guru->jenkel ?? '') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenkel', $guru->jenkel ?? '') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                @error('jenkel')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Telepon -->
            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="phone" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Nomor Telepon
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="smartphone" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <input type="text"
                        name="telepon"
                        value="{{ old('telepon', $guru->telepon ?? '') }}"
                        placeholder="Contoh: 0812345678"
                        inputmode="numeric"
                        pattern="[0-9]*"
                        required
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        class="block w-full pl-10 pr-3 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 @error('telepon') border-red-500 @enderror">
                </div>
                @error('telepon')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="lg:col-span-2">
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="map-pin" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Alamat Lengkap
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute top-3 left-3 pointer-events-none">
                        <i data-feather="map" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <textarea name="alamat"
                              rows="3"
                              required
                              placeholder="Masukkan alamat lengkap"
                              class="block w-full pl-10 pr-3 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 resize-none @error('alamat') border-red-500 @enderror">{{ old('alamat', $guru->alamat ?? '') }}</textarea>
                </div>
                @error('alamat')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="map" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Tempat Lahir
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="globe" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <input type="text"
                           name="tempat_lahir"
                           value="{{ old('tempat_lahir', $guru->tempat_lahir ?? '') }}"
                           placeholder="Contoh: Pasuruan"
                           required
                           class="block w-full pl-10 pr-3 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 @error('tempat_lahir') border-red-500 @enderror">
                </div>
                @error('tempat_lahir')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="calendar" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Tanggal Lahir
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="calendar" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <input type="date"
                           name="tanggal_lahir"
                           value="{{ old('tanggal_lahir', $guru->tanggal_lahir ?? '') }}"
                           required
                           class="block w-full pl-10 pr-3 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 @error('tanggal_lahir') border-red-500 @enderror">
                </div>
                @error('tanggal_lahir')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="eye" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Mata Pelajaran
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="eye" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <input type="text"
                           name="mapel"
                           value="{{ old('mapel', $guru->mapel ?? '') }}"
                           placeholder="Contoh: Basis Data"
                           required
                           class="block w-full pl-10 pr-3 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 @error('tempat_lahir') border-red-500 @enderror">
                </div>
                @error('mapel')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="heart" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Agama
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="book" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <select name="agama"
                            required
                            class="block w-full pl-10 pr-3 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 bg-white @error('agama') border-red-500 @enderror">
                        <option value="">-- Pilih Agama --</option>
                        <option value="Islam" {{ old('agama', $guru->agama ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ old('agama', $guru->agama ?? '') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ old('agama', $guru->agama ?? '') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Hindu" {{ old('agama', $guru->agama ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Budha" {{ old('agama', $guru->agama ?? '') == 'Budha' ? 'selected' : '' }}>Budha</option>
                        <option value="Konghucu" {{ old('agama', $guru->agama ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                </div>
                @error('agama')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="camera" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Foto Profil
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="image" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <input type="file"
                           name="foto"
                           accept="image/*"
                           class="block w-full pl-10 pr-3 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 @error('foto') border-red-500 @enderror">
                </div>
                @error('foto')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                @if(!empty($guru->foto))
                    <div class="mt-3 p-3 bg-gray-50 rounded-lg border">
                        <p class="text-sm font-medium text-gray-700 mb-2">Foto saat ini:</p>
                        <div class="flex items-center space-x-3">
                            <img src="{{ asset('storage/' . $guru->foto) }}"
                                 alt="Foto Guru"
                                 class="w-20 h-20 rounded-lg object-cover border-2 border-purple-200 shadow-sm">
                            <div class="text-sm text-gray-600">
                                <p>Unggah foto baru untuk mengganti foto yang ada</p>
                                <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF (Max: 2MB)</p>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF (Max: 2MB)</p>
                @endif
            </div>

        </div>

        <div class="mt-8 flex items-center justify-between pt-6 border-t border-gray-200">
            <a href="{{ route('admin.guru.index') }}"
               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200">
                <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
                Kembali
            </a>

            <div class="flex space-x-3">
                <button type="reset"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                    <i data-feather="refresh-cw" class="w-4 h-4 mr-2"></i>
                    Reset
                </button>

                <button type="submit"
                        id="submitBtn"
                        class="inline-flex items-center px-6 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-200 transform hover:-translate-y-0.5">
                    <i data-feather="save" class="w-4 h-4 mr-2"></i>
                    <span>{{ isset($guru) ? 'Update Data' : 'Simpan Data' }}</span>
                </button>
                <script>

                </script>
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


document.querySelector('input[name="foto"]').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            let preview = document.getElementById('foto-preview');
            if (!preview) {
                preview = document.createElement('div');
                preview.id = 'foto-preview';
                preview.className = 'mt-3 p-3 bg-purple-50 rounded-lg border border-purple-200';
                e.target.parentNode.appendChild(preview);
            }

            preview.innerHTML = `
                <p class="text-sm font-medium text-purple-700 mb-2">Preview foto baru:</p>
                <div class="flex items-center space-x-3">
                    <img src="${e.target.result}"
                         alt="Preview Foto"
                         class="w-20 h-20 rounded-lg object-cover border-2 border-purple-300 shadow-sm">
                    <div class="text-sm text-purple-600">
                        <p class="font-medium">${file.name}</p>
                        <p class="text-xs text-purple-500 mt-1">Ukuran: ${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                    </div>
                </div>
            `;
        };
        reader.readAsDataURL(file);
    }
});

document.querySelectorAll('input, select, textarea').forEach(function(element) {
    element.addEventListener('blur', function() {
        if (this.hasAttribute('required') && !this.value.trim()) {
            this.classList.add('border-red-500');
            this.classList.remove('border-gray-300');
        } else {
            this.classList.remove('border-red-500');
            this.classList.add('border-gray-300');
        }
    });
});
</script>


