@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <strong class="font-bold">Whoops!</strong>
        <span class="block">Terdapat beberapa masalah pada input kamu:</span>
        <ul class="list-disc pl-5 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@csrf

<div class="space-y-4 bg-white shadow p-6 rounded-md">
    <!-- Link -->
    <div>
        <label for="link" class="block text-gray-700 font-medium mb-1">Link Tugas</span></label>
        <input
            type="url"
            id="link"
            name="link"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="https://example.com/tugas"
        >
    </div>

    <!-- File -->
    <div>
        <label for="file" class="block text-gray-700 font-medium mb-1">Upload File (Opsional)</label>
        <input
            type="file"
            id="file"
            name="file"
            accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx"
            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
        >
        <p class="text-sm text-gray-500 mt-1">Rekomendasi: .pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx</p>
    </div>

    <!-- Photos -->
    <div>
        <label for="photos" class="block text-gray-700 font-medium mb-1">Upload Foto (Opsional)</label>
        <input
            type="file"
            id="photos"
            name="photos[]"
            accept="image/*"
            multiple
            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-green-50 file:text-green-700 hover:file:bg-green-100"
        >
    </div>

    <!-- Submit Button -->
    <div class="pt-4 flex justify-between">
        <a href="{{ route('submissions.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-6 rounded shadow-sm transition-all">
            Kembali
        </a>
        <button
            type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition duration-200"
        >
            Kumpulkan Tugas
        </button>
    </div>
</div>
