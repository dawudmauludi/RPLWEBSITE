@extends('layouts.masterDashboard')

@section('title', 'Tambah Future')

@section('content')
<form action="{{ route('admin.jurusan.store') }}" method="POST">
    @include('dashboard.admin.jurusan.form')
</form>
@endsection
