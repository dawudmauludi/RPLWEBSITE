<nav class="bg-primary text-white" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-3">
            <!-- Logo -->
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logo_skensa.png') }}" alt="Logo" class="h-12 ml-8">
            </a>

            <!-- Hamburger Menu (Mobile) -->
            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white focus:outline-none">
                    <i data-feather="menu" class="w-6 h-6"></i>
                </button>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="/" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                    <i data-feather="home" class="w-4 h-4 mr-2"></i> Beranda
                </a>
                <a href="#" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                    <i data-feather="info" class="w-4 h-4 mr-2"></i> Tentang Jurusan
                </a>
                <a href="#" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                    <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Berita & Artikel
                </a>
                <a href="#" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                    <i data-feather="award" class="w-4 h-4 mr-2"></i> Karya Siswa
                </a>
                <a href="#" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                    <i data-feather="message-circle" class="w-4 h-4 mr-2"></i> Kontak
                </a>

                @auth
                    @php
                        $user = Auth::user();
                    @endphp
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="w-10 h-10 rounded-full overflow-hidden focus:outline-none">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->nama) }}&background=ffffff&color=0d6efd&size=128&bold=true" alt="Avatar">
                        </button>
                        <div
                            x-show="open"
                            x-transition
                            @click.away="open = false"
                            class="absolute right-0 mt-2 w-48 bg-white text-black rounded-md shadow-lg z-50"
                        >
                            <ul class="py-2">
                                @if($user->hasRole('admin') || $user->hasRole('guru'))
                                    <li><a href="/home" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a></li>
                                @elseif($user->hasRole('siswa'))
                                    <li><a href="/profile" class="block px-4 py-2 hover:bg-gray-100">Profile</a></li>
                                @endif
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <a href="/login" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Login & Register
                    </a>
                @endauth
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" class="md:hidden">
            <div class="flex flex-col space-y-2 pb-3 pt-2 border-t border-primary-dark">
                <a href="/" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                    <i data-feather="home" class="w-4 h-4 mr-2"></i> Beranda
                </a>
                <a href="#" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                    <i data-feather="info" class="w-4 h-4 mr-2"></i> Tentang Jurusan
                </a>
                <a href="#" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                    <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Berita & Artikel
                </a>
                <a href="#" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                    <i data-feather="award" class="w-4 h-4 mr-2"></i> Karya Siswa
                </a>
                <a href="#" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                    <i data-feather="message-circle" class="w-4 h-4 mr-2"></i> Kontak
                </a>

                @auth
                    @if($user->hasRole('admin') || $user->hasRole('guru'))
                        <a href="/home" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                            <i data-feather="layout" class="w-4 h-4 mr-2"></i> Dashboard
                        </a>
                    @elseif($user->hasRole('siswa'))
                        <a href="/profile" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                            <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-left hover:bg-primary-dark flex items-center w-full">
                            <i data-feather="log-out" class="w-4 h-4 mr-2"></i> Logout
                        </button>
                    </form>
                @else
                    <a href="/login" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Login & Register
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
