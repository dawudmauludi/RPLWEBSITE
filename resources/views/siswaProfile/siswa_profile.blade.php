@extends('layouts.master')

@section('title', 'Tambah Siswa')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-white to-indigo-50 py-8 px-4 pt-20">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-full mb-4">
                <i data-feather="user-plus" class="w-8 h-8 text-white"></i>
            </div>
            <h3 class="text-base font-semibold text-gray-800 mb-2">Lengkapi Data Siswa Baru</h3>
            <p class="text-gray-600">Lengkapi informasi siswa dengan data yang akurat</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-purple-100 overflow-hidden">
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 px-8 py-6">
                <h2 class="text-xl font-semibold text-white flex items-center">
                    <i data-feather="edit-3" class="w-5 h-5 mr-2"></i>
                    Formulir Data Siswa
                </h2>
            </div>

            <form action="{{ route('siswa_profile.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="lg:col-span-2">
                        <label for="nama" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="user" class="w-4 h-4 mr-2 text-purple-600"></i>
                            Nama Lengkap
                        </label>
                        <input type="text" name="nama" id="nama"
                               class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 outline-none"
                               placeholder="Masukkan nama lengkap siswa" required>
                    </div>

                    <div>
                        <label for="nisn" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="hash" class="w-4 h-4 mr-2 text-purple-600"></i>
                            NISN
                        </label>
                        <input type="text" name="nisn" id="nisn"
                               class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 outline-none"
                               placeholder="Nomor Induk Siswa Nasional" required>
                    </div>

                    <div>
                        <label for="jenkel" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="users" class="w-4 h-4 mr-2 text-purple-600"></i>
                            Jenis Kelamin
                        </label>
                        <div class="relative">
                            <select name="jenkel" id="jenkel"
                                    class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 outline-none appearance-none bg-white" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            <i data-feather="chevron-down" class="w-5 h-5 absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                    </div>

                    <div>
                        <label for="telepon" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="phone" class="w-4 h-4 mr-2 text-purple-600"></i>
                            Nomor Telepon
                        </label>
                        <input type="text" name="telepon" id="telepon"
                               class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 outline-none"
                               placeholder="Contoh: 081234567890" required>
                    </div>

                    <div>
                        <label for="tempat_lahir" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="map-pin" class="w-4 h-4 mr-2 text-purple-600"></i>
                            Tempat Lahir
                        </label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                               class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 outline-none"
                               placeholder="Kota tempat lahir" required>
                    </div>

                    <div>
                        <label for="tanggal_lahir" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="calendar" class="w-4 h-4 mr-2 text-purple-600"></i>
                            Tanggal Lahir
                        </label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                               class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 outline-none" required>
                    </div>

                    <div>
                        <label for="agama" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="book-open" class="w-4 h-4 mr-2 text-purple-600"></i>
                            Agama
                        </label>
                        <div class="relative">
                            <select name="agama" id="agama"
                                    class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 outline-none appearance-none bg-white" required>
                                <option value="">-- Pilih Agama --</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            <i data-feather="chevron-down" class="w-5 h-5 absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                    </div>

                    <div>
                        <label for="kelas_id" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="home" class="w-4 h-4 mr-2 text-purple-600"></i>
                            Kelas
                        </label>
                        <div class="relative">
                            <select name="kelas_id" id="kelas_id"
                                    class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 outline-none appearance-none bg-white" required>
                                <option value="">-- Pilih Kelas --</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ old('kelas_id', $siswa->kelas_id ?? '') == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <i data-feather="chevron-down" class="w-5 h-5 absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        <label for="alamat" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="map" class="w-4 h-4 mr-2 text-purple-600"></i>
                            Alamat Lengkap
                        </label>
                        <textarea name="alamat" id="alamat" rows="4"
                                  class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 outline-none resize-none"
                                  placeholder="Masukkan alamat lengkap siswa" required></textarea>
                    </div>

                    <div class="lg:col-span-2">
                        <label for="foto" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="camera" class="w-4 h-4 mr-2 text-purple-600"></i>
                            Foto Siswa
                        </label>

                        <div class="relative border-2 border-dashed border-purple-300 rounded-lg bg-purple-50 hover:bg-purple-100 transition-all duration-200">
                            <input type="file" name="foto" id="foto" accept="image/*"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" required>

                            <div id="upload-placeholder" class="flex flex-col items-center justify-center py-12 px-4">
                                <i data-feather="upload-cloud" class="w-12 h-12 text-purple-500 mb-4"></i>
                                <p class="text-lg font-medium text-purple-600 mb-2">Klik untuk memilih foto</p>
                                <p class="text-sm text-gray-500 text-center">
                                    Atau seret dan lepas file di sini<br>
                                    Format: JPG, PNG, GIF (Max: 2MB)
                                </p>
                            </div>

                            <div id="photo-preview" class="hidden p-4">
                                <div class="flex flex-col sm:flex-row sm:items-start sm:space-x-4 space-y-4 sm:space-y-0">
                                    <div class="flex-shrink-0 flex justify-center">
                                        <img id="preview-image" src="" alt="Preview"
                                             class="w-32 h-32 object-cover rounded-lg border-2 border-purple-200">
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="text-lg font-medium text-gray-800">Preview Foto</h4>
                                            <button type="button" id="remove-photo"
                                                    class="text-red-500 hover:text-red-700 p-1 rounded-full hover:bg-red-50 transition-colors">
                                                <i data-feather="x" class="w-5 h-5"></i>
                                            </button>
                                        </div>
                                        <div id="file-info" class="space-y-1 text-sm text-gray-600">
                                            <p><strong>Nama file:</strong> <span id="file-name"></span></p>
                                            <p><strong>Ukuran:</strong> <span id="file-size"></span></p>
                                            <p><strong>Tipe:</strong> <span id="file-type"></span></p>
                                        </div>
                                        <div class="mt-3">
                                            <div class="flex items-center space-x-2">
                                                <i data-feather="check-circle" class="w-4 h-4 text-green-500"></i>
                                                <span class="text-sm text-green-600 font-medium">Foto siap diunggah</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-8 mt-8 border-t border-gray-200">
                    <button type="submit"
                            class="flex items-center justify-center px-8 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                        <i data-feather="save" class="w-5 h-5 mr-2"></i>
                        Simpan Data Siswa
                    </button>
                    <a href="{{ route('login') }}"
                       class="flex items-center justify-center px-8 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg border border-gray-300 transition-all duration-200">
                        <i data-feather="arrow-left" class="w-5 h-5 mr-2"></i>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    feather.replace();

    const fotoInput = document.getElementById('foto');
    const uploadPlaceholder = document.getElementById('upload-placeholder');
    const photoPreview = document.getElementById('photo-preview');
    const previewImage = document.getElementById('preview-image');
    const fileName = document.getElementById('file-name');
    const fileSize = document.getElementById('file-size');
    const fileType = document.getElementById('file-type');
    const removePhotoBtn = document.getElementById('remove-photo');

    fotoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!validTypes.includes(file.type)) {
                alert('Format file tidak didukung. Silakan pilih file JPG, PNG, atau GIF.');
                resetFileInput();
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 2MB.');
                resetFileInput();
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                fileName.textContent = file.name;
                fileSize.textContent = formatFileSize(file.size);
                fileType.textContent = file.type;

                uploadPlaceholder.classList.add('hidden');
                photoPreview.classList.remove('hidden');

                feather.replace();
            };
            reader.readAsDataURL(file);
        }
    });

    removePhotoBtn.addEventListener('click', function() {
        resetFileInput();
    });

    function resetFileInput() {
        fotoInput.value = '';
        previewImage.src = '';
        uploadPlaceholder.classList.remove('hidden');
        photoPreview.classList.add('hidden');
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    const uploadArea = document.querySelector('.border-dashed');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        uploadArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        uploadArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        uploadArea.classList.add('border-purple-500', 'bg-purple-100');
    }

    function unhighlight(e) {
        uploadArea.classList.remove('border-purple-500', 'bg-purple-100');
    }

    uploadArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        if (files.length > 0) {
            fotoInput.files = files;
            fotoInput.dispatchEvent(new Event('change'));
        }
    }
</script>
@endsection
