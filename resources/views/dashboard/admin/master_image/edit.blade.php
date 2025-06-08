@extends('layouts.masterDashboard')
@section('title', 'Edit master_image')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.master_image.update', $master_image->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        @include('dashboard.admin.master_image.form', ['master_image' => $master_image])
    </form>
</div>
@endsection
