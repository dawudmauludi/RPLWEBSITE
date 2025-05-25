@extends('layouts.masterDashboard')

@section('title', 'Edit Ulangan')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Ulangan</h4>
                    <a href="{{ route('ulangans.show', $ulangan) }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <!-- Current Status Info -->
                    <div class="alert alert-info">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Status Saat Ini:</strong>
                                <span class="badge badge-{{ $ulangan->status == 'Sedang Berlangsung' ? 'success' : ($ulangan->status == 'Belum Dimulai' ? 'warning' : 'secondary') }}">
                                    {{ $ulangan->status }}
                                </span>
                            </div>
                            <div class="col-md-6">
                                <strong>Waktu Mulai:</strong> {{ $ulangan->mulai->format('d/m/Y H:i') }}
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('ulangans.update', $ulangan) }}" method="POST" id="editUlanganForm">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="kelas_id" class="form-label">Kelas <span class="text-danger">*</span></label>
                            <select name="kelas_id" id="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror" required>
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $k)
                                <option value="{{ $k->id }}" {{ (old('kelas_id', $ulangan->kelas_id) == $k->id) ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="judul" class="form-label">Judul Ulangan <span class="text-danger">*</span></label>
                            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
                                   value="{{ old('judul', $ulangan->judul) }}" required maxlength="255">
                            @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="link" class="form-label">Link Ulangan <span class="text-danger">*</span></label>
                            <input type="url" name="link" id="link" class="form-control @error('link') is-invalid @enderror"
                                   value="{{ old('link', $ulangan->link) }}" required placeholder="https://forms.google.com/...">
                            <small class="form-text text-muted">Masukkan link Google Form atau platform ulangan lainnya</small>
                            @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <!-- Preview link button -->
                            <div class="mt-2">
                                <button type="button" class="btn btn-sm btn-outline-info" onclick="previewLink()">
                                    <i class="fas fa-external-link-alt"></i> Preview Link
                                </button>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                      rows="4" required>{{ old('deskripsi', $ulangan->deskripsi) }}</textarea>
                            <div class="form-text text-muted">
                                <span id="charCount">0</span>/1000 karakter
                            </div>
                            @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mulai" class="form-label">Waktu Mulai <span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="mulai" id="mulai" class="form-control @error('mulai') is-invalid @enderror"
                                           value="{{ old('mulai', $ulangan->mulai->timezone('Asia/Jakarta')->format('Y-m-d\TH:i')) }}" required min="{{ date('Y-m-d\TH:i') }}">
                                    @error('mulai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="selesai" class="form-label">Waktu Selesai <span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="selesai" id="selesai" class="form-control @error('selesai') is-invalid @enderror"
                                           value="{{ old('selesai', $ulangan->selesai->timezone('Asia/Jakarta')->format('Y-m-d\TH:i')) }}" required>
                                    @error('selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Duration Display -->
                        <div class="mb-3">
                            <div class="alert alert-light">
                                <strong>Durasi Ulangan:</strong> <span id="duration">-</span>
                            </div>
                        </div>

                        <!-- Warning about editing -->
                        <div class="alert alert-warning">
                            <h6><i class="fas fa-exclamation-triangle"></i> Perhatian:</h6>
                            <ul class="mb-0">
                                <li>Ulangan yang sudah dimulai tidak dapat diedit</li>
                                <li>Perubahan akan memengaruhi siswa yang akan mengikuti ulangan</li>
                                <li>Pastikan link ulangan sudah benar sebelum waktu mulai</li>
                            </ul>
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <a href="{{ route('ulangans.show', $ulangan) }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <i class="fas fa-save"></i> Update Ulangan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mulaiInput = document.getElementById('mulai');
    const selesaiInput = document.getElementById('selesai');
    const durationSpan = document.getElementById('duration');
    const deskripsiTextarea = document.getElementById('deskripsi');
    const charCountSpan = document.getElementById('charCount');

    function updateDuration() {
        const mulai = new Date(mulaiInput.value);
        const selesai = new Date(selesaiInput.value);

        if (mulai && selesai && selesai > mulai) {
            const diffMs = selesai - mulai;
            const diffHours = Math.floor(diffMs / (1000 * 60 * 60));
            const diffMinutes = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));

            durationSpan.textContent = `${diffHours} jam ${diffMinutes} menit`;

            // if (diffMs < 15 * 60 * 1000) {
            //     durationSpan.className = 'text-danger fw-bold';
            //     durationSpan.textContent += ' (Terlalu singkat - minimal 15 menit)';
            // }  else {
            //     durationSpan.className = 'text-success fw-bold';
            // }
        } else {
            durationSpan.textContent = '-';
            durationSpan.className = '';
        }
    }

    function updateCharCount() {
        const count = deskripsiTextarea.value.length;
        charCountSpan.textContent = count;

        if (count > 1000) {
            charCountSpan.className = 'text-danger fw-bold';
        } else if (count > 800) {
            charCountSpan.className = 'text-warning fw-bold';
        } else {
            charCountSpan.className = 'text-muted';
        }
    }

    mulaiInput.addEventListener('change', function() {
        selesaiInput.min = this.value;
        updateDuration();
    });

    selesaiInput.addEventListener('change', updateDuration);
    deskripsiTextarea.addEventListener('input', updateCharCount);

    updateDuration();
    updateCharCount();

    document.getElementById('editUlanganForm').addEventListener('submit', function(e) {
        const mulai = new Date(mulaiInput.value);
        const selesai = new Date(selesaiInput.value);
        const now = new Date();

        if (mulai < now) {
            e.preventDefault();
            alert('Waktu mulai tidak boleh kurang dari sekarang!');
            return false;
        }

        if (selesai <= mulai) {
            e.preventDefault();
            alert('Waktu selesai harus setelah waktu mulai!');
            return false;
        }

        // const diffMs = selesai - mulai;
        // if (diffMs < 15 * 60 * 1000) {
        //     e.preventDefault();
        //     alert('Durasi ulangan minimal 15 menit!');
        //     return false;
        // }


        if (!confirm('Apakah Anda yakin ingin mengupdate ulangan ini?')) {
            e.preventDefault();
            return false;
        }
    });
});

function previewLink() {
    const link = document.getElementById('link').value;
    if (link) {
        window.open(link, '_blank');
    } else {
        alert('Masukkan link terlebih dahulu!');
    }
}
</script>
@endsection
