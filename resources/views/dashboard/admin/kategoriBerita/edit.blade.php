@extends('layouts.masterDashboard')

@section('title', 'Edit Kategori Berita')

@section('content')
    <form action="{{ route('admin.kategoriBerita.update', $kategori->id) }}" method="POST">
        @method('PUT')
        @include('dashboard.admin.kategoriBerita.form', ['kategori' => $kategori])
    </form>
@endsection
