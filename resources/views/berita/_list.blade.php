<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($beritas as $berita)
        <div class="bg-white shadow-md rounded-2xl overflow-hidden transition hover:shadow-xl">
            <a href="{{ route('berita.show', $berita->slug) }}">
                <img src="{{ asset('storage/' . (json_decode($berita->gambar_berita)[0] ?? 'images/logo_skensa.png')) }}"
                     alt="{{ $berita->judul }}" class="w-full h-48 object-cover">
            </a>
            <div class="p-4">
                <a href="{{ route('berita.show', $berita->slug) }}">
                    <h2 class="text-xl font-bold text-gray-800 hover:text-blue-600 transition">
                        {{ $berita->judul }}
                    </h2>
                </a>
                <div class="mt-2 text-gray-600 text-sm">
                    {{ Str::limit(strip_tags($berita->exerpt), 120) }}
                </div>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-sm text-blue-500">
                        {{ $berita->category->nama ?? '-' }}
                    </span>
                    <span class="text-sm text-gray-400">
                        {{ $berita->created_at->translatedFormat('d M Y') }}
                    </span>
                </div>
            </div>
        </div>
    @empty
        <p class="text-gray-500 col-span-3">Tidak ada berita ditemukan.</p>
    @endforelse
</div>

<div class="mt-6">
    {{ $beritas->onEachSide(1)->links('pagination::tailwind') }}
</div>
