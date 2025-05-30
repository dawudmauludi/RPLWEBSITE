@extends('layouts.app')
@section('title','Registrasi')
@section('content')
<main class="bg-gradient-to-br from-purple-50 to-indigo-50 min-h-screen flex flex-col justify-center items-center p-4">
    <div class="w-full max-w-md">
        <!-- Error Messages -->
        @if($errors->any())
        <div class="mb-6 p-4 rounded-lg bg-red-50 border-l-4 border-red-500">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">
                        Terdapat {{ $errors->count() }} kesalahan yang harus diperbaiki
                    </h3>
                    <div class="mt-2 text-sm text-red-700">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Registration Card -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-700 p-6 text-center">
                <h1 class="text-3xl font-bold text-white font-[Poppins]">Website RPL</h1>
                <p class="text-purple-100 mt-1">Buat akun baru Anda</p>
            </div>
            
            <!-- Form -->
            <div class="p-8">
                <form action="{{ route('registrasi.post') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <!-- Username Input -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input 
                            type="text" 
                            name="nama" 
                            id="nama"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                            placeholder="Masukkan username"
                            value="{{ old('nama') }}"
                            required
                        >
                    </div>
                    
                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                            placeholder="email@contoh.com"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>
                    
                    <!-- Password Input -->
                    <div>
                        <label for="passwordInput" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <input
                                type="password"
                                name="password"
                                id="passwordInput"
                                placeholder="Buat password"
                                class="block w-full px-4 py-3 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                oninput="checkPasswordRules()"
                                required
                            />
                            <button
                                type="button"
                                onclick="togglePassword()"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none"
                            >
                                <svg id="eyeOpen" class="h-5 w-5 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg id="eyeClosed" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.88l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Password Requirements -->
                        <div class="mt-2 text-sm space-y-1">
                            <div class="flex items-center">
                                <svg id="check-length" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-600">Minimal 8 karakter</span>
                            </div>
                            <div class="flex items-center">
                                <svg id="check-uppercase" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-600">Minimal 1 huruf besar</span>
                            </div>
                            <div class="flex items-center">
                                <svg id="check-number" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-600">Minimal 1 angka</span>
                            </div>
                            <div class="flex items-center">
                                <svg id="check-special" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-600">Minimal 1 karakter khusus</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Confirm Password Input -->
                    <div>
                        <label for="passwordInput2" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                        <div class="relative">
                            <input
                                type="password"
                                name="password_confirmation"
                                id="passwordInput2"
                                placeholder="Ulangi password"
                                class="block w-full px-4 py-3 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                                required
                            />
                            <button
                                type="button"
                                onclick="togglePassword1()"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none"
                            >
                                <svg id="eyeOpen2" class="h-5 w-5 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg id="eyeClosed2" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.88l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                        <p id="errorText" class="mt-1 text-sm text-red-600 hidden">Password harus memenuhi semua syarat!</p>
                    </div>
                    
                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full py-3 px-4 rounded-lg shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-200"
                    >
                        Daftar Sekarang
                    </button>
                </form>
                
                <!-- Login Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Sudah punya akun?
                        <a href="/login" class="font-medium text-purple-600 hover:text-purple-500 ml-1">
                            Login sekarang
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
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

    function togglePassword1() {
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
            errorText.textContent = password !== confirmPassword 
                ? "Password dan konfirmasi tidak cocok!" 
                : "Password harus memenuhi semua syarat!";
            errorText.classList.remove("hidden");
        }
    });
</script>
@endsection