@csrf

<div class="space-y-6">
    <!-- Judul Tugas -->
    <div>
        <label for="title" class="block font-medium text-gray-700 mb-1">Judul Tugas:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $assignment->title ?? '') }}"
               required
               class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <!-- Deskripsi Tugas -->
    <div>
        <label for="instructions" class="block font-medium text-gray-700 mb-1">Deskripsi Tugas:</label>
        <input id="instructions" type="hidden" name="instructions" value="{{ old('instructions', $assignment->instructions ?? '') }}">
        <trix-editor input="instructions"
                     placeholder="Tulis deskripsi tugas di sini..."
                     class="w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                     style="min-height: 200px; max-height: 400px;"></trix-editor>
    </div>

    <!-- Tanggal Selesai -->
    <div>
        <label for="due_date" class="block font-medium text-gray-700 mb-1">Tanggal Selesai:</label>
        <input type="date" name="due_date" id="due_date"
               value="{{ old('due_date', isset($assignment) ? \Carbon\Carbon::parse($assignment->due_date)->format('Y-m-d') : '') }}"
               required
               class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <!-- Pilih Kelas -->
    <div>
        <label for="kelas_id" class="block font-medium text-gray-700 mb-1">Kelas:</label>
        <select name="kelas_id" id="kelas_id"
                required
                class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @foreach ($kelases as $kelas)
                <option value="{{ $kelas->id }}" {{ (old('kelas_id', $assignment->kelas_id ?? '') == $kelas->id) ? 'selected' : '' }}>
                    {{ $kelas->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Link Tugas -->
    <div>
        <label for="link" class="block font-medium text-gray-700 mb-1">Link Tugas:</label>
        <input type="url" name="link" id="link" value="{{ old('link', $assignment->link ?? '') }}"
               placeholder="Masukkan link tugas"
               class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <!-- Upload File -->
    <div>
        <label for="file" class="block font-medium text-gray-700 mb-1">Upload PDF atau File Lainnya:</label>
        <input type="file" name="file" accept=".pdf, .doc, .docx, .xls, .xlsx"
               class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0 file:text-sm file:font-semibold
                      file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
        @if(isset($assignment) && $assignment->file)
            <p class="mt-2 text-sm text-gray-600">
                File saat ini: <a href="{{ asset('storage/' . $assignment->file) }}" target="_blank" class="text-blue-600 underline">{{ basename($assignment->file) }}</a>
            </p>
        @endif
    </div>

    <!-- Upload Foto -->
    <div>
        <label for="photos" class="block font-medium text-gray-700 mb-1">Upload Foto:</label>
        <input type="file" name="photos[]" id="photos" accept="image/*" multiple
               class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0 file:text-sm file:font-semibold
                      file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
        @if(isset($assignment) && $assignment->photos->count())
            <div class="mt-4 grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($assignment->photos as $photo)
                    <div class="border rounded shadow p-2">
                        <img src="{{ asset('storage/' . $photo->photo_path) }}" alt="Photo" class="w-full h-auto rounded">
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Tombol Submit -->
    <div class="flex items-center space-x-4">
        <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
            {{ isset($assignment) ? 'Update' : 'Simpan' }} Tugas
        </button>
        <a href="{{ route('assignments.index') }}"
           class="text-gray-700 hover:text-blue-600 underline">
            Kembali ke Daftar Tugas
        </a>
    </div>
</div>
