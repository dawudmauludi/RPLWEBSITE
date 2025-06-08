@extends('layouts.masterDashboard')

@section('title', 'Edit alumni')

@section('content')
    <form action="{{ route('admin.alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('dashboard.admin.alumni.form', ['alumni' => $alumni])
    </form>
@endsection

