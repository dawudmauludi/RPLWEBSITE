@extends('layouts.app')
@section('title','Minta Code')
@section('content')

<!-- Include Feather Icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-50 to-white px-4 py-8">
    <div class="w-full max-w-md">
        <!-- Header Section with Icon -->
        <div class="text-center mb-8">
            <div class="mx-auto w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center mb-4 shadow-lg">
                <i data-feather="shield" class="w-8 h-8 text-white"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Verifikasi Kode</h2>
            <p class="text-gray-600">Masukkan kode OTP dan password baru Anda</p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-center mb-2">
                        <i data-feather="alert-circle" class="w-5 h-5 text-red-500 mr-2"></i>
                        <span class="text-red-800 font-medium">Terjadi Kesalahan</span>
                    </div>
                    <ul class="text-red-700 text-sm space-y-1 ml-7">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('reset.password') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="email" value="{{ old('email', $email ?? '') }}">

                <!-- OTP Input -->
                <div class="space-y-3">
                    <label class="block text-sm font-semibold text-gray-700">
                        <i data-feather="key" class="w-4 h-4 inline mr-2"></i>
                        Kode Verifikasi (OTP)
                    </label>
                    <p class="text-xs text-gray-500 mb-3">Masukkan 6 digit kode yang dikirim ke email Anda</p>
                    
                    <!-- Hidden input for form submission -->
                    <input type="hidden" name="token" id="token" required>
                    
                    <!-- OTP Input Boxes -->
                    <div class="flex justify-between space-x-2">
                        <input type="text" 
                               class="otp-input w-12 h-12 text-center text-lg font-bold border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition-all duration-200 bg-gray-50 focus:bg-white" 
                               maxlength="1" 
                               data-index="0">
                        <input type="text" 
                               class="otp-input w-12 h-12 text-center text-lg font-bold border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition-all duration-200 bg-gray-50 focus:bg-white" 
                               maxlength="1" 
                               data-index="1">
                        <input type="text" 
                               class="otp-input w-12 h-12 text-center text-lg font-bold border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition-all duration-200 bg-gray-50 focus:bg-white" 
                               maxlength="1" 
                               data-index="2">
                        <input type="text" 
                               class="otp-input w-12 h-12 text-center text-lg font-bold border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition-all duration-200 bg-gray-50 focus:bg-white" 
                               maxlength="1" 
                               data-index="3">
                        <input type="text" 
                               class="otp-input w-12 h-12 text-center text-lg font-bold border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition-all duration-200 bg-gray-50 focus:bg-white" 
                               maxlength="1" 
                               data-index="4">
                        <input type="text" 
                               class="otp-input w-12 h-12 text-center text-lg font-bold border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition-all duration-200 bg-gray-50 focus:bg-white" 
                               maxlength="1" 
                               data-index="5">
                    </div>
                </div>

                <!-- New Password Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">
                        <i data-feather="lock" class="w-4 h-4 inline mr-2"></i>
                        Password Baru
                    </label>
                    <div class="relative">
                        <input type="password" 
                               name="password" 
                               placeholder="Minimal 6 karakter"
                               class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition-all duration-200 bg-gray-50 focus:bg-white" 
                               required>
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i data-feather="lock" class="w-5 h-5 text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Confirm Password Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">
                        <i data-feather="check-circle" class="w-4 h-4 inline mr-2"></i>
                        Konfirmasi Password
                    </label>
                    <div class="relative">
                        <input type="password" 
                               name="password_confirmation" 
                               placeholder="Ulangi password"
                               class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none transition-all duration-200 bg-gray-50 focus:bg-white" 
                               required>
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i data-feather="check-circle" class="w-5 h-5 text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-gradient-to-r from-purple-600 to-purple-700 text-white py-3 rounded-xl font-semibold hover:from-purple-700 hover:to-purple-800 transform hover:scale-[1.02] transition-all duration-200 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
                    <i data-feather="save" class="w-5 h-5"></i>
                    <span>Ubah Password</span>
                </button>
            </form>

            <!-- Resend Link -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <p class="text-sm text-center text-gray-600 flex items-center justify-center space-x-2">
                    <i data-feather="mail" class="w-4 h-4"></i>
                    <span>Belum menerima kode?</span>
                    <a href="{{ url('/password/request') }}" 
                       class="text-purple-600 hover:text-purple-700 font-medium hover:underline transition-colors duration-200 flex items-center space-x-1">
                        <span>Kirim Ulang</span>
                        <i data-feather="refresh-cw" class="w-4 h-4"></i>
                    </a>
                </p>
            </div>
        </div>

        <!-- Security Notice -->
        <div class="mt-6 bg-purple-50 border border-purple-200 rounded-xl p-4">
            <div class="flex items-start space-x-3">
                <i data-feather="info" class="w-5 h-5 text-purple-600 mt-0.5 flex-shrink-0"></i>
                <div class="text-sm text-purple-800">
                    <p class="font-medium mb-1">Keamanan Akun</p>
                    <p>Pastikan Anda menggunakan password yang kuat dan tidak membagikan kode OTP kepada siapapun.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize Feather Icons
    feather.replace();

    // OTP Input Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const otpInputs = document.querySelectorAll('.otp-input');
        const tokenInput = document.getElementById('token');

        otpInputs.forEach((input, index) => {
            input.addEventListener('input', function(e) {
                const value = e.target.value;
                
                // Only allow numbers
                if (!/^\d*$/.test(value)) {
                    e.target.value = '';
                    return;
                }

                // Move to next input if current is filled
                if (value && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }

                // Update hidden input with complete OTP
                updateTokenInput();
            });

            input.addEventListener('keydown', function(e) {
                // Handle backspace
                if (e.key === 'Backspace' && !e.target.value && index > 0) {
                    otpInputs[index - 1].focus();
                }

                // Handle arrow keys
                if (e.key === 'ArrowLeft' && index > 0) {
                    otpInputs[index - 1].focus();
                }
                if (e.key === 'ArrowRight' && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            });

            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pasteData = e.clipboardData.getData('text');
                const digits = pasteData.replace(/\D/g, '').slice(0, 6);
                
                digits.split('').forEach((digit, i) => {
                    if (otpInputs[i]) {
                        otpInputs[i].value = digit;
                    }
                });
                
                updateTokenInput();
                
                // Focus on the last filled input or next empty one
                const lastIndex = Math.min(digits.length, otpInputs.length - 1);
                otpInputs[lastIndex].focus();
            });

            input.addEventListener('focus', function() {
                this.select();
            });
        });

        function updateTokenInput() {
            const otpValue = Array.from(otpInputs).map(input => input.value).join('');
            tokenInput.value = otpValue;
        }
    });
</script>

@endsection