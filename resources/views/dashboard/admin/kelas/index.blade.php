@extends('layouts.masterDashboard')

@section('title', 'Approval User')

@section('content')

      @if (session('error'))
          <script>
              Swal.fire({
                  icon: 'error',
                  title: 'Gagal',
                  text: '{{ session('error') }}',
              });
          </script>
      @endif

      @if (session('success'))
          <script>
              Swal.fire({
                  icon: 'success',
                  title: 'Sukses',
                  text: '{{ session('success') }}',
              });
          </script>
      @endif





<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-4">Daftar Kelas</h1>
    <a href="{{ route('admin.kelas.create') }}" class="bg-blue-500 p-2 rounded-lg mb-4 text-white ">Tambah Kelas</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-xl shadow-md">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-3 px-4 text-left">Nama</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelass as $kelas)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $kelas->nama }}</td>
                    <td class="py-3 px-4 flex gap-2">
                            <a href="{{ route('admin.kelas.edit', $kelas->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">Edit</a>
                        <form action="{{ route('admin.kelas.destroy', $kelas->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($kelass->isEmpty())
                <tr>
                    <td colspan="4" class="py-4 text-center text-gray-500">Tidak ada kelas yang di tambahkan</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
