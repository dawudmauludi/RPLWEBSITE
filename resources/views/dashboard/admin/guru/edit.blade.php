@extends('layouts.masterDashboard')

@section('title', 'Edit Guru')

@section('content')
    <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('dashboard.admin.guru.form', ['guru' => $guru])
    </form>
@endsection
