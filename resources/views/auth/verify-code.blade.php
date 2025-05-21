@extends('layouts.app')
@section('title','Minta Code')
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Verifikasi Kode</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reset.password') }}" method="POST" class="space-y-4">
            @csrf

           <input type="hidden" name="email" value="{{ old('email', $email ?? '') }}">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kode Verifikasi (OTP)</label>
                <input type="text" name="token" placeholder="Contoh: 123456"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                <input type="password" name="password" placeholder="Minimal 6 karakter"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password"
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200">
                Ubah Password
            </button>
        </form>

        <p class="mt-4 text-sm text-center text-gray-600">
            Belum menerima kode? <a href="{{ url('/password/request') }}" class="text-blue-600 hover:underline">Kirim Ulang</a>
        </p>
    </div>
</div>

    

@endsection