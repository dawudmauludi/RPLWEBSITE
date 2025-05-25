@extends('layouts.masterDashboard')

@section('title', 'Tambah Ulangan')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Tambah Ulangan Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('ulangans.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="kelas_id" class="form-label">Kelas <span class="text-danger">*</span></label>
                            <select name="kelas_id" id="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror" required>
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $k)
                                <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
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
                                   value="{{ old('judul') }}" required maxlength="255">
                            @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="link" class="form-label">Link Ulangan <span class="text-danger">*</span></label>
                            <input type="url" name="link" id="link" class="form-control @error('link') is-invalid @enderror"
                                   value="{{ old('link') }}" required placeholder="https://forms.google.com/...">
                            <small class="form-text text-muted">Masukkan link Google Form atau platform ulangan lainnya</small>
                            @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                      rows="4" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="mulai" class="form-label">Waktu Mulai <span class="text-danger">*</span></label>
                            <input type="datetime-local" name="mulai" id="mulai" class="form-control @error('mulai') is-invalid @enderror"
                                   value="{{ old('mulai') }}" required min="{{ date('Y-m-d\TH:i') }}">
                            @error('mulai')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="selesai" class="form-label">Waktu Selesai <span class="text-danger">*</span></label>
                            <input type="datetime-local" name="selesai" id="selesai" class="form-control @error('selesai') is-invalid @enderror"
                                   value="{{ old('selesai') }}" required>
                            @error('selesai')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <a href="{{ route('ulangans.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Ulangan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Validate selesai time when mulai time changes
document.getElementById('mulai').addEventListener('change', function() {
    document.getElementById('selesai').min = this.value;
});
</script>
@endsection
