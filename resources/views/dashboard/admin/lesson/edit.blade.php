@extends('layouts.masterDashboard')
@section('title', 'Edit Lesson')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.lesson.update', $lesson->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        @include('dashboard.admin.lesson.form', ['lesson' => $lesson])
    </form>
</div>
@endsection
