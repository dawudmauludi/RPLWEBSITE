
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
                    <h1 class="text-2xl font-bold text-gray-800">{{ isset($berita) ? 'Edit Berita' : 'Tambah Berita' }}</h1>
                    <p class="text-gray-600 text-sm">{{ isset($berita) ? 'Perbarui informasi berita' : 'Buat berita baru untuk dipublikasikan' }}</p>
                </div>
            </div>
        </div>
        <div class="grid gap-6">
            <!-- Error Alert -->
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

            <!-- Basic Information Card -->
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
                    <!-- Judul -->
                    <div class="space-y-2">
                        <label class="flex items-center text-sm font-medium text-gray-700">
                            <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2h4a1 1 0 110 2h-1v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6H3a1 1 0 110-2h4z"></path>
                            </svg>
                            Judul Berita
                        </label>
                        <input type="text"
                               name="judul"
                               placeholder="Masukkan judul berita yang menarik..."
                               value="{{ old('judul', $berita->judul ?? '') }}"
                               class="w-full px-4 py-3 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white">
                    </div>

                    <!-- Slug -->
                    <div class="space-y-2">
                        <label class="flex items-center text-sm font-medium text-gray-700">
                            <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                            </svg>
                            URL Slug
                        </label>
                        <div class="relative">
                            <input type="text"
                                   name="slug"
                                   placeholder="url-slug-otomatis"
                                   value="{{ old('slug', $berita->slug ?? '') }}"
                                   readonly
                                   class="w-full px-4 py-3 border border-purple-200 rounded-lg bg-gray-100 text-gray-600 cursor-not-allowed">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500">Slug akan dibuat otomatis dari judul</p>
                    </div>

                    <!-- Category -->
                    <div class="space-y-2">
                        <label class="flex items-center text-sm font-medium text-gray-700">
                            <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Kategori
                        </label>
                        <div class="relative">
                            <select name="category_berita_id"
                                    class="w-full px-4 py-3 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white appearance-none">
                                <option value="">Pilih kategori berita...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_berita_id', $berita->category_berita_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Card -->
            <div class="bg-white rounded-xl shadow-lg border border-purple-100 p-6">
                <div class="flex items-center mb-6">
                    <div class="bg-gradient-to-r from-purple-100 to-indigo-100 p-2 rounded-lg mr-3">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800">Konten Berita</h2>
                </div>

                <div class="grid gap-6">
                    <!-- Isi -->
                    <div class="space-y-2">
                        <label class="flex items-center text-sm font-medium text-gray-700">
                            <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>
                            Isi Berita
                        </label>
                        <div class="trix-container w-full border  rounded-lg focus-within:ring-2 focus-within:ring-purple-500 focus-within:border-transparent transition-all duration-200 bg-gray-50 focus-within:bg-white @error('isi') border-red-500 @enderror">
                        <input id="isi" type="hidden" name="isi" value="{{ old('isi', $berita->isi ?? '') }}">
                        <trix-editor input="isi"
                                    placeholder="Tulis isi berita lengkap di sini..."
                                    class="w-full max-w-full min-w-0 px-4 py-3 resize-none overflow-auto border-0 focus:outline-none focus:ring-0"
                                    style="max-height: 400px; min-height: 200px;">
                        </trix-editor>
                        </div>
                    </div>

                    <!-- Excerpt -->
                    <div class="space-y-2">
                        <label class="flex items-center text-sm font-medium text-gray-700">
                            <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Ringkasan/Excerpt
                        </label>
                        <div class="relative">
                            <textarea name="exerpt"
                                      placeholder="Ringkasan akan dibuat otomatis dari isi berita..."
                                      rows="3"
                                      readonly
                                      class="w-full px-4 py-3 border border-purple-200 rounded-lg bg-gray-100 text-gray-600 cursor-not-allowed resize-vertical">{{ old('exerpt', $berita->exerpt ?? '') }}</textarea>
                            <div class="absolute top-3 right-3">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500">Ringkasan akan dibuat otomatis dari 100 karakter pertama isi berita</p>
                    </div>
                </div>
            </div>

            <!-- Media Card -->
            <div class="bg-white rounded-xl shadow-lg border border-purple-100 p-6">
                <div class="flex items-center mb-6">
                    <div class="bg-gradient-to-r from-purple-100 to-indigo-100 p-2 rounded-lg mr-3">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800">Media & Gambar</h2>
                </div>

                <!-- Existing Images -->
                @if(isset($berita) && $berita->gambar_berita)
                    <div class="mb-6">
                        <h3 class="text-sm font-medium text-gray-700 mb-3">Gambar Saat Ini:</h3>
                        <div class="flex gap-3 flex-wrap">
                            @foreach(json_decode($berita->gambar_berita) as $gambar)
                                <div class="relative group">
                                    <img src="{{ asset('storage/' . $gambar) }}"
                                         alt="Gambar Berita"
                                         class="h-24 w-24 object-cover rounded-lg border-2 border-purple-200 group-hover:border-purple-400 transition-colors duration-200">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-lg transition-all duration-200 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- File Upload -->
                <div class="space-y-4">
                    <label class="flex items-center text-sm font-medium text-gray-700">
                        <svg class="w-4 h-4 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        Upload Gambar Baru
                    </label>

                    <div class="relative">
                        <input type="file"
                               name="gambar_berita[]"
                               multiple
                               id="gambar_berita_input"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                               accept="image/*">
                        <div class="border-2 border-dashed border-purple-300 rounded-lg p-8 text-center hover:border-purple-400 transition-colors duration-200 bg-gradient-to-br from-purple-25 to-indigo-25">
                            <svg class="w-12 h-12 text-purple-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="text-gray-600 font-medium mb-1">Klik untuk upload atau drag & drop</p>
                            <p class="text-gray-500 text-sm">PNG, JPG, JPEG hingga 10MB</p>
                            <p class="text-purple-600 text-sm mt-2 font-medium">Multiple files allowed</p>
                        </div>
                    </div>

                    @if(old('gambar_berita'))
                        <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                            <div class="flex items-center mb-2">
                                <svg class="w-4 h-4 text-purple-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm font-medium text-purple-800">File sebelumnya:</span>
                            </div>
                            <div class="space-y-1">
                                @foreach((array) old('gambar_berita') as $file)
                                    <div class="text-sm text-purple-700">{{ $file }}</div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Preview Area -->
                    <div id="gambar_berita_preview" class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4"></div>
                </div>
            </div>
            <div class="flex justify-between items-center mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded shadow-md transition-all">
                    Simpan
                </button>
                <a href="{{ route('admin.berita.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-6 rounded shadow-sm transition-all">
                    Kembali
                </a>
            </div>
        </div>
    </div>


    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('gambar_berita_input');
            const preview = document.getElementById('gambar_berita_preview');
            let filesArr = [];

            input.addEventListener('change', function (e) {
                const newFiles = Array.from(input.files);
                newFiles.forEach(file => {
                    if (!filesArr.some(f => f.name === file.name && f.size === file.size)) {
                        filesArr.push(file);
                    }
                });
                updateInputFiles();
                renderPreview();
            });

            function renderPreview() {
                preview.innerHTML = '';
                filesArr.forEach((file, index) => {
                    if (file.type.startsWith('image/')) {
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
                                filesArr.splice(index, 1);
                                updateInputFiles();
                                renderPreview();
                            });

                            const overlay = document.createElement('div');
                            overlay.className = 'absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-lg transition-all duration-200 flex items-center justify-center';

                            const fileName = document.createElement('div');
                            fileName.className = 'absolute bottom-0 left-0 right-0 bg-black bg-opacity-75 text-white text-xs p-2 rounded-b-lg truncate';
                            fileName.textContent = file.name;

                            wrapper.appendChild(img);
                            wrapper.appendChild(btn);
                            wrapper.appendChild(overlay);
                            wrapper.appendChild(fileName);
                            preview.appendChild(wrapper);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            function updateInputFiles() {
                const dt = new DataTransfer();
                filesArr.forEach(file => dt.items.add(file));
                input.files = dt.files;
            }
        });

        // Auto-generate slug and excerpt
        document.addEventListener('DOMContentLoaded', function () {
    const judulInput = document.querySelector('input[name="judul"]');
    const slugInput = document.querySelector('input[name="slug"]');
    const isiInput = document.querySelector('input[name="isi"]');
    const exerptTextarea = document.querySelector('textarea[name="exerpt"]');

    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Ganti spasi dengan -
            .replace(/[^\w\-]+/g, '')       // Hapus semua karakter selain huruf, angka, dan -
            .replace(/\-\-+/g, '-')         // Ganti beberapa - menjadi satu -
            .replace(/^-+/, '')             // Hapus - di awal teks
            .replace(/-+$/, '');            // Hapus - di akhir teks
    }

    // Slug generator
    if (judulInput && slugInput) {
        judulInput.addEventListener('input', function () {
            slugInput.value = slugify(judulInput.value);
        });
    }

    // Excerpt generator dari Trix editor
    document.addEventListener('trix-change', function () {
        if (!isiInput || !exerptTextarea) return;

        const htmlContent = isiInput.value;
        const plainText = htmlContent.replace(/(<([^>]+)>)/gi, "").trim();

        exerptTextarea.value = plainText.length > 100
            ? plainText.substring(0, 100) + '...'
            : plainText;
    });
});
    </script>

    <script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

</div>
