@csrf

{{-- Error Message --}}
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

{{-- Success Message --}}
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

{{-- Form Container --}}
<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
        <h2 class="text-xl font-bold text-white flex items-center">
            <i data-feather="user-plus" class="w-6 h-6 mr-2"></i>
            {{ isset($jurusan) ? 'Edit Data Jurusan' : 'Tambah Data Jurusan' }}
        </h2>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 gap-6">
            <div class="space-y-8">
                {{-- Nama --}}
                <div>
                    <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <i data-feather="user" class="w-4 h-4 mr-2 text-purple-600"></i>
                        Nama <span class="text-red-500 ml-1">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-feather="type" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input type="text"
                            name="name"
                            value="{{ old('name', $jurusan->name ?? '') }}"
                            required
                            placeholder="Masukkan name"
                            class="block w-full pl-10 pr-3 py-3 border rounded-lg transition-colors duration-200 focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('name') border-red-500 @enderror">
                    </div>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <i data-feather="user" class="w-4 h-4 mr-2 text-purple-600"></i>
                        Other Name <span class="text-red-500 ml-1">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-feather="type" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input type="text"
                            name="other_name"
                            value="{{ old('other_name', $jurusan->other_name ?? '') }}"
                            required
                            placeholder="Masukkan other_name"
                            class="block w-full pl-10 pr-3 py-3 border rounded-lg transition-colors duration-200 focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('name') border-red-500 @enderror">
                    </div>
                    @error('other_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <i data-feather="user" class="w-4 h-4 mr-2 text-purple-600"></i>
                        Slogan <span class="text-red-500 ml-1">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-feather="type" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input type="text"
                            name="slogan"
                            value="{{ old('slogan', $jurusan->slogan ?? '') }}"
                            required
                            placeholder="Masukkan slogan"
                            class="block w-full pl-10 pr-3 py-3 border rounded-lg transition-colors duration-200 focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('name') border-red-500 @enderror">
                    </div>
                    @error('slogan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="camera" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Image
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="image" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <input type="file"
                           name="image"
                           accept="image/*"
                           class="block w-full pl-10 pr-3 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 @error('foto') border-red-500 @enderror">
                </div>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                @if(!empty($jurusan->image))
                    <div class="mt-3 p-3 bg-gray-50 rounded-lg border">
                        <p class="text-sm font-medium text-gray-700 mb-2">Foto saat ini:</p>
                        <div class="flex items-center space-x-3">
                            <img src="{{ asset('storage/' . $jurusan->image) }}"
                                 alt="Foto Jurusan"
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

                <div>
                    <label class="flex items-center text-sm font-medium text-gray-700">
                        <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                        Isi <span class="text-red-500 ml-1">*</span>
                    </label>
                    <div class="trix-container w-full border rounded-lg bg-gray-50 transition-all duration-200 focus-within:ring-2 focus-within:ring-purple-500 focus-within:border-transparent focus-within:bg-white @error('description') border-red-500 @enderror">
                        <input id="isi" type="hidden" name="isi" value="{{ old('isi', $jurusan->isi ?? '') }}">
                        <trix-editor input="isi"
                            placeholder="Tulis isi detail jurusan lengkap di sini..."
                            class="w-full px-4 py-3 border-0 resize-none focus:outline-none focus:ring-0"
                            style="max-height: 1200px; min-height: 200px;">
                        </trix-editor>
                    </div>
                </div>



            </div>
        </div>

        <div class="mt-8 flex items-center justify-between pt-6 border-t border-gray-200">
            <a href="{{ route('admin.jurusan.index') }}"
               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
                Kembali
            </a>

            <div class="flex space-x-3">
                <button type="reset"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <i data-feather="refresh-cw" class="w-4 h-4 mr-2"></i>
                    Reset
                </button>

                <button type="submit"
                        id="submitBtn"
                        class="inline-flex items-center px-6 py-2 rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 transition-all duration-200 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    <i data-feather="save" class="w-4 h-4 mr-2"></i>
                    <span>{{ isset($jurusan) ? 'Update Data' : 'Simpan Data' }}</span>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- JS: Feather Icons + Input Border Logic + SweetAlert --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }

        document.querySelectorAll('input, select, textarea').forEach(function (element) {
            element.addEventListener('blur', function () {
                if (this.hasAttribute('required') && !this.value.trim()) {
                    this.classList.add('border-red-500');
                    this.classList.remove('border-gray-300');
                } else {
                    this.classList.remove('border-red-500');
                    this.classList.add('border-gray-300');
                }
            });
        });

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#7c3aed'
            });
        @endif
    });
</script>
<script>
    document.querySelector('input[name="image"]').addEventListener('change', function(e) {
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
</script>
