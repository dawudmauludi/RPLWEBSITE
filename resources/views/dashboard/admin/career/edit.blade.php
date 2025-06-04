@extends('layouts.masterDashboard')
@section('title', 'Edit career')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.career.update', $career->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        @include('dashboard.admin.career.form', ['career' => $career])
    </form>
</div>
@endsection
