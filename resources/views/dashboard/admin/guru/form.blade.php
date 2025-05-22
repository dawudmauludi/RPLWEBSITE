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
<div>
    <label>User</label>
    @if(isset($guru) && isset($guru->user))
        <input type="hidden" name="user_id" value="{{ $guru->user_id }}">
        <input type="text" value="{{ $guru->user->nama }} ({{ $guru->user->email }})" disabled>
    @else
        <select name="user_id" required>
            @foreach($users ?? [] as $user)
                <option value="{{ $user->id }}" {{ old('user_id', $guru->user_id ?? '') == $user->id ? 'selected' : '' }}>
                    {{ $user->nama }} ({{ $user->email }})
                </option>
            @endforeach
        </select>
    @endif
</div>
<div>
    <label>Nama</label>
    <input type="text" name="nama" value="{{ old('nama', $guru->nama ?? '') }}" required>
</div>
<div>
    <label>NIP</label>
    <input type="text" name="nip" value="{{ old('nip', $guru->nip ?? '') }}">
</div>
<div>
    <label>Jenis Kelamin</label>
    <select name="jenkel">
        <option value="Laki-laki" {{ old('jenkel', $guru->jenkel ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ old('jenkel', $guru->jenkel ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
</div>
<div>
    <label>Telepon</label>
    <input type="text" name="telepon" value="{{ old('telepon', $guru->telepon ?? '') }}">
</div>
<div>
    <label>Alamat</label>
    <textarea name="alamat">{{ old('alamat', $guru->alamat ?? '') }}</textarea>
</div>
<div>
    <label>Tempat Lahir</label>
    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $guru->tempat_lahir ?? '') }}">
</div>
<div>
    <label>Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $guru->tanggal_lahir ?? '') }}">
</div>
<div>
    <label>Agama</label>
    <select name="agama" required>
        <option value="">-- Pilih Agama --</option>
        <option value="Islam" {{ old('agama', $guru->agama ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
        <option value="Kristen" {{ old('agama', $guru->agama ?? '') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
        <option value="Katolik" {{ old('agama', $guru->agama ?? '') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
        <option value="Hindu" {{ old('agama', $guru->agama ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
        <option value="Budha" {{ old('agama', $guru->agama ?? '') == 'Budha' ? 'selected' : '' }}>Budha</option>
        <option value="Konghucu" {{ old('agama', $guru->agama ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
    </select>
</div>
<div>
    <label>Foto</label>
    <input type="file" name="foto">
    @if(!empty($guru->foto))
        <br>
        <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto Guru" width="100">
    @endif
</div>
<button type="submit">Simpan</button>
