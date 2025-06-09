@extends('layouts.app')
@section('title','Registrasi')
@section('content')
<main class="min-h-screen bg-gray-50 flex">
    <!-- Left Side - Logo and Branding -->
    <div class="hidden lg:flex lg:w-1/2 bg-purple-600 relative overflow-hidden">
        <div class="absolute inset-0 bg-primary"></div>
        <div class="relative mx-auto z-10 flex flex-col justify-center items-center text-white p-12">
            <!-- Logo Container -->
            <div class="mb-8">
                <div class="w-32 h-32 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                       <img src="{{ asset('images/LOGO_SMK_1.png') }}" alt="">
                </div>
            </div>

            <!-- Brand Text -->
            <div class="text-center max-w-md">
                <h1 class="text-4xl font-bold mb-4 font-[Poppins]">Website RPL</h1>
                <p class="text-xl text-purple-100 mb-8">Platform Pembelajaran & Kolaborasi</p>
                <div class="space-y-4 text-purple-100">
                    <div class="flex items-center justify-center space-x-3">
                        <i data-feather="users" class="w-5 h-5"></i>
                        <span>Terhubung dengan komunitas RPL</span>
                    </div>
                    <div class="flex items-center justify-center space-x-3">
                        <i data-feather="book-open" class="w-5 h-5"></i>
                        <span>Akses materi pembelajaran terkini</span>
                    </div>
                    <div class="flex items-center justify-center space-x-3">
                        <i data-feather="award" class="w-5 h-5"></i>
                        <span>Kembangkan skill programming</span>
                    </div>
                </div>
            </div>

            <!-- Decorative Elements -->
            <div class="absolute top-10 left-10 w-20 h-20 border border-white/20 rounded-full"></div>
            <div class="absolute bottom-10 right-10 w-16 h-16 border border-white/20 rounded-full"></div>
            <div class="absolute top-1/3 right-20 w-12 h-12 border border-white/20 rounded-full"></div>
        </div>
    </div>

    <!-- Right Side - Registration Form -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center px-6 py-12 lg:px-12">
        <div class="max-w-md mx-auto w-full">
            <!-- Mobile Logo -->
            <div class="lg:hidden text-center mb-8">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                       <img src="{{ asset('images/LOGO_SMK_1.png') }}" alt="">
                </div>
                <h1 class="text-2xl font-bold text-gray-900 font-[Poppins]">Website RPL</h1>
            </div>

            <!-- Header -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Buat Akun Baru</h2>
                <p class="text-gray-600">Bergabunglah dengan komunitas RPL sekarang</p>
            </div>

            <!-- Error Messages -->
            @if($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200">
                <div class="flex items-start">
                    <i data-feather="alert-circle" class="w-5 h-5 text-red-500 mt-0.5 mr-3 flex-shrink-0"></i>
                    <div>
                        <h3 class="text-sm font-medium text-red-800 mb-2">
                            Terdapat {{ $errors->count() }} kesalahan yang harus diperbaiki
                        </h3>
                        <ul class="text-sm text-red-700 space-y-1">
                            @foreach($errors->all() as $error)
                                <li class="flex items-start">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full mt-2 mr-2 flex-shrink-0"></span>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <!-- Registration Form -->
            <form action="{{ route('registrasi.post') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Username Input -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-feather="user" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 @error('name') border-red-500 @enderror"
                            placeholder="Masukkan username"
                            value="{{ old('name') }}"
                            required
                        >
                    </div>
                </div>

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-feather="mail" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 @error('email') border-red-500 @enderror"
                            placeholder="email@contoh.com"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>
                </div>

                <!-- Password Input -->
                <div>
                    <label for="passwordInput" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-feather="lock" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input
                            type="password"
                            name="password"
                            id="passwordInput"
                            placeholder="Buat password"
                            class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 @error('password') border-red-500 @enderror"
                            oninput="checkPasswordRules()"
                            required
                        />
                        <button
                            type="button"
                            onclick="togglePassword()"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none"
                        >
                            <i data-feather="eye-off" id="eyeClosed" class="w-5 h-5"></i>
                            <i data-feather="eye" id="eyeOpen" class="w-5 h-5 hidden"></i>
                        </button>
                    </div>

                    <!-- Password Requirements -->
                    <div class="mt-3 space-y-2">
                        <div class="flex items-center text-sm">
                            <i data-feather="check" id="check-length" class="w-4 h-4 mr-2 text-gray-400"></i>
                            <span class="text-gray-600">Minimal 8 karakter</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i data-feather="check" id="check-uppercase" class="w-4 h-4 mr-2 text-gray-400"></i>
                            <span class="text-gray-600">Minimal 1 huruf besar</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i data-feather="check" id="check-number" class="w-4 h-4 mr-2 text-gray-400"></i>
                            <span class="text-gray-600">Minimal 1 angka</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i data-feather="check" id="check-special" class="w-4 h-4 mr-2 text-gray-400"></i>
                            <span class="text-gray-600">Minimal 1 karakter khusus</span>
                        </div>
                    </div>
                </div>

                <!-- Confirm Password Input -->
                <div>
                    <label for="passwordInput2" class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-feather="lock" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input
                            type="password"
                            name="password_confirmation"
                            id="passwordInput2"
                            placeholder="Ulangi password"
                            class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                            required
                        />
                        <button
                            type="button"
                            onclick="togglePassword2()"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none"
                        >
                            <i data-feather="eye-off" id="eyeClosed2" class="w-5 h-5"></i>
                            <i data-feather="eye" id="eyeOpen2" class="w-5 h-5 hidden"></i>
                        </button>
                    </div>
                    <p id="errorText" class="mt-2 text-sm text-red-600 hidden flex items-center">
                        <i data-feather="alert-triangle" class="w-4 h-4 mr-1"></i>
                        <span>Password harus memenuhi semua syarat!</span>
                    </p>
                </div>

                <!-- Role Selection -->
                <div>
                    <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">Role</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-feather="user-check" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <select name="role"
                                required
                                class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 bg-white @error('role') border-red-500 @enderror">
                            <option value="">-- Pilih Role --</option>
                            @foreach(\App\Models\Role::whereIn('name', ['alumni','siswa'])->get() as $role)
                                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full py-3 px-4 rounded-lg text-sm font-semibold text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-200 flex items-center justify-center space-x-2"
                >
                    <i data-feather="user-plus" class="w-5 h-5"></i>
                    <span>Daftar Sekarang</span>
                </button>
            </form>

            <!-- Login Link -->
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-600">
                    Sudah punya akun?
                    <a href="/login" class="font-semibold text-purple-600 hover:text-purple-700 ml-1 inline-flex items-center">
                        Login sekarang
                        <i data-feather="arrow-right" class="w-4 h-4 ml-1"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
</main>

<!-- Feather Icons Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
<script>
    // Initialize Feather Icons
    feather.replace();

    // Toggle Password Visibility
    function togglePassword() {
        const input = document.getElementById("passwordInput");
        const eyeOpen = document.getElementById("eyeOpen");
        const eyeClosed = document.getElementById("eyeClosed");

        if (input.type === "password") {
            input.type = "text";
            eyeOpen.classList.remove("hidden");
            eyeClosed.classList.add("hidden");
        } else {
            input.type = "password";
            eyeOpen.classList.add("hidden");
            eyeClosed.classList.remove("hidden");
        }
    }

    function togglePassword2() {
        const input = document.getElementById("passwordInput2");
        const eyeOpen = document.getElementById("eyeOpen2");
        const eyeClosed = document.getElementById("eyeClosed2");

        if (input.type === "password") {
            input.type = "text";
            eyeOpen.classList.remove("hidden");
            eyeClosed.classList.add("hidden");
        } else {
            input.type = "password";
            eyeOpen.classList.add("hidden");
            eyeClosed.classList.remove("hidden");
        }
    }

    // Password Validation
    function checkPasswordRules() {
        const password = document.getElementById("passwordInput").value;
        const isLength = password.length >= 8;
        const hasUppercase = /[A-Z]/.test(password);
        const hasNumber = /\d/.test(password);
        const hasSpecial = /[^A-Za-z0-9]/.test(password);

        updateCheck("check-length", isLength);
        updateCheck("check-uppercase", hasUppercase);
        updateCheck("check-number", hasNumber);
        updateCheck("check-special", hasSpecial);
    }

    function updateCheck(id, condition) {
        const icon = document.getElementById(id);
        if (condition) {
            icon.classList.remove("text-gray-400");
            icon.classList.add("text-green-500");
        } else {
            icon.classList.remove("text-green-500");
            icon.classList.add("text-gray-400");
        }
    }

    // Form Validation
    document.querySelector("form").addEventListener("submit", function(event) {
        const password = document.getElementById("passwordInput").value;
        const confirmPassword = document.getElementById("passwordInput2").value;
        const errorText = document.getElementById("errorText");

        const isLength = password.length >= 8;
        const hasUppercase = /[A-Z]/.test(password);
        const hasNumber = /\d/.test(password);
        const hasSpecial = /[^A-Za-z0-9]/.test(password);

        const isValid = isLength && hasUppercase && hasNumber && hasSpecial && (password === confirmPassword);

        if (!isValid) {
            event.preventDefault();
            const errorSpan = errorText.querySelector('span');
            errorSpan.textContent = password !== confirmPassword
                ? "Password dan konfirmasi tidak cocok!"
                : "Password harus memenuhi semua syarat!";
            errorText.classList.remove("hidden");
        }
    });
</script>
@endsection
