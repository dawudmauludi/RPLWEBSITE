@extends('layouts.masterDashboard')

@section('title', 'Tambah Siswa')

@section('content')
    <h1>Tambah Siswa</h1>
    <form action="{{ route('admin.siswa.store') }}" method="POST" enctype="multipart/form-data">
        @include('dashboard.admin.siswa.form')
    </form>
@endsection
