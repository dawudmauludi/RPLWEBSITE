<footer class="relative bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-32 -translate-y-32"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-48 translate-y-48"></div>
        <div class="absolute top-1/2 left-1/2 w-32 h-32 bg-amber-300 rounded-full -translate-x-16 -translate-y-16 opacity-20"></div>
    </div>
    
    <div class="relative z-10 container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            
            <!-- Logo & Address Section -->
            <div class="md:col-span-2 lg:col-span-1">
                <div class="p-5 h-full">
                    <!-- Logo & Title -->
                    <div class="flex items-center mb-4">
                        <div class="bg-white/15 p-2 rounded-xl mr-3 flex-shrink-0">
                            <img src="{{ asset('images/logo_skensa.png') }}" alt="SMK Negeri 1 Pasuruan Logo" class="h-10 w-10 object-contain">
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white leading-tight">SMK Negeri 1 Pasuruan</h3>
                            <p class="text-purple-200 text-xs flex items-center mt-1">
                                <i data-feather="code" class="w-3 h-3 mr-1"></i>
                                Rekayasa Perangkat Lunak
                            </p>
                        </div>
                    </div>
                    
                    <!-- Address -->
                    <div class="space-y-2">
                        <div class="flex items-start space-x-3">
                            <div class="bg-amber-400/15 p-2 rounded-lg flex-shrink-0">
                                <i data-feather="map-pin" class="w-3 h-3 text-amber-300"></i>
                            </div>
                            <div class="text-purple-100 text-xs">
                                <p class="font-semibold text-white">Jl. Veteran, Bugul Lor, Kec.</p>
                                <p>Panggungrejo, Kota Pasuruan,</p>
                                <p>Jawa Timur 67122</p>
                            </div>
                        </div>

                         <!-- Contact Admin -->
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <div class="bg-green-400/15 p-2 rounded-lg mr-3">
                                <i data-feather="user" class="w-3 h-3 text-green-300"></i>
                            </div>
                            <span class="text-white font-medium text-sm">Kontak Admin</span>
                        </div>
                    </div>
                        
                        <!-- Additional Info -->
                        <div class="flex items-center space-x-3 pt-2">
                            <div class="bg-green-400/15 p-2 rounded-lg">
                                <i data-feather="phone" class="w-3 h-3 text-green-300"></i>
                            </div>
                            <span class="text-purple-100 text-xs">+62 85473846574</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Description & Contact -->
            <div>
                <div class="p-5 h-full">
                    <div class="flex items-center mb-4">
                        <div class="bg-amber-400/15 p-2 rounded-lg mr-3">
                            <i data-feather="info" class="w-4 h-4 text-amber-300"></i>
                        </div>
                        <h4 class="text-lg font-semibold">Tentang RPL</h4>
                    </div>
                    
                    <p class="text-purple-100 text-xs mb-4 leading-relaxed">
                        Rekayasa Perangkat Lunak (RPL) adalah jurusan yang mempelajari prinsip-prinsip pengembangan, pengujian, dan pemeliharaan perangkat lunak atau aplikasi baik berbasis web, desktop maupun mobile.
                    </p>
                    
                    <!-- Skills -->
                    <div class="mb-4">
                        <p class="text-white text-sm font-medium mb-2 flex items-center">
                            <i data-feather="trending-up" class="w-4 h-4 mr-2 text-blue-300"></i>
                            Keahlian Utama
                        </p>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="bg-white/5 rounded-lg p-2 text-center hover:bg-white/10 transition-colors">
                                <i data-feather="monitor" class="w-4 h-4 mx-auto mb-1 text-blue-300"></i>
                                <span class="text-xs text-purple-100">Web Dev</span>
                            </div>
                            <div class="bg-white/5 rounded-lg p-2 text-center hover:bg-white/10 transition-colors">
                                <i data-feather="smartphone" class="w-4 h-4 mx-auto mb-1 text-green-300"></i>
                                <span class="text-xs text-purple-100">Mobile Dev</span>
                            </div>
                            <div class="bg-white/5 rounded-lg p-2 text-center hover:bg-white/10 transition-colors">
                                <i data-feather="database" class="w-4 h-4 mx-auto mb-1 text-yellow-300"></i>
                                <span class="text-xs text-purple-100">Database</span>
                            </div>
                            <div class="bg-white/5 rounded-lg p-2 text-center hover:bg-white/10 transition-colors">
                                <i data-feather="layers" class="w-4 h-4 mx-auto mb-1 text-purple-300"></i>
                                <span class="text-xs text-purple-100">UI/UX</span>
                            </div>
                        </div>
                    </div>
                    
                   
                </div>
            </div>
            
            <!-- Quick Links & Social Media -->
            <div>
                <div class="p-5 h-full">
                    <div class="flex items-center mb-4">
                        <div class="bg-amber-400/15 p-2 rounded-lg mr-3">
                            <i data-feather="navigation" class="w-4 h-4 text-amber-300"></i>
                        </div>
                        <h4 class="text-lg font-semibold">Menu Cepat</h4>
                    </div>
                    
                    <!-- Quick Links -->
                    <div class="space-y-2 mb-4">
                        <a href="/" class="flex items-center text-purple-100 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <i data-feather="home" class="w-3 h-3 mr-2 text-amber-300 group-hover:text-amber-200"></i>
                            <span class="text-xs">Beranda</span>
                        </a>
                        <a href="/detail-jurusan" class="flex items-center text-purple-100 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <i data-feather="users" class="w-3 h-3 mr-2 text-amber-300 group-hover:text-amber-200"></i>
                            <span class="text-xs">Tentang Jurusan</span>
                        </a>
                        <a href="/berita" class="flex items-center text-purple-100 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <i data-feather="file-text" class="w-3 h-3 mr-2 text-amber-300 group-hover:text-amber-200"></i>
                            <span class="text-xs">Berita & Artikel</span>
                        </a>
                        <a href="/karya" class="flex items-center text-purple-100 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <i data-feather="award" class="w-3 h-3 mr-2 text-amber-300 group-hover:text-amber-200"></i>
                            <span class="text-xs">Karya Siswa</span>
                        </a>
                        <a href="/kontak" class="flex items-center text-purple-100 hover:text-white hover:translate-x-2 transition-all duration-200 group">
                            <i data-feather="mail" class="w-3 h-3 mr-2 text-amber-300 group-hover:text-amber-200"></i>
                            <span class="text-xs">Kontak</span>
                        </a>
                    </div>
                    
                    
                    <!-- Social Media -->
                    <div>
                        <p class="text-sm font-medium mb-2 flex items-center">
                            <i data-feather="share-2" class="w-3 h-3 mr-2 text-amber-300"></i>
                            <span class="text-xs">Ikuti Kami</span>
                        </p>
                        <div class="flex justify-between">
                            <a href="#" class="bg-white/10 p-2 rounded-lg hover:bg-white/20 hover:scale-110 transition-all duration-200 group">
                                <i data-feather="linkedin" class="w-4 h-4 text-blue-300 group-hover:text-blue-200"></i>
                            </a>
                            <a href="#" class="bg-white/10 p-2 rounded-lg hover:bg-white/20 hover:scale-110 transition-all duration-200 group">
                                <i data-feather="github" class="w-4 h-4 text-gray-300 group-hover:text-gray-200"></i>
                            </a>
                            <a href="#" class="bg-white/10 p-2 rounded-lg hover:bg-white/20 hover:scale-110 transition-all duration-200 group">
                                <i data-feather="instagram" class="w-4 h-4 text-pink-300 group-hover:text-pink-200"></i>
                            </a>
                            <a href="#" class="bg-white/10 p-2 rounded-lg hover:bg-white/20 hover:scale-110 transition-all duration-200 group">
                                <i data-feather="globe" class="w-4 h-4 text-green-300 group-hover:text-green-200"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Section -->
        <div class="relative">
            <!-- Decorative Line -->
            <div class="w-full h-px bg-gradient-to-r from-transparent via-white/30 to-transparent mb-4"></div>
            
            <!-- Copyright -->
            <div class="text-center">
                <div class="bg-white/10 rounded-xl p-3 inline-block">
                    <p class="text-purple-200 text-xs flex items-center justify-center flex-wrap gap-2">
                        <i data-feather="copyright" class="w-3 h-3 text-amber-300"></i>
                        <span class="font-medium text-white">2025</span>
                        <span>•</span>
                        <span>Rekayasa Perangkat Lunak</span>
                        <span>•</span>
                        <span>SMK Negeri 1 Pasuruan</span>
                        <span>•</span>
                        <span class="text-amber-300">Rodhi - Dawud</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute top-10 right-10 w-6 h-6 bg-amber-300/30 rounded-full animate-pulse"></div>
    <div class="absolute bottom-20 left-10 w-4 h-4 bg-blue-300/30 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
</footer>

<!-- Script untuk inisialisasi Feather Icons (pastikan sudah include di layout utama) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
</script>