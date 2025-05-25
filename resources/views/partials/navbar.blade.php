<nav
    x-data="{ mobileMenuOpen: false }"
    class="bg-[#5a1b9b] text-white fixed top-0 left-0 w-full z-50 shadow-lg"
>
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-3">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logo_skensa.png') }}" alt="Logo" class="h-12 ml-8">
            </a>

            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white focus:outline-none">
                    <i data-feather="menu" class="w-6 h-6"></i>
                </button>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="/" class="px-4 py-2 hover:bg-primary-dark text-decoration-none text-white flex items-center">
                    <i data-feather="home" class="w-4 h-4 mr-2"></i> Beranda
                </a>
                <a href="/detail-jurusan" class="px-4 py-2 hover:bg-primary-dark text-decoration-none text-white flex items-center">
                    <i data-feather="info" class="w-4 h-4 mr-2"></i> Tentang Jurusan
                </a>
                <a href="#" class="px-4 py-2 hover:bg-primary-dark text-decoration-none text-white flex items-center">
                    <i data-feather="award" class="w-4 h-4 mr-2"></i> Karya Siswa
                </a>
                <a href="/berita" class="px-4 py-2 hover:bg-primary-dark text-decoration-none text-white flex items-center">
                    <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Berita & Artikel
                </a>
                <a href="#" class="px-4 py-2 hover:bg-primary-dark flex text-decoration-none text-white items-center">
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
                                @if($user->hasRole('admin'))
                                    <li><a href="/dashboard" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a></li>
                                @elseif ($user->hasRole('guru') || $user->hasRole('siswa'))
                                    <li><a href="/dashboard" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a></li>
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
                <a href="/detail-jurusan" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                    <i data-feather="info" class="w-4 h-4 mr-2"></i> Tentang Jurusan
                </a>
                <a href="#" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                    <i data-feather="award" class="w-4 h-4 mr-2"></i> Karya Siswa
                </a>
                  <a href="/berita" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                    <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Berita & Artikel
                </a>
                <a href="#" class="px-4 py-2 hover:bg-primary-dark flex items-center">
                    <i data-feather="message-circle" class="w-4 h-4 mr-2"></i> Kontak
                </a>

                @auth
                    @php
                        $user = Auth::user();
                    @endphp
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center w-full px-4 py-2 hover:bg-primary-dark justify-between space-x-2">
                            <div class="flex items-center space-x-2">
                                <i data-feather="layout" class="w-4 h-4"></i>
                                <span>Dashboard</span>
                            </div>
                            <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition class="mt-2 bg-white text-purple-800 rounded shadow-lg z-50 w-56 absolute left-0" @click.away="open = false">
                            <nav class="flex flex-col space-y-2 px-4 py-2">
                                <a href="{{ route('dashboard') }}" class="hover:bg-white hover:text-purple-800 py-2 px-3 rounded transition {{ request()->is('dashboard') ? 'bg-white text-purple-800 font-semibold' : '' }}">
                                    Dashboard
                                </a>

                                @role('admin')
                                    <a href="{{ route('admin.guru.index') }}" class="hover:bg-white hover:text-purple-800 py-2 px-3 rounded transition {{ request()->is('admin/guru*') ? 'bg-white text-purple-800 font-semibold' : '' }}">
                                        Guru
                                    </a>
                                    <a href="{{ route('admin.siswa.index') }}" class="hover:bg-white hover:text-purple-800 py-2 px-3 rounded transition {{ request()->is('admin/siswa*') ? 'bg-white text-purple-800 font-semibold' : '' }}">
                                        Siswa
                                    </a>
                                    <a href="#" class="hover:bg-white hover:text-purple-800 py-2 px-3 rounded transition">
                                        Kelas
                                    </a>
                                    <a href="/admin/berita" class="hover:bg-white hover:text-purple-800 py-2 px-3 rounded transition">
                                        Berita & Artikel
                                    </a>
                                @endrole

                                @role('guru')
                                    <a href="#" class="hover:bg-white hover:text-purple-800 py-2 px-3 rounded transition">
                                        Karya Terbaik
                                    </a>
                                    <a href="{{ route('guru.approved') }}" class="hover:bg-white hover:text-purple-800 py-2 px-3 rounded transition">
                                        Approve Siswa
                                    </a>
                                    <a href="" class="hover:bg-white hover:text-purple-800 py-2 px-3 rounded transition">
                                        Ujian/Ulangan
                                    </a>
                                @endrole

                                @role('siswa')
                                    <a href="#" class="hover:bg-white hover:text-purple-800 py-2 px-3 rounded transition">
                                        Karya
                                    </a>
                                    <a href="#" class="hover:bg-white hover:text-purple-800 py-2 px-3 rounded transition">
                                        Tugas/Ulangan
                                    </a>
                                    <a href="#" class="hover:bg-white hover:text-purple-800 py-2 px-3 rounded transition">
                                        Hasil Nilai
                                    </a>
                                @endrole
                            </nav>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="mt-2">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-left flex items-center w-full text-white bg-red-600 hover:bg-red-700 rounded">
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
