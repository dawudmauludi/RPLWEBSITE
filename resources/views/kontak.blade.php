@extends('layouts.master')
@section('title','Kontak')
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

<section class="relative w-full min-h-screen bg-gradient-to-br from-gray-50 via-white to-purple-50 overflow-hidden mt-10" style="font-family: 'DM Sans', sans-serif;">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-100 rounded-full mix-blend-multiply filter blur-2xl opacity-20"></div>
    </div>

    <!-- Floating particles -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-20 w-3 h-3 bg-purple-400 rounded-full opacity-40 animate-bounce"></div>
        <div class="absolute top-40 right-32 w-2 h-2 bg-indigo-400 rounded-full opacity-50 animate-pulse"></div>
        <div class="absolute bottom-32 left-1/4 w-4 h-4 bg-purple-300 rounded-full opacity-30 animate-ping"></div>
        <div class="absolute bottom-20 right-20 w-3 h-3 bg-indigo-300 rounded-full opacity-40 animate-bounce"></div>
    </div>

    <div class="relative z-10 py-16">
        <!-- Header Section -->
        <div class="text-center mb-16 px-6">
            <div class="inline-flex items-center gap-2 bg-purple-100 backdrop-blur-sm border border-purple-200 rounded-full px-4 py-2 mb-6">
                <i data-feather="mail" class="w-4 h-4 text-purple-600"></i>
                <span class="text-sm text-purple-700 font-medium">Hubungi Kami</span>
            </div>

            <h1 class="text-5xl md:text-6xl font-black text-gray-800 mb-6 leading-tight">
                Kontak <span class="bg-gradient-to-r from-purple-600 via-purple-700 to-indigo-600 bg-clip-text text-transparent">Kami</span>
            </h1>

            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Mari tanyakaan seputar rekayasa perangkat lunak dengan menghubungi kami di bawah ini.
                <span class="font-semibold text-purple-700">Saya di sini untuk membantu menjawab pertanyaan anda.</span>
            </p>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-3 gap-8">

                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 p-8 lg:p-12 hover:shadow-3xl transition-all duration-500">
                        <div class="flex items-center gap-3 mb-8">
                            <div class="p-3 bg-purple-100 rounded-xl">
                                <i data-feather="edit-3" class="w-6 h-6 text-purple-600"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800">Kirimi Saya Pesan</h2>
                                <p class="text-gray-600">Saya akan menghubungi Anda kembali sesegera mungkin</p>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                            @csrf
                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-3">
                                        <i data-feather="user" class="w-4 h-4 text-purple-600"></i>
                                        Nama Lengkap
                                    </label>
                                    <input type="text"
                                            name="full_name"
                                           placeholder="isi nama lengkap Anda"
                                           class="w-full p-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-gray-800 placeholder-gray-500 hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-3">
                                        <i data-feather="mail" class="w-4 h-4 text-purple-600"></i>
                                        Alamat Email
                                    </label>
                                    <input type="email"
                                           name="email"
                                           placeholder="email@gmail.com"
                                           class="w-full p-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-gray-800 placeholder-gray-500 hover:border-purple-300">
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-3">
                                        <i data-feather="phone" class="w-4 h-4 text-purple-600"></i>
                                        Nomor Telepon
                                    </label>
                                    <input type="tel"
                                           name="phone_number"
                                           placeholder="+62 812-3456-7890"
                                           class="w-full p-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-gray-800 placeholder-gray-500 hover:border-purple-300">
                                </div>

                                <div class="group">
                                    <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-3">
                                        <i data-feather="tag" class="w-4 h-4 text-purple-600"></i>
                                        Subjek
                                    </label>
                                    <input type="text"
                                           name="subject"
                                           placeholder="Tentang apa ini?"
                                           class="w-full p-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-gray-800 placeholder-gray-500 hover:border-purple-300">
                                </div>
                            </div>

                            <div class="group">
                                <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-3">
                                    <i data-feather="message-circle" class="w-4 h-4 text-purple-600"></i>
                                    Pesan Anda
                                </label>
                                <textarea placeholder="Tell me about your project or how I can help you..."
                                          rows="6"
                                          name="message"
                                          class="w-full p-4 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-gray-800 placeholder-gray-500 hover:border-purple-300 resize-none"></textarea>
                            </div>

                             <div class="g-recaptcha my-4" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" required></div>

                            <button type="submit"
                                    class="group flex items-center justify-center gap-3 w-full md:w-auto bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                                <i data-feather="send" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Contact Info Card -->
                    <div class="bg-gradient-to-br from-purple-600 to-indigo-700 text-white rounded-3xl shadow-2xl p-8 relative overflow-hidden">
                        <!-- Background pattern -->
                        <div class="absolute inset-0 opacity-10">
                            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white rounded-full"></div>
                            <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white rounded-full"></div>
                        </div>

                        <div class="relative z-10">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                                    <i data-feather="heart" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold">Mari Terhubung</h3>
                                    <p class="text-purple-100">Saya ingin sekali mendengar kabar dari Anda</p>
                                </div>
                            </div>

                            <p class="text-purple-100 mb-8 leading-relaxed">
                                Siap untuk memulai proyek Anda berikutnya? Baik Anda memerlukan situs web yang memukau, aplikasi seluler, atau sekadar ingin mengobrol tentang teknologi, saya siap membantu mewujudkan ide-ide Anda.
                            </p>

                            <div class="space-y-6">
                                <div class="flex items-center gap-4 group">
                                    <div class="p-3 bg-white/20 rounded-xl group-hover:bg-white/30 transition-colors">
                                        <i data-feather="phone" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-purple-200 font-medium">Nomer Telepon</p>
                                        <p class="font-semibold">+62 88228513539</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4 group">
                                    <div class="p-3 bg-white/20 rounded-xl group-hover:bg-white/30 transition-colors">
                                        <i data-feather="mail" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-purple-200 font-medium">Email</p>
                                        <p class="font-semibold">dawudmauludxrpl@gmail.com</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4 group">
                                    <div class="p-3 bg-white/20 rounded-xl group-hover:bg-white/30 transition-colors">
                                        <i data-feather="github" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-purple-200 font-medium">GitHub</p>
                                        <p class="font-semibold">@dawudmaulud</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Response Time Card -->
                    <div class="bg-gradient-to-br from-purple-600 to-indigo-700 text-white rounded-3xl shadow-2xl p-6 relative overflow-hidden">
                        <div class="absolute inset-0 opacity-20">
                            <div class="absolute -top-4 -right-4 w-20 h-20 bg-white rounded-full"></div>
                            <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-white rounded-full"></div>
                        </div>

                        <div class="relative z-10 text-center">
                            <div class="inline-flex items-center justify-center w-12 h-12 bg-white/20 rounded-xl mb-4">
                                <i data-feather="clock" class="w-6 h-6"></i>
                            </div>
                            <h4 class="font-bold text-lg mb-2">Respon Cepat</h4>
                            <p class="text-sm opacity-90">Saya biasanya merespons dalam waktu 24 jam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>



<script>
    // Initialize Feather Icons
    if (typeof feather !== 'undefined') {
        feather.replace();
    }

    // Add form validation and animations
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const inputs = form.querySelectorAll('input, textarea');

        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });

    });

    document.querySelector('form').addEventListener('submit', function(e) {
    if (!grecaptcha.getResponse()) {
        e.preventDefault();
        alert('Harap verifikasi reCAPTCHA!');
    }
});
</script>

<style>
    .group.focused .group-hover\:border-purple-300 {
        border-color: rgb(196 181 253);
    }
</style>

@endsection
