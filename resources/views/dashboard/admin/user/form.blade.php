@csrf

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

<!-- Success Message -->
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

<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
        <h2 class="text-xl font-bold text-white flex items-center">
            <i data-feather="user-plus" class="w-6 h-6 mr-2"></i>
            {{ isset($user) ? 'Edit Data User' : 'Tambah Data User' }}
        </h2>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">


            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="user" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Nama
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="type" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <input type="text"
                           name="nama"
                           value="{{ old('nama', $user->nama ?? '') }}"
                           required
                           placeholder="Masukkan nama lengkap"
                           class="block w-full pl-10 pr-3 py-3 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 @error('nama') border-red-500 @enderror">
                </div>
                @error('nama')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="hash" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Email
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="credit-card" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <input type="text"
                           name="email"
                           value="{{ old('email', $user->email ?? '') }}"
                           placeholder="Masukkan NIP"
                           required
                           class="block w-full pl-10 pr-3 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 @error('nip') border-red-500 @enderror">
                </div>
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Telepon -->
            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="phone" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Password
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="smartphone" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <input type="password"
                        name="password"
                        value="{{ old('password', $user->password ?? '') }}"
                        placeholder="Password"
                        required
                       
                        class="block w-full pl-10 pr-3 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 @error('password') border-red-500 @enderror">
                </div>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="phone" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Password
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="smartphone" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <input type="password"
                        name="password_confirmation"
                        value="{{ old('password', $user->password ?? '') }}"
                        placeholder="Password"
                        required
                       
                        class="block w-full pl-10 pr-3 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 @error('password') border-red-500 @enderror">
                </div>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <i data-feather="users" class="w-4 h-4 mr-2 text-purple-600"></i>
                    Role
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i data-feather="user-check" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <select name="role"
                            required
                            class="block w-full pl-10 pr-3 py-3 border  rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 bg-white @error('role') border-red-500 @enderror">
                        <option value="">-- Pilih Role --</option>
                          @foreach(\App\Models\Role::all() as $role)
                            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                     @endforeach
                    </select>
                </div>
                @error('role')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>



        </div>

        <div class="mt-8 flex items-center justify-between pt-6 border-t border-gray-200">
            <a href="{{ route('admin.user.index') }}"
               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200">
                <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
                Kembali
            </a>

            <div class="flex space-x-3">
                <button type="reset"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                    <i data-feather="refresh-cw" class="w-4 h-4 mr-2"></i>
                    Reset
                </button>

                <button type="submit"
                        id="submitBtn"
                        class="inline-flex items-center px-6 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-200 transform hover:-translate-y-0.5">
                    <i data-feather="save" class="w-4 h-4 mr-2"></i>
                    <span>{{ isset($user) ? 'Update Data' : 'Simpan Data' }}</span>
                </button>
                <script>

                </script>
                @if(session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: '{{ session('success') }}',
                            confirmButtonColor: '#7c3aed'
                        });
                    });
                </script>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof feather !== 'undefined') {
        feather.replace();
    }
});


document.querySelector('input[name="foto"]').addEventListener('change', function(e) {
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

document.querySelectorAll('input, select, textarea').forEach(function(element) {
    element.addEventListener('blur', function() {
        if (this.hasAttribute('required') && !this.value.trim()) {
            this.classList.add('border-red-500');
            this.classList.remove('border-gray-300');
        } else {
            this.classList.remove('border-red-500');
            this.classList.add('border-gray-300');
        }
    });
});
</script>


