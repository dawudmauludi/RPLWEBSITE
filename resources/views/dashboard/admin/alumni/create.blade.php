@extends('layouts.masterDashboard')

@section('title', 'Tambah alumni')

@section('content')
    <form action="{{ route('admin.alumni.store') }}" method="POST" enctype="multipart/form-data">
        @include('dashboard.admin.alumni.form')
    </form>
@endsection
