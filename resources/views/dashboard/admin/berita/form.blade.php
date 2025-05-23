<div class="grid gap-4">
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <input type="text" name="judul" placeholder="Judul" value="{{ old('judul', $berita->judul ?? '') }}" class="border p-2 rounded">
    <input type="text" name="slug" placeholder="Slug" value="{{ old('slug', $berita->slug ?? '') }}" class="border p-2 rounded" readonly>
    <textarea name="exerpt" placeholder="Exerpt" class="border p-2 rounded">{{ old('exerpt', $berita->exerpt ?? '') }}</textarea>
    <textarea name="isi" placeholder="Isi" class="border p-2 rounded">{{ old('isi', $berita->isi ?? '') }}</textarea>
    <select name="category_berita_id" class="border p-2 rounded">
        <option value="">Pilih Kategori</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_berita_id', $berita->category_berita_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->nama }}
            </option>
        @endforeach
    </select>
    @if(isset($berita) && $berita->gambar_berita)
    <div class="mb-2 flex gap-2 flex-wrap">
        @foreach(json_decode($berita->gambar_berita) as $gambar)
            <img src="{{ asset('storage/' . $gambar) }}" alt="Gambar Berita" class="h-24 rounded border">
        @endforeach
    </div>
@endif
    <input type="file" name="gambar_berita[]" class="border p-2 rounded" multiple id="gambar_berita_input">
    @if(old('gambar_berita'))
        <div class="text-sm text-gray-600 mt-1">
            File sebelumnya:
            @foreach((array) old('gambar_berita') as $file)
                <div>{{ $file }}</div>
            @endforeach
        </div>
    @endif
    <div id="gambar_berita_preview" class="flex gap-2 mt-2 flex-wrap"></div>
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
                            wrapper.className = 'relative inline-block';

                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'h-24 rounded border';

                            const btn = document.createElement('button');
                            btn.type = 'button';
                            btn.innerHTML = '&times;';
                            btn.className = 'absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center -mt-2 -mr-2';

                            btn.addEventListener('click', function () {
                                filesArr.splice(index, 1);
                                updateInputFiles();
                                renderPreview();
                            });

                            wrapper.appendChild(img);
                            wrapper.appendChild(btn);
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
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const judulInput = document.querySelector('input[name="judul"]');
            const slugInput = document.querySelector('input[name="slug"]');
            const isiTextarea = document.querySelector('textarea[name="isi"]');
            const exerptTextarea = document.querySelector('textarea[name="exerpt"]');

            function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Ganti spasi dengan -
                .replace(/[^\w\-]+/g, '')       // Hapus semua karakter selain huruf, angka, dan -
                .replace(/\-\-+/g, '-')         // Ganti beberapa - menjadi satu -
                .replace(/^-+/, '')             // Hapus - di awal teks
                .replace(/-+$/, '');            // Hapus - di akhir teks
            }

            judulInput.addEventListener('input', function () {
            slugInput.value = slugify(judulInput.value);
            });

            isiTextarea.addEventListener('input', function () {
            let plainText = isiTextarea.value.replace(/(<([^>]+)>)/gi, "");
            if (plainText.length > 100) {
                exerptTextarea.value = plainText.substring(0, 100) + '...';
            } else {
                exerptTextarea.value = plainText;
            }
            });
        });
    </script>
</div>
