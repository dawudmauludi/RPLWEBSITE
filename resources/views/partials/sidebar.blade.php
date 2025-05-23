<!-- partials/sidebar.blade.php -->
<div class="hidden lg:block bg-purple-800 text-white h-screen fixed left-0 top-0 w-64 overflow-y-auto pt-16"> <!-- hidden for mobile, lg:block for desktop -->
    @auth
        @php
            $user = Auth::user();
        @endphp
    @endauth
    <div class="flex flex-col items-center space-y-2 py-6">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->nama) }}&background=ffffff&color=0d6efd&size=128&bold=true"
             alt="Avatar"
             class="w-20 h-20 rounded-full border-4 border-white" />
        <div class="text-center">
            <p class="font-bold">{{ $user->nama }}</p>
            <p class="text-sm">{{ $user->roles->first()->name ?? '' }}</p>
        </div>
    </div>

    <hr class="my-4 border-white/20">

    <nav class="flex flex-col space-y-2 px-4">
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

            <a href="{{ route('admin.kelas.index') }}" class="hover:bg-white hover:text-purple-800 py-2 px-3 rounded transition {{ request()->is('') ? 'bg-white text-purple-800 font-semibold' : '' }}">
                Kelas
            </a>
            <a href="#" class="hover:bg-white hover:text-purple-800 py-2 px-3 rounded transition">
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
            <a href="#" class="hover:bg-white hover:text-purple-800 py-2 px-3 rounded transition">
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

    <div class="flex flex-col flex-1 justify-end px-4 mt-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full py-2 bg-red-600 hover:bg-red-700 text-white rounded transition">
                Log Out
            </button>
        </form>
    </div>
</div>
