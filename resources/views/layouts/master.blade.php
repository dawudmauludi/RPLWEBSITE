<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SMK Negeri 1 Pasuruan</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo_skensa.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#5a1b9b',
                        'primary-dark': '#4e1a89',
                        'accent': '#00b4d8',
                    }
                }
            }
        }
    </script>
    
    @yield('styles')
</head>
<body class="flex flex-col min-h-screen font-sans">
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
                    <a href="" class="px-4 py-2 hover:bg-primary-dark flex items-center transition-colors duration-200">
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

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Address -->
                <div class="ml-8">
                    <a href="" class="flex items-center">
                        <img src="{{ asset('images/logo_skensa.png') }}" alt="SMK Negeri 1 Pasuruan Logo" class="h-[80px]">
                    </a>
                    <div class="mb-4">
                        <p class="flex items-center">
                            <i data-feather="map-pin" class="w-4 h-4 mr-2"></i>
                            <span class="font-semibold">Jl. Veteran, Bugul Lor, Kec.</span>
                        </p>
                        <p class="ml-6">Panggungrejo, Kota Pasuruan,</p>
                        <p class="ml-6">Jawa Timur 67122</p>
                    </div>
                </div>
                
                <!-- Description -->
                <div>
                    <p class="text-sm mb-4">Rekayasa Perangkat Lunak (RPL) adalah jurusan yang mempelajari prinsip-prinsip pengembangan, pengujian, dan pemeliharaan perangkat lunak atau aplikasi baik berbasis web, desktop maupun mobile.</p>
                    <p class="flex items-center mt-4">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i>
                        Kontak Admin
                    </p>
                    <p class="flex items-center">
                        <i data-feather="phone" class="w-4 h-4 mr-2"></i>
                        Admin: +62 85473846574
                    </p>
                </div>
                
                <!-- Links -->
                <div>
                    <div class="flex flex-col space-y-2">
                        <a href="" class="hover:text-accent flex items-center">
                            <i data-feather="chevron-right" class="w-4 h-4 mr-1"></i>
                            Beranda
                        </a>
                        <a href="" class="hover:text-accent flex items-center">
                            <i data-feather="chevron-right" class="w-4 h-4 mr-1"></i>
                            Tentang Jurusan
                        </a>
                        <a href="" class="hover:text-accent flex items-center">
                            <i data-feather="chevron-right" class="w-4 h-4 mr-1"></i>
                            Berita & Artikel
                        </a>
                        <a href="" class="hover:text-accent flex items-center">
                            <i data-feather="chevron-right" class="w-4 h-4 mr-1"></i>
                            Karya Siswa
                        </a>
                        <a href="" class="hover:text-accent flex items-center">
                            <i data-feather="chevron-right" class="w-4 h-4 mr-1"></i>
                            Kontak
                        </a>
                    </div>
                    
                    <!-- Social Media Links -->
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="hover:text-accent transition-colors duration-200">
                            <i data-feather="linkedin" class="w-5 h-5"></i>
                        </a>
                        <a href="#" class="hover:text-accent transition-colors duration-200">
                            <i data-feather="github" class="w-5 h-5"></i>
                        </a>
                        <a href="#" class="hover:text-accent transition-colors duration-200">
                            <i data-feather="instagram" class="w-5 h-5"></i>
                        </a>
                        <a href="#" class="hover:text-accent transition-colors duration-200">
                            <i data-feather="globe" class="w-5 h-5"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="text-center text-sm pt-6 mt-6 border-t border-primary-dark">
                <p>@2025 - Rekayasa Perangkat Lunak - SMK Negeri 1 Pasuruan - Rodhi - Dawud</p>
            </div>
        </div>
    </footer>

    <!-- Initialize Feather Icons -->
    <script>
        feather.replace();
        
        // Mobile menu toggle
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    
    @yield('scripts')
</body>
</html>