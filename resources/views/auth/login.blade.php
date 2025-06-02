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
 @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-slide-in {
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(139, 92, 246, 0.4);
            }
            50% {
                box-shadow: 0 0 0 8px rgba(139, 92, 246, 0);
            }
        }
        
        .animate-pulse-glow {
            animation: pulse-glow 2s infinite;
        }
    </style>

<main class="min-h-screen bg-gradient-to-br from-purple-50 to-indigo-50 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Header Card -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-700 p-6 text-center">
                <h1 class="text-3xl font-bold text-white font-[Poppins]">Website RPL</h1>
                <p class="text-purple-100 mt-1">Silakan masuk ke akun Anda</p>
            </div>
            
            <!-- Form Login -->
            <div class="p-8">
                <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <!-- Email Input -->
                    <div>
                  <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                  <div class="relative">
                      <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                          <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                          </svg>
                      </div>
                      <input 
                          type="email" 
                          name="email" 
                          id="email"
                          class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 disabled:bg-gray-100 disabled:cursor-not-allowed"
                          placeholder="email@contoh.com"
                          required
                          @if(session('rate_limit')) disabled @endif
                          value="{{ old('email') }}"
                          autocomplete="off"
                      >
                  </div>
                  @error('email')
                      <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                  @enderror
              </div>
                    
                    <!-- Password Input -->
                   <div>
                  <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                  <div class="relative">
                      <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                          <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                          </svg>
                      </div>
                      <input 
                          type="password" 
                          name="password" 
                          id="passwordInput"
                          class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200 disabled:bg-gray-100 disabled:cursor-not-allowed"
                          placeholder="••••••••"
                          required
                          @if(session('rate_limit')) disabled @endif
                          autocomplete="off"
                      >
                    <button 
                  type="button" 
                  onclick="togglePassword()" 
                  class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none"
                  @if(session('rate_limit')) disabled @endif
              >
                  <svg id="eyeClosed" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                  </svg>
                  <svg id="eyeOpen" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
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
                            <label for="remember" class="ml-2 block text-sm text-gray-700">
                                Ingat saya
                            </label>
                        </div>
                        <div class="text-sm">
                            <a href="/password/request" class="font-medium text-purple-600 hover:text-purple-500">
                                Lupa password?
                            </a>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                 <button 
                      type="submit" 
                      id="submitButton"
                      class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-200 disabled:bg-purple-400 disabled:cursor-not-allowed"
                      @if(session('rate_limit')) disabled @endif
                  >
                      <span id="buttonText">
                          Masuk
                          @if(session('rate_limit')) (<span id="countdown">{{ session('rate_limit') }}</span>s) @endif
                      </span>
                      <span id="loadingSpinner" class="hidden ml-2">
                          <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                          </svg>
                      </span>
                  </button>
                </form>
                
                <!-- Register Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Belum punya akun?
                        <a href="/registrasi" class="font-medium text-purple-600 hover:text-purple-500 ml-1">
                            Daftar sekarang
                        </a>
                    </p>
                </div>
            </div>

        </div>
        <div class="mb-6 mt-6">
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 animate-slide-in hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-lg p-3">
                    <i data-feather="lock" class="w-6 h-6 text-white"></i>
                </div>
            </div>
            <div class="ml-4 flex-1">
                <div class="flex items-center mb-2">
                    <h3 class="text-lg font-bold text-gray-800">Akses Terbatas</h3>
                    <span class="ml-2 bg-purple-100 text-purple-800 text-xs font-medium px-2 py-1 rounded-full">
                        RPL Only
                    </span>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    Login hanya dilakukan oleh siswa SMKN 1 Pasuruan jurusan Rekayasa Perangkat Lunak
                </p>
                <div class="flex items-center mt-3 text-sm text-gray-500">
                    <i data-feather="map-pin" class="w-4 h-4 mr-1"></i>
                    <span>SMKN 1 Pasuruan</span>
                    <span class="mx-2">•</span>
                    <i data-feather="code-2" class="w-4 h-4 mr-1"></i>
                    <span>RPL</span>
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
    // Hitung mundur otomatis
    let seconds = {{ session('rate_limit') }};
    const countdownElement = document.getElementById('countdown');
    const submitButton = document.getElementById('submitButton');
    
    const countdownInterval = setInterval(() => {
        seconds--;
        countdownElement.textContent = seconds;
        
        if (seconds <= 0) {
            clearInterval(countdownInterval);
            // Enable semua elemen yang perlu di-enable
            document.querySelectorAll('[disabled]').forEach(el => {
                el.disabled = false;
            });
            document.getElementById('buttonText').textContent = 'Masuk';
            submitButton.classList.remove('disabled:bg-purple-400');
        }
    }, 1000);
</script>
@endif

<script>
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