@extends('layouts.masterDashboard')

@section('title', 'Add Berita')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Tambah Berita</h1>
    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @include('dashboard.admin.berita.form')
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
    <div class="text-right mt-4">
        <a href="{{ route('admin.berita.index') }}" class="bg-gray-200 px-4 py-2 rounded">Kembali</a>
    </div>
</div>
@endsection
