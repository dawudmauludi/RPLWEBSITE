@extends('layouts.masterDashboard')

@section('title', 'Edit Kategori Karya')

@section('content')
    <form action="{{ route('admin.kategoriKarya.update', $kategori->id) }}" method="POST">
        @method('PUT')
        @include('dashboard.admin.kategoriKarya.form', ['kategori' => $kategori])
    </form>
@endsection
