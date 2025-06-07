<nav
    x-data="{ mobileMenuOpen: false }"
    class="bg-gradient-to-r from-purple-900 via-purple-800 to-indigo-900 backdrop-blur-md bg-opacity-95 text-white fixed top-0 left-0 w-full z-50 shadow-2xl border-b border-purple-700/30"
>
    <div class="container mx-auto px-4 lg:px-6">
        <div class="flex justify-between items-center py-4">
            <!-- Logo Section -->
            <a href="/" class="flex items-center group transition-transform duration-300 hover:scale-105">
                <div class="backdrop-blur-sm rounded-xl p-2 mr-3 group-hover:bg-white/20 transition-all duration-300">
                    <img src="{{ asset('images/logo_skensa.png') }}" alt="Logo" class="h-10 w-auto">
                </div>
                <div class="hidden lg:block">
                    <span class="text-xl font-bold bg-gradient-to-r from-white to-purple-200 bg-clip-text text-transparent">
                        SMK NEGERI 1 PASURUAN
                    </span>
                    <span class="block text-sm font-medium text-white/80">
                        Rekayasa Perangkat Lunak
                    </span>
                </div>
            </a>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="relative w-10 h-10 bg-white/10 backdrop-blur-sm rounded-lg hover:bg-white/20 transition-all duration-300 flex items-center justify-center group"
                >
                    <div class="space-y-1.5 transform transition-all duration-300" :class="mobileMenuOpen ? 'rotate-45' : ''">
                        <span class="block w-5 h-0.5 bg-white transition-all duration-300" :class="mobileMenuOpen ? 'rotate-90 translate-y-2' : ''"></span>
                        <span class="block w-5 h-0.5 bg-white transition-all duration-300" :class="mobileMenuOpen ? 'opacity-0' : ''"></span>
                        <span class="block w-5 h-0.5 bg-white transition-all duration-300" :class="mobileMenuOpen ? '-rotate-90 -translate-y-2' : ''"></span>
                    </div>
                </button>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center flex gap-x-2">
                <a href="/" class="group relative px-4 py-2.5 rounded-xl hover:bg-white/10 backdrop-blur-sm text-white transition-all duration-300 flex items-center {{ request()->is('/') ? 'bg-white/20 shadow-lg' : '' }}">
                    <div class="w-5 h-5 mr-2 transition-all duration-300 group-hover:scale-110">
                        <i data-feather="home" class="w-full h-full"></i>
                    </div>
                    <span class="font-medium">Beranda</span>
                    <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-purple-400/20 to-pink-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                </a>

                <a href="{{ route('detail.jurusan') }}" class="group relative px-4 py-2.5 rounded-xl hover:bg-white/10 backdrop-blur-sm text-white transition-all duration-300 flex items-center {{ request()->is('tentang-jurusan*') ? 'bg-white/20 shadow-lg' : '' }}">
                    <div class="w-5 h-5 mr-2 transition-all duration-300 group-hover:scale-110">
                        <i data-feather="info" class="w-full h-full"></i>
                    </div>
                    <span class="font-medium">Tentang Jurusan</span>
                    <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-400/20 to-cyan-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                </a>

                <a href="{{ route('karya.all') }}" class="group relative px-4 py-2.5 rounded-xl hover:bg-white/10 backdrop-blur-sm text-white transition-all duration-300 flex items-center {{ request()->is('karya') ? 'bg-white/20 shadow-lg' : '' }}">
                    <div class="w-5 h-5 mr-2 transition-all duration-300 group-hover:scale-110">
                        <i data-feather="award" class="w-full h-full"></i>
                    </div>
                    <span class="font-medium">Karya Siswa</span>
                    <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-yellow-400/20 to-orange-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                </a>

                <a href="/berita" class="group relative px-4 py-2.5 rounded-xl hover:bg-white/10 backdrop-blur-sm text-white transition-all duration-300 flex items-center {{ request()->is('berita') ? 'bg-white/20 shadow-lg' : '' }}">
                    <div class="w-5 h-5 mr-2 transition-all duration-300 group-hover:scale-110">
                        <i data-feather="file-text" class="w-full h-full"></i>
                    </div>
                    <span class="font-medium">Berita & Artikel</span>
                    <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-green-400/20 to-emerald-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                </a>

                <a href="/kontak" class="group relative px-4 py-2.5 rounded-xl hover:bg-white/10 backdrop-blur-sm text-white transition-all duration-300 flex items-center {{ request()->is('kontak') ? 'bg-white/20 shadow-lg' : '' }}">
                    <div class="w-5 h-5 mr-2 transition-all duration-300 group-hover:scale-110">
                        <i data-feather="message-circle" class="w-full h-full"></i>
                    </div>
                    <span class="font-medium">Kontak</span>
                    <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-pink-400/20 to-rose-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                </a>

                @auth
                    @php
                        $user = Auth::user();
                        $isSiswa = $user->hasRole('siswa');
                        $hasProfile = \App\Models\siswa_profile::where('user_id', $user->id)->exists();
                        $studentProfile = $user->siswaProfile;
                        $alumniProfile = $user->alumniProfile;
                        $guruProfile = $user->guruProfile;
                    @endphp
                    <div class="relative ml-4" x-data="{ open: false }">
                        <button @click="open = !open" class="group relative w-12 h-12 rounded-full overflow-hidden ring-2 ring-white/30 hover:ring-white/60 transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300/50">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=6366f1&color=ffffff&size=128&bold=true" alt="Avatar" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-purple-600/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </button>

                        <div
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-95"
                            @click.away="open = false"
                            class="absolute right-0 mt-3 w-56 bg-white/95 backdrop-blur-xl text-gray-800 rounded-2xl shadow-2xl border border-purple-200/50 z-50"
                        >
                            <div class="py-2">
                                <div class="px-4 py-3 border-b border-gray-200/50">
                                    <p class="text-sm font-semibold text-gray-900">{{ $user->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                </div>

                                @if($user->hasRole('admin'))
                                    <a href="/dashboard" class="flex items-center px-4 py-3 hover:bg-purple-50 transition-colors duration-200 group">
                                        <i data-feather="layout" class="w-4 h-4 mr-3 text-purple-600 group-hover:scale-110 transition-transform duration-200"></i>
                                        <span class="text-sm font-medium">Dashboard</span>
                                    </a>
                                @elseif ($user->hasRole('guru'))
                                    <a href="/dashboard" class="flex items-center px-4 py-3 hover:bg-purple-50 transition-colors duration-200 group">
                                        <i data-feather="layout" class="w-4 h-4 mr-3 text-purple-600 group-hover:scale-110 transition-transform duration-200"></i>
                                        <span class="text-sm font-medium">Dashboard</span>
                                    </a>
                                    <a href="{{ $guruProfile ? route('guru.profileGuru.show', $guruProfile->id) : route('guru.profileGuru.create') }}"
                                    class="flex items-center px-4 py-3 hover:bg-purple-50 transition-colors duration-200 group">
                                        <i data-feather="user" class="w-4 h-4 mr-3 text-purple-600 group-hover:scale-110 transition-transform duration-200"></i>
                                        <span class="text-sm font-medium">Profile</span>
                                    </a>
                                @elseif ($user->hasRole('siswa'))
                                @if ($studentProfile)
                                    <a href="/dashboard" class="flex items-center px-4 py-3 hover:bg-purple-50 transition-colors duration-200 group">
                                        <i data-feather="layout" class="w-4 h-4 mr-3 text-purple-600 group-hover:scale-110 transition-transform duration-200"></i>
                                        <span class="text-sm font-medium">Dashboard</span>
                                    </a>
                                        <a href="{{ route('siswa.profileSiswa.show', $studentProfile->id) }}" class="flex items-center px-4 py-3 hover:bg-purple-50 transition-colors duration-200 group">
                                            <i data-feather="user" class="w-4 h-4 mr-3 text-purple-600 group-hover:scale-110 transition-transform duration-200"></i>
                                            <span class="text-sm font-medium">Profile</span>
                                        </a>
                                    @endif
                                @elseif ($user->hasRole('alumni'))
                                @if ($alumniProfile)
                                    <a href="/dashboard" class="flex items-center px-4 py-3 hover:bg-purple-50 transition-colors duration-200 group">
                                        <i data-feather="layout" class="w-4 h-4 mr-3 text-purple-600 group-hover:scale-110 transition-transform duration-200"></i>
                                        <span class="text-sm font-medium">Dashboard</span>
                                    </a>
                                        <a href="{{ route('alumni.profileAlumni.show', $alumniProfile->id) }}" class="flex items-center px-4 py-3 hover:bg-purple-50 transition-colors duration-200 group">
                                            <i data-feather="user" class="w-4 h-4 mr-3 text-purple-600 group-hover:scale-110 transition-transform duration-200"></i>
                                            <span class="text-sm font-medium">Profile</span>
                                        </a>
                                        <a href="{{ route('alumni.jobs.index') }}" class="flex items-center px-4 py-3 hover:bg-purple-50 transition-colors duration-200 group">
                                            <i data-feather="user" class="w-4 h-4 mr-3 text-purple-600 group-hover:scale-110 transition-transform duration-200"></i>
                                            <span class="text-sm font-medium">Lowongan Pekerjaan</span>
                                        </a>
                                    @endif
                                @endif

                                <div class="border-t border-gray-200/50 mt-2">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="flex items-center w-full px-4 py-3 hover:bg-red-50 text-red-600 transition-colors duration-200 group">
                                            <i data-feather="log-out" class="w-4 h-4 mr-3 group-hover:scale-110 transition-transform duration-200"></i>
                                            <span class="text-sm font-medium">Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="/login" class="group relative px-6 py-2.5 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 rounded-xl font-medium transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center ml-4">
                        <div class="w-5 h-5 mr-2 transition-all duration-300 group-hover:scale-110">
                            <i data-feather="user" class="w-full h-full"></i>
                        </div>
                        <span>Login</span>
                    </a>
                @endauth
            </div>
        </div>

        <!-- Mobile Menu -->
        <div
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-4"
            class="md:hidden"
        >
            <div class="bg-white/10 backdrop-blur-xl rounded-2xl mx-4 mb-4 p-4 border border-white/20 shadow-2xl">
                <div class="flex flex-col space-y-2">
                    <a href="/" class="group flex items-center px-4 py-3 rounded-xl hover:bg-white/10 transition-all duration-300 {{ request()->is('/') ? 'bg-white/20' : '' }}">
                        <div class="w-5 h-5 mr-3 transition-all duration-300 group-hover:scale-110">
                            <i data-feather="home" class="w-full h-full"></i>
                        </div>
                        <span class="font-medium">Beranda</span>
                    </a>

                    <a href="{{ route('detail.jurusan') }}" class="group flex items-center px-4 py-3 rounded-xl hover:bg-white/10 transition-all duration-300 {{ request()->is('detail-jurusan') ? 'bg-white/20' : '' }}">
                        <div class="w-5 h-5 mr-3 transition-all duration-300 group-hover:scale-110">
                            <i data-feather="info" class="w-full h-full"></i>
                        </div>
                        <span class="font-medium">Tentang Jurusan</span>
                    </a>

                    <a href="{{ route('karya.all') }}" class="group flex items-center px-4 py-3 rounded-xl hover:bg-white/10 transition-all duration-300 {{ request()->is('karya') ? 'bg-white/20' : '' }}">
                        <div class="w-5 h-5 mr-3 transition-all duration-300 group-hover:scale-110">
                            <i data-feather="award" class="w-full h-full"></i>
                        </div>
                        <span class="font-medium">Karya Siswa</span>
                    </a>

                    <a href="/berita" class="group flex items-center px-4 py-3 rounded-xl hover:bg-white/10 transition-all duration-300 {{ request()->is('berita') ? 'bg-white/20' : '' }}">
                        <div class="w-5 h-5 mr-3 transition-all duration-300 group-hover:scale-110">
                            <i data-feather="file-text" class="w-full h-full"></i>
                        </div>
                        <span class="font-medium">Berita & Artikel</span>
                    </a>

                    <a href="/kontak" class="group flex items-center px-4 py-3 rounded-xl hover:bg-white/10 transition-all duration-300 {{ request()->is('kontak') ? 'bg-white/20' : '' }}">
                        <div class="w-5 h-5 mr-3 transition-all duration-300 group-hover:scale-110">
                            <i data-feather="message-circle" class="w-full h-full"></i>
                        </div>
                        <span class="font-medium">Kontak</span>
                    </a>

                    @auth
                        @php
                            $user = Auth::user();
                        @endphp
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="group flex items-center justify-between w-full px-4 py-3 rounded-xl hover:bg-white/10 transition-all duration-300">
                                <div class="flex items-center">
                                    <div class="w-5 h-5 mr-3 transition-all duration-300 group-hover:scale-110">
                                        <i data-feather="user" class="w-full h-full"></i>
                                    </div>
                                    <span class="font-medium">{{ $user->name }}</span>
                                </div>
                                <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div
                                x-show="open"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-95"
                                class="mt-2 bg-white/95 backdrop-blur-xl text-purple-800 rounded-xl shadow-xl border border-white/30 ml-4"
                                @click.away="open = false"
                            >
                                <nav class="flex flex-col space-y-1 px-4 py-3">
                                    <a href="{{ route('dashboard') }}" class="group flex items-center hover:bg-purple-50 py-2 px-3 rounded-lg transition-all duration-200 {{ request()->is('dashboard') ? 'bg-purple-50 font-semibold' : '' }}">
                                        <i data-feather="home" class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                                        Dashboard
                                    </a>

                                    @role('admin')
                                        <a href="{{ route('admin.guru.index') }}" class="group flex items-center hover:bg-purple-50 py-2 px-3 rounded-lg transition-all duration-200 {{ request()->is('admin/guru*') ? 'bg-purple-50 font-semibold' : '' }}">
                                            <i data-feather="users" class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                                            Guru
                                        </a>
                                        <a href="{{ route('admin.siswa.index') }}" class="group flex items-center hover:bg-purple-50 py-2 px-3 rounded-lg transition-all duration-200 {{ request()->is('admin/siswa*') ? 'bg-purple-50 font-semibold' : '' }}">
                                            <i data-feather="user-check" class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                                            Siswa
                                        </a>
                                        <a href="#" class="group flex items-center hover:bg-purple-50 py-2 px-3 rounded-lg transition-all duration-200">
                                            <i data-feather="grid" class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                                            Kelas
                                        </a>
                                        <a href="/admin/berita" class="group flex items-center hover:bg-purple-50 py-2 px-3 rounded-lg transition-all duration-200">
                                            <i data-feather="file-text" class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                                            Berita & Artikel
                                        </a>
                                    @endrole

                                    @role('guru')
                                        <a href="{{ route('guru.karya.siswa.index') }}" class="group flex items-center hover:bg-purple-50 py-2 px-3 rounded-lg transition-all duration-200">
                                            <i data-feather="star" class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                                            Karya Terbaik
                                        </a>
                                        <a href="" class="group flex items-center hover:bg-purple-50 py-2 px-3 rounded-lg transition-all duration-200">
                                            <i data-feather="clipboard" class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                                            Ujian/Ulangan
                                        </a>
                                    @endrole

                                    @role('siswa')
                                        <a href="#" class="group flex items-center hover:bg-purple-50 py-2 px-3 rounded-lg transition-all duration-200">
                                            <i data-feather="award" class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                                            Karya
                                        </a>
                                        <a href="#" class="group flex items-center hover:bg-purple-50 py-2 px-3 rounded-lg transition-all duration-200">
                                            <i data-feather="book-open" class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                                            Tugas/Ulangan
                                        </a>
                                        <a href="#" class="group flex items-center hover:bg-purple-50 py-2 px-3 rounded-lg transition-all duration-200">
                                            <i data-feather="bar-chart" class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                                            Hasil Nilai
                                        </a>
                                    @endrole
                                </nav>

                                <div class="border-t border-purple-200/50 mt-2">
                                    <form method="POST" action="{{ route('logout') }}" class="p-3">
                                        @csrf
                                        <button type="submit" class="group flex items-center w-full px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200">
                                            <i data-feather="log-out" class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                                            <span class="text-sm font-medium">Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="/login" class="group flex items-center px-4 py-3 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 rounded-xl font-medium transition-all duration-300 transform hover:scale-105 shadow-lg mt-3">
                            <div class="w-5 h-5 mr-3 transition-all duration-300 group-hover:scale-110">
                                <i data-feather="user" class="w-full h-full"></i>
                            </div>
                            <span>Login & Register</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
