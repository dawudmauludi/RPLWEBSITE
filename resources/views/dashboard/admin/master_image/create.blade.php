@extends('layouts.masterDashboard')

@section('title', 'Add master_image')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.master_image.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @include('dashboard.admin.master_image.form')
    </form>
</div>
@endsection
