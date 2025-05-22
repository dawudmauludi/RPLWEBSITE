@extends('layouts.masterDashboard')

@section('title', 'Add Guru')

@section('content')
<form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
    @include('dashboard.admin.guru.form')
</form>
@endsection
