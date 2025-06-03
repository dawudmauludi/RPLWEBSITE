@extends('layouts.masterDashboard')

@section('title', 'Add Karya')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.karya.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @include('dashboard.admin.karya.form')
    </form>
</div>
@endsection
