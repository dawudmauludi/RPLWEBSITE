@extends('layouts.masterDashboard')

@section('title', 'Add Berita')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @include('dashboard.admin.berita.form')
    </form>
</div>
@endsection
