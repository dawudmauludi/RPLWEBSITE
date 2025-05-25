@extends('layouts.masterDashboard')

@section('title', 'Add Kategori Berita')

@section('content')
<form action="{{ route('admin.kategoriBerita.store') }}" method="POST">
    @include('dashboard.admin.kategoriBerita.form')
</form>
@endsection
