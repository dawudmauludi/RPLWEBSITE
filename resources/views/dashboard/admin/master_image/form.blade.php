
<div class="min-h-screen bg-gradient-to-br from-purple-50 to-indigo-50 p-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg border border-purple-100 p-6 mb-6">
            <div class="flex items-center">
                <div class="bg-gradient-to-r from-purple-500 to-indigo-600 p-3 rounded-lg mr-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">{{ isset($master_image) ? 'Edit master_image' : 'Tambah master_image' }}</h1>
                    <p class="text-gray-600 text-sm">{{ isset($master_image) ? 'Perbarui informasi master_image' : 'Buat master_image baru untuk dipublikasikan' }}</p>
                </div>
            </div>
        </div>
        <div class="grid gap-6">
            @if ($errors->any())
                <div class="bg-gradient-to-r from-red-100 to-red-50 border-l-4 border-red-500 text-red-700 px-6 py-4 rounded-lg shadow-sm">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <p class="font-medium mb-2">Terdapat kesalahan pada form:</p>
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li class="text-sm">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-lg border border-purple-100 p-6">
                <div class="flex items-center mb-6">
                    <div class="bg-gradient-to-r from-purple-100 to-indigo-100 p-2 rounded-lg mr-3">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800">Informasi Dasar</h2>
                </div>

                <div class="grid gap-6">
                    <div class="space-y-2">
                        <label class="flex items-center text-sm font-medium text-gray-700">
                            <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2h4a1 1 0 110 2h-1v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6H3a1 1 0 110-2h4z"></path>
                            </svg>
                            Type master_image
                        </label>
                        <select name="type"
                                class="w-full px-4 py-3 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white">
                            <option value="beranda" {{ old('type', $master_image->type ?? '') == 'beranda' ? 'selected' : '' }}>Beranda</option>
                            <option value="jurusan" {{ old('type', $master_image->type ?? '') == 'jurusan' ? 'selected' : '' }}>Jurusan</option>
                            <option value="mapel" {{ old('type', $master_image->type ?? '') == 'mapel' ? 'selected' : '' }}>Mapel</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg border border-purple-100 p-6">
                <div class="flex items-center mb-6">
                    <div class="bg-gradient-to-r from-purple-100 to-indigo-100 p-2 rounded-lg mr-3">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800">Media & Gambar</h2>
                </div>

                @if(isset($master_image) && $master_image->image)
                    <div class="mb-6">
                        <h3 class="text-sm font-medium text-gray-700 mb-3">Gambar Saat Ini:</h3>
                        <div class="flex gap-3 flex-wrap">
                                <div class="relative group">
                                    <img src="{{ asset('storage/' . $master_image->image) }}"
                                         alt="Gambar master_image"
                                         class="h-24 w-24 object-cover rounded-lg border-2 border-purple-200 group-hover:border-purple-400 transition-colors duration-200">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-lg transition-all duration-200 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                        </div>
                    </div>
                @endif

                <div class="lg:col-span-2">
                        <label for="image" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                            <i data-feather="camera" class="w-4 h-4 mr-2 text-purple-600"></i>
                            image Master
                        </label>

                        <div class="relative border-2 border-dashed border-purple-300 rounded-lg bg-purple-50 hover:bg-purple-100 transition-all duration-200">
                            <input type="file" name="image" id="image" accept="image/*"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">

                            <div id="upload-placeholder" class="flex flex-col items-center justify-center py-12 px-4">
                                <i data-feather="upload-cloud" class="w-12 h-12 text-purple-500 mb-4"></i>
                                <p class="text-lg font-medium text-purple-600 mb-2">Klik untuk memilih image</p>
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
                                            <h4 class="text-lg font-medium text-gray-800">Preview image</h4>
                                            {{-- <button type="button" id="remove-photo"
                                                    class="text-red-500 hover:text-red-700 p-1 rounded-full hover:bg-red-50 transition-colors">
                                                <i data-feather="x" class="w-5 h-5"></i>remove
                                            </button> --}}
                                        </div>
                                        <div id="file-info" class="space-y-1 text-sm text-gray-600">
                                            <p><strong>Nama file:</strong> <span id="file-name"></span></p>
                                            <p><strong>Ukuran:</strong> <span id="file-size"></span></p>
                                            <p><strong>Tipe:</strong> <span id="file-type"></span></p>
                                        </div>
                                        <div class="mt-3">
                                            <div class="flex items-center space-x-2">
                                                <i data-feather="check-circle" class="w-4 h-4 text-green-500"></i>
                                                <span class="text-sm text-green-600 font-medium">image siap diunggah</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>


            <div class="flex justify-between items-center mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded shadow-md transition-all">
                     <span>{{ isset($master_image) ? 'Update Data' : 'Simpan Data' }}</span>
                </button>
                <button type="button" onclick="location.reload()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-6 rounded shadow-sm transition-all flex items-center space-x-2">
                    <i data-feather="refresh-cw" class="w-4 h-4 mr-2"></i>
                    <span>Reset</span>
                </button>
                <a href="{{ route('admin.master_image.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-6 rounded shadow-sm transition-all">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>


<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function () {
const input = document.getElementById('image_input');
const preview = document.getElementById('image_preview');

input.addEventListener('change', function () {
    const file = input.files[0];
    preview.innerHTML = '';

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const wrapper = document.createElement('div');
            wrapper.className = 'relative group';

            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'w-full h-24 object-cover rounded-lg border-2 border-purple-200 group-hover:border-purple-400 transition-colors duration-200';

            const btn = document.createElement('button');
            btn.type = 'button';
            btn.innerHTML = `
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            `;
            btn.className = 'absolute -top-2 -right-2 bg-red-500 hover:bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center transition-colors duration-200 shadow-lg';

            btn.addEventListener('click', function () {
                input.value = '';
                preview.innerHTML = '';
            });

            const fileName = document.createElement('div');
            fileName.className = 'absolute bottom-0 left-0 right-0 bg-black bg-opacity-75 text-white text-xs p-2 rounded-b-lg truncate';
            fileName.textContent = file.name;

            wrapper.appendChild(img);
            wrapper.appendChild(btn);
            wrapper.appendChild(fileName);
            preview.appendChild(wrapper);
        };
        reader.readAsDataURL(file);
    }
});
});
</script>


<script>
@if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#7c3aed'
        });
@endif
</script>
<script>
     const imageInput = document.getElementById('image');
    const uploadPlaceholder = document.getElementById('upload-placeholder');
    const photoPreview = document.getElementById('photo-preview');
    const previewImage = document.getElementById('preview-image');
    const fileName = document.getElementById('file-name');
    const fileSize = document.getElementById('file-size');
    const fileType = document.getElementById('file-type');
    const removePhotoBtn = document.getElementById('remove-photo');

    imageInput.addEventListener('change', function(e) {
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
        imageInput.value = '';
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
            imageInput.files = files;
            imageInput.dispatchEvent(new Event('change'));
        }
    }
</script>
