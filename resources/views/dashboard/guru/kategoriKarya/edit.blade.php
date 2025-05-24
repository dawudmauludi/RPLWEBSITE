@extends('layouts.masterDashboard')

@section('title', 'Edit Kategori Karya')

@section('content')
    <form action="{{ route('guru.kategoriKarya.update', $kategori->id) }}" method="POST">
        @method('PUT')
        @include('dashboard.guru.kategoriKarya.form', ['kategori' => $kategori])
    </form>
@endsection
