  <nav class="bg-primary text-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-3">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logo_skensa.png') }}" alt="SMK Negeri 1 Pasuruan Logo" class="h-12 ml-8">
                </a>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="menu-toggle" class="text-white focus:outline-none">
                        <i data-feather="menu" class="w-6 h-6"></i>
                    </button>
                </div>
                
                <!-- Desktop menu -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="/" class="px-4 py-2 hover:bg-primary-dark flex items-center transition-colors duration-200">
                        <i data-feather="home" class="w-4 h-4 mr-2"></i>
                        Beranda
                    </a>
                    <a href="" class="px-4 py-2 hover:bg-primary-dark flex items-center transition-colors duration-200">
                        <i data-feather="info" class="w-4 h-4 mr-2"></i>
                        Tentang Jurusan
                    </a>
                    <a href="" class="px-4 py-2 hover:bg-primary-dark flex items-center transition-colors duration-200">
                        <i data-feather="file-text" class="w-4 h-4 mr-2"></i>
                        Berita & Artikel
                    </a>
                    <a href="" class="px-4 py-2 hover:bg-primary-dark flex items-center transition-colors duration-200">
                        <i data-feather="award" class="w-4 h-4 mr-2"></i>
                        Karya Siswa
                    </a>
                    <a href="" class="px-4 py-2 hover:bg-primary-dark flex items-center transition-colors duration-200">
                        <i data-feather="message-circle" class="w-4 h-4 mr-2"></i>
                        Kontak
                    </a>
                    <a href="/login" class="px-4 py-2 hover:bg-primary-dark flex items-center transition-colors duration-200">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i>
                        Login & Register
                    </a>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div id="mobile-menu" class="md:hidden hidden">
                <div class="flex flex-col space-y-2 pb-3 pt-2 border-t border-primary-dark">
                    <a href="" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                        <i data-feather="home" class="w-4 h-4 mr-2"></i>
                        Beranda
                    </a>
                    <a href="" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                        <i data-feather="info" class="w-4 h-4 mr-2"></i>
                        Tentang Jurusan
                    </a>
                    <a href="" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                        <i data-feather="file-text" class="w-4 h-4 mr-2"></i>
                        Berita & Artikel
                    </a>
                    <a href="" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                        <i data-feather="award" class="w-4 h-4 mr-2"></i>
                        Karya Siswa
                    </a>
                    <a href="" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                        <i data-feather="message-circle" class="w-4 h-4 mr-2"></i>
                        Kontak
                    </a>
                    <a href="" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i>
                        Login & Register
                    </a>
                </div>
            </div>
        </div>
    </nav>