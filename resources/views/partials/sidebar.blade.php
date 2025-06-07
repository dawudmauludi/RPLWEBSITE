<!-- partials/sidebar.blade.php -->
<div class="hidden lg:block bg-gradient-to-b from-purple-700 to-purple-900 text-white h-screen fixed left-0 top-0 w-64 overflow-y-auto pt-16 shadow-2xl">
    @auth
        @php
            $userLogin = null;
            $user = Auth::user();
            $userLogin = $user->name ?? $user->siswaProfile;
        @endphp
    @endauth

    <!-- User Profile Section -->
    <div class="flex flex-col items-center space-y-3 py-6 px-4">
        @php
            $foto = null;
            if (isset($user->siswaprofile) && $user->siswaprofile->foto) {
                $foto = asset('storage/' . $user->siswaprofile->foto);
            } elseif (isset($user->guruProfile) && $user->guruprofile->foto) {
                $foto = asset('storage/' . $user->guruprofile->foto);
            }
        @endphp

        <div class="relative">
            <img src="{{ $foto ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=ffffff&color=8b5cf6&size=128&bold=true' }}"
                 alt="Avatar"
                 class="w-20 h-20 rounded-full border-4 border-white shadow-lg" />
            <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-400 rounded-full border-2 border-white"></div>
        </div>

        <div class="text-center">
            <p class="font-bold text-white text-lg">{{ $user->name }}</p>
            <div class="flex items-center justify-center space-x-1 mt-1">
                <i data-feather="shield" class="w-4 h-4 text-purple-200"></i>
                <p class="text-sm text-purple-200 font-medium capitalize">{{ $user->roles->first()->name ?? '' }}</p>
            </div>
            @if($user->roles->first()->name === 'siswa')
                <div class="flex items-center justify-center space-x-1 mt-2 bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full border border-white/30">
                    <i data-feather="star" class="w-4 h-4 text-yellow-300"></i>
                    <p class="text-sm text-white font-semibold">{{ $user->poin }} Poin</p>
                </div>
            @endif
        </div>
    </div>

    <hr class="mx-4 border-white/20">

    <!-- Navigation Menu -->
    <nav class="flex flex-col space-y-1 px-4 py-4">
        <a href="{{ route('dashboard') }}"
           class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('dashboard') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
            <i data-feather="home" class="w-5 h-5 {{ request()->is('dashboard') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
            <span>Dashboard</span>
        </a>

        @role('admin')
            <a href="{{ route('admin.guru.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/guru*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="users" class="w-5 h-5 {{ request()->is('admin/guru*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Guru</span>
            </a>

            <a href="{{ route('admin.siswa.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/siswa*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="user-check" class="w-5 h-5 {{ request()->is('admin/siswa*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Siswa</span>
            </a>

            <a href="{{ route('admin.kelas.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/kelas*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="layers" class="w-5 h-5 {{ request()->is('admin/kelas*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Kelas</span>
            </a>


            <a href="{{ route('admin.user.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->routeIs('admin.user.index') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="user" class="w-5 h-5 {{ request()->routeIs('admin.user.index') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>User</span>
            </a>

            <a href="{{ route('admin.approved') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/approved*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="check-circle" class="w-5 h-5 {{ request()->is('admin/approved*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Approve User</span>
            </a>

            <a href="{{ route('admin.kategoriBerita.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/kategoriBerita*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="tag" class="w-5 h-5 {{ request()->is('admin/kategoriBerita*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Kategori Berita</span>
            </a>

            <a href="{{ route('admin.berita.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/berita*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="paperclip" class="w-5 h-5 {{ request()->is('admin/berita*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Berita & Artikel</span>
            </a>

            <a href="{{ route('admin.karya.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/karya*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="award" class="w-5 h-5 {{ request()->is('admin/karya*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Karya Siswa</span>
            </a>

            <a href="{{ route('admin.kategoriKarya.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/kategoriKarya*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="folder" class="w-5 h-5 {{ request()->is('admin/kategoriKarya*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Kategori Karya</span>
            </a>

            <a href="{{ route('admin.users.indexAddPoint') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->routeIs('admin.users.indexAddPoint') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="plus-circle" class="w-5 h-5 {{ request()->routeIs('admin.users.indexAddPoint') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Tambah Poin Siswa</span>
            </a>
            <a href="{{ route('admin.future.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/future*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="plus-circle" class="w-5 h-5 {{ request()->is('admin/future*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Future</span>
            </a>
            <a href="{{ route('admin.jurusan.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/jurusan*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="plus-circle" class="w-5 h-5 {{ request()->is('admin/jurusan*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Jurusan</span>
            </a>
            <a href="{{ route('admin.lesson.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/lesson*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="plus-circle" class="w-5 h-5 {{ request()->is('admin/lesson*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Mapel</span>
            </a>
            <a href="{{ route('admin.language.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/language*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="plus-circle" class="w-5 h-5 {{ request()->is('admin/language*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Bahasa Pemograman</span>
            </a>
            <a href="{{ route('admin.development.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/development*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="plus-circle" class="w-5 h-5 {{ request()->is('admin/development*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Pengembangan Software</span>
            </a>
            <a href="{{ route('admin.career.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/career*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="plus-circle" class="w-5 h-5 {{ request()->is('admin/career*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Peluang Karier</span>
            </a>
            <a href="{{ route('admin.jobs.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/jobs*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="plus-circle" class="w-5 h-5 {{ request()->is('admin/jobs*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Jobs</span>
            </a>
            <a href="{{ route('admin.kaprodi.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('admin/kaprodi*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="user" class="w-5 h-5 {{ request()->is('admin/kaprodi*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Kaprodi</span>
            </a>
        @endrole

        @role('guru')
           <a href="{{ route('guru.karya.siswa.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('guru/karya*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="award" class="w-5 h-5 {{ request()->is('guru/karya*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Karya Siswa</span>
            </a>

            <a href="{{ route('ulangans.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('ulangans*') || request()->is('nilai*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="file-text" class="w-5 h-5 {{ request()->is('ulangans*') || request()->is('nilai*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Ujian/Ulangan</span>
            </a>
        @endrole

        @role('alumni')
           <a href="#"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('guru/karya*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="award" class="w-5 h-5 {{ request()->is('guru/karya*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Jobs</span>
            </a>
        @endrole

        @role('siswa')
            <a href="{{ route('siswa.karya.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('siswa/karya*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="image" class="w-5 h-5 {{ request()->is('siswa/karya*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Karya</span>
            </a>

            <a href="{{ route('ulangans.my-ulangans') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('my-ulangans') || request()->is('ulangans*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="edit" class="w-5 h-5 {{ request()->is('my-ulangans') || request()->is('ulangans*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Tugas/Ulangan</span>
            </a>

            <a href="{{ route('nilai.index') }}"
               class="flex items-center space-x-3 py-3 px-4 rounded-xl transition-all duration-200 hover:bg-white/10 backdrop-blur-sm group {{ request()->is('nilai*') ? 'bg-white text-purple-700 font-semibold shadow-lg' : 'text-white hover:text-white' }}">
                <i data-feather="bar-chart-2" class="w-5 h-5 {{ request()->is('nilai*') ? 'text-purple-600' : 'text-purple-200 group-hover:text-white' }}"></i>
                <span>Hasil Nilai Ulangan</span>
            </a>
        @endrole
    </nav>

    <!-- Logout Button -->
    <div class="flex flex-col justify-end px-4 pb-6 mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="flex items-center justify-center space-x-2 w-full py-3 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-xl transition-all duration-200 border border-white/30 hover:border-white/50 transform hover:scale-105">
                <i data-feather="log-out" class="w-5 h-5"></i>
                <span class="font-medium">Log Out</span>
            </button>
        </form>
    </div>
</div>

<!-- Script untuk Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace()
</script>
