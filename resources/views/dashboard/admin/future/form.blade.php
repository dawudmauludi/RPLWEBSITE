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
            {{ isset($kategori) ? 'Edit Data Kategori Karya' : 'Tambah Data Kategori Karya' }}
        </h2>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
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
                            value="{{ old('name', $future->name ?? '') }}"
                            required
                            placeholder="Masukkan nama future"
                            class="block w-full pl-10 pr-3 py-3 border rounded-lg transition-colors duration-200 focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('name') border-red-500 @enderror">
                    </div>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label class="flex items-center text-sm font-medium text-gray-700">
                        <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                        Description
                    </label>
                    <div class="trix-container w-full border rounded-lg bg-gray-50 transition-all duration-200 focus-within:ring-2 focus-within:ring-purple-500 focus-within:border-transparent focus-within:bg-white @error('description') border-red-500 @enderror">
                        <input id="description" type="hidden" name="description" value="{{ old('description', $future->description ?? '') }}">
                        <trix-editor input="description"
                            placeholder="Tulis description future lengkap di sini..."
                            class="w-full px-4 py-3 border-0 resize-none focus:outline-none focus:ring-0"
                            style="max-height: 400px; min-height: 200px;">
                        </trix-editor>
                    </div>
                </div>

                {{-- Icon --}}
                <div>
                    <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <i data-feather="user" class="w-4 h-4 mr-2 text-purple-600"></i>
                        Icon <span class="text-red-500 ml-1">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-feather="type" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input type="text"
                            name="icon"
                            value="{{ old('icon', $future->icon ?? '') }}"
                            required
                            placeholder="Masukkan icon future"
                            class="block w-full pl-10 pr-3 py-3 border rounded-lg transition-colors duration-200 focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('icon') border-red-500 @enderror">
                    </div>
                    @error('icon')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Footer Actions --}}
        <div class="mt-8 flex items-center justify-between pt-6 border-t border-gray-200">
            <a href="{{ route('admin.kategoriKarya.index') }}"
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
                    <span>{{ isset($kategori) ? 'Update Data' : 'Simpan Data' }}</span>
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
