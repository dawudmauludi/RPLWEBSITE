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
    <h1 class="text-2xl font-semibold mb-4">Daftar User untuk Disetujui</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-xl shadow-md">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="py-3 px-4 text-left">Nama</th>
                    <th class="py-3 px-4 text-left">Email</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $user->nama }}</td>
                    <td class="py-3 px-4">{{ $user->email }}</td>
                    <td class="py-3 px-4">
                        @if($user->is_approved)
                            <span class="inline-block px-3 py-1 text-sm text-green-700 bg-green-100 rounded-full">Disetujui</span>
                        @else
                            <span class="inline-block px-3 py-1 text-sm text-yellow-700 bg-yellow-100 rounded-full">Menunggu</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 flex gap-2">
                        @if(!$user->is_approved)
                        <form action="{{ route('guru.user.approve', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">Setujui</button>
                        </form>
                        <form action="{{ route('guru.user.reject', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Tolak</button>
                        </form>
                        @else
                        <span class="text-sm text-gray-500">Sudah disetujui</span>
                        @endif
                    </td>
                </tr>
                @endforeach

                @if($users->isEmpty())
                <tr>
                    <td colspan="4" class="py-4 text-center text-gray-500">Tidak ada user yang menunggu persetujuan.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
