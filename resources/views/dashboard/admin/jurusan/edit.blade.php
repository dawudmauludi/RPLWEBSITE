@extends('layouts.masterDashboard')

@section('title', 'Edit Kategori Karya')

@section('content')
    <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('dashboard.admin.jurusan.form', ['jurusan' => $jurusan])
    </form>
@endsection
