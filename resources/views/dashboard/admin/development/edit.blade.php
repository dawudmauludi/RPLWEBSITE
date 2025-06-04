@extends('layouts.masterDashboard')
@section('title', 'Edit Development')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.development.update', $development->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        @include('dashboard.admin.development.form', ['development' => $development])
    </form>
</div>
@endsection
