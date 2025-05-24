@extends('layouts.masterDashboard')
@section('title', 'Edit Berita')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Edit Berita</h1>
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        @include('dashboard.admin.berita.form', ['berita' => $berita])
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
    </form>
    <div class="text-right mt-4">
        <a href="{{ route('admin.berita.index') }}" class="bg-gray-200 px-4 py-2 rounded">Kembali</a>
    </div>
</div>
@endsection
