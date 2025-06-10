 @if ($submissions->count())
        <div class="bg-white shadow rounded p-4 overflow-x-auto">
            <table class="min-w-full text-left">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">Nama Siswa</th>
                        <th class="px-4 py-2 border-b">Link Tugas</th>
                        <th class="px-4 py-2 border-b">File</th>
                        <th class="px-4 py-2 border-b">Foto</th>
                        <th class="px-4 py-2 border-b">Waktu Submit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($submissions as $submission)
                        <tr>
                            <td class="px-4 py-2 border-b">{{ $submission->user->name }}</td>
                            <td class="px-4 py-2 border-b">
                                @if ($submission->link)
                                    <a href="{{ $submission->link }}" target="_blank" class="text-blue-500 underline">Lihat Link</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-2 border-b">
                                @if ($submission->file)
                                    <a href="{{ asset('storage/' . $submission->file) }}" target="_blank" class="text-blue-500 underline">Download</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-2 border-b">
                                @if ($submission->photos && $submission->photos->count())
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($submission->photos as $photo)
                                            <img
                                                src="{{ asset('storage/' . $photo->photo_path) }}"
                                                alt="Photo"
                                                class="w-16 h-16 rounded object-cover cursor-pointer"
                                                onclick="openModal('{{ asset('storage/' . $photo->photo_path) }}')"
                                            >
                                        @endforeach
                                    </div>
                                @else
                                    -
                                @endif

                                <!-- Modal -->
                                <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden z-50">
                                    <span class="absolute top-5 right-5 text-white cursor-pointer text-3xl font-bold" onclick="closeModal()">&times;</span>
                                    <img id="modalImage" src="" alt="Large Photo" class="max-w-full max-h-full rounded">
                                </div>

                                <script>
                                    function openModal(src) {
                                        document.getElementById('modalImage').src = src;
                                        document.getElementById('imageModal').classList.remove('hidden');
                                    }
                                    function closeModal() {
                                        document.getElementById('imageModal').classList.add('hidden');
                                        document.getElementById('modalImage').src = '';
                                    }

                                    // Optional: close modal if click outside image
                                    document.getElementById('imageModal').addEventListener('click', function(e) {
                                        if (e.target.id === 'imageModal') {
                                            closeModal();
                                        }
                                    });
                                </script>
                            </td>

                            <td class="px-4 py-2 border-b">
                                {{ $submission->created_at->timezone('Asia/Jakarta')->format('d M Y H:i') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-600">Belum ada siswa yang mengumpulkan tugas.</p>
    @endif
