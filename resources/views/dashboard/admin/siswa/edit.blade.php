@extends('layouts.masterDashboard')

@section('title', 'Edit Siswa')

@section('content')
    <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('dashboard.admin.siswa.form', ['siswa' => $siswa])
    </form>
@endsection
