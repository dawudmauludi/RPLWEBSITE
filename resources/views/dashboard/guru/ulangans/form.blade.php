@csrf
@if(isset($ulangan))
    @method('PUT')
@endif

<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-primary px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="bg-white bg-opacity-20 p-2 rounded-lg">
                            <i data-feather="{{ isset($ulangan) ? 'edit-3' : 'plus-circle' }}" class="w-6 h-6 text-white"></i>
                        </div>
                        <h1 class="text-xl font-semibold text-white">
                            {{ isset($ulangan) ? 'Edit Ulangan' : 'Tambah Ulangan Baru' }}
                        </h1>
                    </div>
                    @if(isset($ulangan))
                        <a href="{{ route('ulangans.show', $ulangan) }}" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-4 py-2 rounded-lg flex items-center space-x-2 transition-all duration-200">
                            <i data-feather="arrow-left" class="w-4 h-4"></i>
                            <span>Kembali</span>
                        </a>
                    @endif
                </div>
            </div>

            <div class="p-6 space-y-6">
                <!-- Error Alert -->
                @if(session('error'))
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                        <div class="flex items-center">
                            <i data-feather="alert-circle" class="w-5 h-5 text-red-500 mr-2"></i>
                            <p class="text-red-700">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                @if(isset($ulangan))
                    <!-- Status Info -->
                    <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center space-x-2">
                                <i data-feather="info" class="w-5 h-5 text-purple-600"></i>
                                <span class="font-medium text-gray-700">Status Saat Ini:</span>
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                    {{ $ulangan->status == 'Sedang Berlangsung' ? 'bg-green-100 text-green-800' : ($ulangan->status == 'Belum Dimulai' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                    {{ $ulangan->status }}
                                </span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i data-feather="clock" class="w-5 h-5 text-purple-600"></i>
                                <span class="font-medium text-gray-700">Waktu Mulai:</span>
                                <span class="text-gray-600">{{ $ulangan->mulai->format('d/m/Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Form Fields -->
                <div class="space-y-6">
                    <!-- Kelas -->
                    <div>
                        <label for="kelas_id" class="block text-sm font-medium text-gray-700 mb-2">
                            <div class="flex items-center space-x-2">
                                <i data-feather="users" class="w-4 h-4"></i>
                                <span>Kelas <span class="text-red-500">*</span></span>
                            </div>
                        </label>
                        <select name="kelas_id" id="kelas_id" class="w-full px-4 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors @error('kelas_id') border-red-500 @enderror" required>
                            <option value="">Pilih Kelas</option>
                            @foreach($kelas as $k)
                                <option value="{{ $k->id }}" {{ old('kelas_id', $ulangan->kelas_id ?? '') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <p class="mt-1 text-sm text-red-600 flex items-center space-x-1">
                                <i data-feather="alert-circle" class="w-4 h-4"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Judul -->
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">
                            <div class="flex items-center space-x-2">
                                <i data-feather="book-open" class="w-4 h-4"></i>
                                <span>Judul Ulangan <span class="text-red-500">*</span></span>
                            </div>
                        </label>
                        <input type="text" name="judul" id="judul"
                               class="w-full px-4 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors @error('judul') border-red-500 @enderror"
                               value="{{ old('judul', $ulangan->judul ?? '') }}" required maxlength="255"
                               placeholder="Contoh: Ulangan Harian Matematika Bab 1">
                        @error('judul')
                            <p class="mt-1 text-sm text-red-600 flex items-center space-x-1">
                                <i data-feather="alert-circle" class="w-4 h-4"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Link -->
                    <div>
                        <label for="link" class="block text-sm font-medium text-gray-700 mb-2">
                            <div class="flex items-center space-x-2">
                                <i data-feather="link" class="w-4 h-4"></i>
                                <span>Link Ulangan <span class="text-red-500">*</span></span>
                            </div>
                        </label>
                        <input type="url" name="link" id="link"
                               class="w-full px-4 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors @error('link') border-red-500 @enderror"
                               value="{{ old('link', $ulangan->link ?? '') }}" required
                               placeholder="https://forms.google.com/...">
                        <p class="mt-1 text-sm text-gray-500 flex items-center space-x-1">
                            <i data-feather="info" class="w-4 h-4"></i>
                            <span>Masukkan link Google Form atau platform ulangan lainnya</span>
                        </p>
                        @error('link')
                            <p class="mt-1 text-sm text-red-600 flex items-center space-x-1">
                                <i data-feather="alert-circle" class="w-4 h-4"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                        @if(isset($ulangan))
                            <div class="mt-3">
                                <button type="button" onclick="previewLink()"
                                        class="bg-purple-50 hover:bg-purple-100 text-purple-700 px-4 py-2 rounded-lg flex items-center space-x-2 transition-colors border border-purple-200">
                                    <i data-feather="external-link" class="w-4 h-4"></i>
                                    <span>Preview Link</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                            <div class="flex items-center space-x-2">
                                <i data-feather="file-text" class="w-4 h-4"></i>
                                <span>Deskripsi <span class="text-red-500">*</span></span>
                            </div>
                        </label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" required
                                  class="w-full px-4 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors resize-none @error('deskripsi') border-red-500 @enderror"
                                  placeholder="Masukkan deskripsi ulangan, petunjuk pengerjaan, atau informasi penting lainnya...">{{ old('deskripsi', $ulangan->deskripsi ?? '') }}</textarea>
                        @if(isset($ulangan))
                            <div class="mt-1 flex justify-between items-center">
                                <p class="text-sm text-gray-500">
                                    <span id="charCount">0</span>/1000 karakter
                                </p>
                            </div>
                        @endif
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600 flex items-center space-x-1">
                                <i data-feather="alert-circle" class="w-4 h-4"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Waktu -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="mulai" class="block text-sm font-medium text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <i data-feather="play-circle" class="w-4 h-4"></i>
                                    <span>Waktu Mulai <span class="text-red-500">*</span></span>
                                </div>
                            </label>
                            <input type="datetime-local" name="mulai" id="mulai"
                                   class="w-full px-4 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors @error('mulai') border-red-500 @enderror"
                                   value="{{ old('mulai', isset($ulangan) ? $ulangan->mulai->timezone('Asia/Jakarta')->format('Y-m-d\TH:i') : '') }}"
                                   required min="{{ date('Y-m-d\TH:i') }}">
                            @error('mulai')
                                <p class="mt-1 text-sm text-red-600 flex items-center space-x-1">
                                    <i data-feather="alert-circle" class="w-4 h-4"></i>
                                    <span>{{ $message }}</span>
                                </p>
                            @enderror
                        </div>
                        <div>
                            <label for="selesai" class="block text-sm font-medium text-gray-700 mb-2">
                                <div class="flex items-center space-x-2">
                                    <i data-feather="stop-circle" class="w-4 h-4"></i>
                                    <span>Waktu Selesai <span class="text-red-500">*</span></span>
                                </div>
                            </label>
                            <input type="datetime-local" name="selesai" id="selesai"
                                   class="w-full px-4 py-3 border \ rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors @error('selesai') border-red-500 @enderror"
                                   value="{{ old('selesai', isset($ulangan) ? $ulangan->selesai->timezone('Asia/Jakarta')->format('Y-m-d\TH:i') : '') }}" required>
                            @error('selesai')
                                <p class="mt-1 text-sm text-red-600 flex items-center space-x-1">
                                    <i data-feather="alert-circle" class="w-4 h-4"></i>
                                    <span>{{ $message }}</span>
                                </p>
                            @enderror
                        </div>
                    </div>

                    @if(isset($ulangan))
                        <!-- Duration Display -->
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center space-x-2">
                                <i data-feather="clock" class="w-5 h-5 text-gray-600"></i>
                                <span class="font-medium text-gray-700">Durasi Ulangan:</span>
                                <span id="duration" class="text-gray-600 font-mono">-</span>
                            </div>
                        </div>

                        <!-- Warning -->
                        <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                            <div class="flex items-start space-x-3">
                                <i data-feather="alert-triangle" class="w-5 h-5 text-amber-600 mt-0.5 flex-shrink-0"></i>
                                <div>
                                    <h6 class="font-medium text-amber-800 mb-2">Perhatian:</h6>
                                    <ul class="text-sm text-amber-700 space-y-1">
                                        <li class="flex items-start space-x-2">
                                            <i data-feather="circle" class="w-2 h-2 mt-2.5 flex-shrink-0"></i>
                                            <span>Ulangan yang sudah dimulai tidak dapat diedit</span>
                                        </li>
                                        <li class="flex items-start space-x-2">
                                            <i data-feather="circle" class="w-2 h-2 mt-2.5 flex-shrink-0"></i>
                                            <span>Perubahan akan memengaruhi siswa yang akan mengikuti ulangan</span>
                                        </li>
                                        <li class="flex items-start space-x-2">
                                            <i data-feather="circle" class="w-2 h-2 mt-2.5 flex-shrink-0"></i>
                                            <span>Pastikan link ulangan sudah benar sebelum waktu mulai</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a href="{{ isset($ulangan) ? route('ulangans.show', $ulangan) : route('ulangans.index') }}"
                       class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg flex items-center space-x-2 transition-colors">
                        <i data-feather="{{ isset($ulangan) ? 'x' : 'arrow-left' }}" class="w-4 h-4"></i>
                        <span>{{ isset($ulangan) ? 'Batal' : 'Kembali' }}</span>
                    </a>
                    <button type="submit" id="submitBtn"
                            class="bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-lg flex items-center space-x-2 transition-colors shadow-sm hover:shadow-md">
                        <i data-feather="{{ isset($ulangan) ? 'save' : 'plus' }}" class="w-4 h-4"></i>
                        <span>{{ isset($ulangan) ? 'Update Ulangan' : 'Simpan Ulangan' }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Initialize Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    feather.replace();

    const mulaiInput = document.getElementById('mulai');
    const selesaiInput = document.getElementById('selesai');
    const deskripsiTextarea = document.getElementById('deskripsi');

    @if(isset($ulangan))
        const durationSpan = document.getElementById('duration');
        const charCountSpan = document.getElementById('charCount');

        function updateDuration() {
            const mulai = new Date(mulaiInput.value);
            const selesai = new Date(selesaiInput.value);

            if (mulai && selesai && selesai > mulai) {
                const diffMs = selesai - mulai;
                const diffHours = Math.floor(diffMs / (1000 * 60 * 60));
                const diffMinutes = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));

                durationSpan.textContent = `${diffHours} jam ${diffMinutes} menit`;
            } else {
                durationSpan.textContent = '-';
            }
        }

        function updateCharCount() {
            const count = deskripsiTextarea.value.length;
            charCountSpan.textContent = count;

            if (count > 1000) {
                charCountSpan.className = 'text-red-600 font-medium';
            } else if (count > 800) {
                charCountSpan.className = 'text-amber-600 font-medium';
            } else {
                charCountSpan.className = 'text-gray-500';
            }
        }

        selesaiInput.addEventListener('change', updateDuration);
        deskripsiTextarea.addEventListener('input', updateCharCount);

        updateDuration();
        updateCharCount();
    @endif

    mulaiInput.addEventListener('change', function() {
        selesaiInput.min = this.value;
        @if(isset($ulangan))
            updateDuration();
        @endif
    });

    @if(isset($ulangan))
        document.getElementById('editUlanganForm').addEventListener('submit', function(e) {
    @else
        document.querySelector('form').addEventListener('submit', function(e) {
    @endif
        const mulai = new Date(mulaiInput.value);
        const selesai = new Date(selesaiInput.value);
        const now = new Date();

        if (mulai < now) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Waktu mulai tidak boleh kurang dari sekarang!',
                confirmButtonColor: '#7c3aed'
            });
            return false;
        }

        if (selesai <= mulai) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Waktu selesai harus setelah waktu mulai!',
                confirmButtonColor: '#7c3aed'
            });
            return false;
        }

        @if(isset($ulangan))
            // if (!confirm('Apakah Anda yakin ingin mengupdate ulangan ini?')) {
            //     e.preventDefault();
            //     return false;
            // } else {
            //     document.getElementById('submitBtn').disabled = true;
            // }
        @endif
    });
});

@if(isset($ulangan))
    function previewLink() {
        const link = document.getElementById('link').value;
        if (link) {
            window.open(link, '_blank');
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Masukkan link terlebih dahulu!',
                confirmButtonColor: '#7c3aed'
            });
        }
    }
@endif
</script>
