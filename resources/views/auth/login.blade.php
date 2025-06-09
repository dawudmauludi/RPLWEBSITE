@extends('layouts.app')
@section('title', 'Login')
@section('content')

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('error') }}',
        });
    </script>
@endif

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '{{ session('success') }}',
        });
    </script>
@endif

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    .animate-fade-up {
        animation: fadeInUp 0.6s ease-out;
    }

    .animate-fade-left {
        animation: fadeInLeft 0.6s ease-out;
    }

    .animate-pulse-gentle {
        animation: pulse 3s infinite;
    }

    .glass-effect {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.1);
    }
</style>

<main class="min-h-screen bg-gray-50 flex">
    <!-- Left Column - Logo Section -->
    <div class="hidden lg:flex lg:w-1/2 bg-primary relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100" height="100" fill="url(#grid)" />
            </svg>
        </div>

        <!-- Logo and Content -->
        <div class="relative z-10 flex flex-col justify-center items-center w-full px-12 text-white">
            <div class="animate-fade-left">
                <!-- Logo Container -->
                <div class="mb-8 animate-pulse-gentle">
                    <div class="w-24 h-24 rounded-2xl flex mx-auto items-center justify-center shadow-2xl">
                       <img src="{{ asset('images/LOGO_SMK_1.png') }}" alt="">
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-4xl font-bold mb-4 text-center">Website RPL</h1>
                <p class="text-xl text-purple-100 text-center mb-8 leading-relaxed">
                    Portal Pembelajaran Digital<br>
                    Rekayasa Perangkat Lunak
                </p>

                <!-- Features -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                            <i data-feather="users" class="w-4 h-4"></i>
                        </div>
                        <span class="text-purple-100">Khusus Siswa RPL SMKN 1 Pasuruan</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                            <i data-feather="shield" class="w-4 h-4"></i>
                        </div>
                        <span class="text-purple-100">Akses Aman & Terpercaya</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                            <i data-feather="book-open" class="w-4 h-4"></i>
                        </div>
                        <span class="text-purple-100">Materi Pembelajaran Terkini</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute top-10 right-10 w-20 h-20 bg-purple-500 rounded-full opacity-20"></div>
        <div class="absolute bottom-10 left-10 w-16 h-16 bg-purple-400 rounded-full opacity-20"></div>
        <div class="absolute top-1/2 right-20 w-4 h-4 bg-white rounded-full opacity-30"></div>
    </div>

    <!-- Right Column - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
        <div class="w-full max-w-md animate-fade-up">
            <!-- Mobile Logo (visible on small screens) -->
            <div class="lg:hidden text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-xl mb-4">
                       <img src="{{ asset('images/LOGO_SMK_1.png') }}" alt="">
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Website RPL</h1>
                <p class="text-gray-600 mt-1">Silakan masuk ke akun Anda</p>
            </div>

            <!-- Login Card -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <!-- Header -->
                <div class="px-8 pt-8 pb-6">
                    <div class="hidden lg:block text-center mb-6">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang</h2>
                        <p class="text-gray-600">Masuk ke akun Anda untuk melanjutkan</p>
                    </div>
                </div>

                <!-- Form -->
                <div class="px-8 pb-8">
                    <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i data-feather="mail" class="w-4 h-4 inline mr-2"></i>
                                Email Address
                            </label>
                            <div class="relative">
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 disabled:bg-gray-100 disabled:cursor-not-allowed text-gray-900"
                                    placeholder="nama@email.com"
                                    required
                                    @if(session('rate_limit')) disabled @endif
                                    value="{{ old('email') }}"
                                    autocomplete="off"
                                >
                            </div>
                            @error('email')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i data-feather="alert-circle" class="w-4 h-4 mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i data-feather="lock" class="w-4 h-4 inline mr-2"></i>
                                Password
                            </label>
                            <div class="relative">
                                <input
                                    type="password"
                                    name="password"
                                    id="passwordInput"
                                    class="block w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 disabled:bg-gray-100 disabled:cursor-not-allowed text-gray-900"
                                    placeholder="••••••••"
                                    required
                                    @if(session('rate_limit')) disabled @endif
                                    autocomplete="off"
                                >
                                <button
                                    type="button"
                                    onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none transition duration-200"
                                    @if(session('rate_limit')) disabled @endif
                                >
                                    <i data-feather="eye-off" id="eyeClosed" class="w-5 h-5"></i>
                                    <i data-feather="eye" id="eyeOpen" class="w-5 h-5 hidden"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input
                                    id="remember"
                                    name="remember"
                                    type="checkbox"
                                    class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded"
                                >
                                <label for="remember" class="ml-3 block text-sm text-gray-700">
                                    Ingat saya
                                </label>
                            </div>
                            <div class="text-sm">
                                <a href="/password/request" class="font-medium text-purple-600 hover:text-purple-700 transition duration-200 flex items-center">
                                    <i data-feather="help-circle" class="w-4 h-4 mr-1"></i>
                                    Lupa password?
                                </a>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            id="submitButton"
                            class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-semibold text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-200 disabled:bg-purple-400 disabled:cursor-not-allowed"
                            @if(session('rate_limit')) disabled @endif
                        >
                            <span id="buttonText" class="flex items-center">
                                <i data-feather="log-in" class="w-4 h-4 mr-2"></i>
                                Masuk ke Akun
                                @if(session('rate_limit')) (<span id="countdown">{{ session('rate_limit') }}</span>s) @endif
                            </span>
                            <span id="loadingSpinner" class="hidden">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </button>
                    </form>

                    <!-- Register Link -->
                    <div class="mt-8 text-center">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">atau</span>
                            </div>
                        </div>
                        <p class="mt-4 text-sm text-gray-600">
                            Belum punya akun?
                            <a href="/registrasi" class="font-semibold text-purple-600 hover:text-purple-700 transition duration-200 ml-1 inline-flex items-center">
                                <i data-feather="user-plus" class="w-4 h-4 mr-1"></i>
                                Daftar sekarang
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Info Card -->
            <div class="mt-6">
                <div class="bg-purple-50 border border-purple-200 rounded-xl p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center">
                                <i data-feather="info" class="w-4 h-4 text-white"></i>
                            </div>
                        </div>
                        <div class="ml-3 flex-1">
                            <h3 class="text-sm font-semibold text-purple-800 mb-1">Akses Terbatas</h3>
                            <p class="text-xs text-purple-700 leading-relaxed">
                                Portal ini khusus untuk siswa & alumni SMKN 1 Pasuruan jurusan Rekayasa Perangkat Lunak
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@if(session('rate_limit'))
<script>console.log("Rate limit active: {{ session('rate_limit') }} seconds");</script>
<script>
    // Countdown timer
    let seconds = {{ session('rate_limit') }};
    const countdownElement = document.getElementById('countdown');
    const submitButton = document.getElementById('submitButton');

    const countdownInterval = setInterval(() => {
        seconds--;
        countdownElement.textContent = seconds;

        if (seconds <= 0) {
            clearInterval(countdownInterval);
            document.querySelectorAll('[disabled]').forEach(el => {
                el.disabled = false;
            });
            document.getElementById('buttonText').innerHTML = '<i data-feather="log-in" class="w-4 h-4 mr-2"></i>Masuk ke Akun';
            feather.replace(); // Re-initialize feather icons
        }
    }, 1000);
</script>
@endif

<script>
    // Initialize Feather Icons
    feather.replace();

    // Form submission spinner
    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('buttonText').classList.add('hidden');
        document.getElementById('loadingSpinner').classList.remove('hidden');
    });

    // Toggle password visibility
    function togglePassword() {
        const input = document.getElementById('passwordInput');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        if (input.type === 'password') {
            input.type = 'text';
            eyeOpen.classList.remove('hidden');
            eyeClosed.classList.add('hidden');
        } else {
            input.type = 'password';
            eyeOpen.classList.add('hidden');
            eyeClosed.classList.remove('hidden');
        }
    }
</script>

@endsection
