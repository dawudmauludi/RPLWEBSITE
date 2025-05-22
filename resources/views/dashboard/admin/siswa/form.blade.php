@csrf
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(isset($siswa))
    <input type="hidden" name="user_id" value="{{ $siswa->user_id }}">
    <div class="form-group mb-3">
        <label>User</label>
        <input type="text" class="form-control" value="{{ $siswa->user->name }} ({{ $siswa->user->email }})" disabled>
    </div>
@else
    <div class="form-group mb-3">
        <label for="user_id">User</label>
        <select name="user_id" id="user_id" class="form-control" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
            @endforeach
        </select>
    </div>
@endif

<div class="form-group mb-3">
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $siswa->nama ?? '') }}">
</div>

<div class="form-group mb-3">
    <label for="nisn">NISN</label>
    <input type="text" name="nisn" id="nisn" class="form-control" value="{{ old('nisn', $siswa->nisn ?? '') }}">
</div>

<div class="form-group mb-3">
    <label for="jenkel">Jenis Kelamin</label>
    <select name="jenkel" id="jenkel" class="form-control">
        <option value="Laki-laki" {{ old('jenkel', $siswa->jenkel ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ old('jenkel', $siswa->jenkel ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
</div>

<div class="form-group mb-3">
    <label for="telepon">Telepon</label>
    <input type="text" name="telepon" id="telepon" class="form-control" value="{{ old('telepon', $siswa->telepon ?? '') }}">
</div>

<div class="form-group mb-3">
    <label for="alamat">Alamat</label>
    <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat', $siswa->alamat ?? '') }}</textarea>
</div>

<div class="form-group mb-3">
    <label for="tempat_lahir">Tempat Lahir</label>
    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $siswa->tempat_lahir ?? '') }}">
</div>

<div class="form-group mb-3">
    <label for="tanggal_lahir">Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir ?? '') }}">
</div>

<div class="form-group mb-3">
    <label for="agama">Agama</label>
    <select name="agama" id="agama" class="form-control">
        @foreach(['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'] as $agama)
            <option value="{{ $agama }}" {{ old('agama', $siswa->agama ?? '') == $agama ? 'selected' : '' }}>{{ $agama }}</option>
        @endforeach
    </select>
</div>

<div class="form-group mb-3">
    <label for="kelas_id">Kelas</label>
    <select name="kelas_id" id="kelas_id" class="form-control" required>
        @foreach($kelas as $k)
            <option value="{{ $k->id }}" {{ old('kelas_id', $siswa->kelas_id ?? '') == $k->id ? 'selected' : '' }}>
                {{ $k->nama }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group mb-3">
    <label for="foto">Foto</label>
    <input type="file" name="foto" id="foto" class="form-control">
    @if(!empty($siswa->foto))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $siswa->foto) }}" width="100">
        </div>
    @endif
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
