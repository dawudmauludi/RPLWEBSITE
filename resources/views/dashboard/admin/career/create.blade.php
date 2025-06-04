@extends('layouts.masterDashboard')

@section('title', 'Add career')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.career.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @include('dashboard.admin.career.form')
    </form>
</div>
@endsection
