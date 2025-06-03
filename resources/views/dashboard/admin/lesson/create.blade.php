@extends('layouts.masterDashboard')

@section('title', 'Add Lesson')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.lesson.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @include('dashboard.admin.lesson.form')
    </form>
</div>
@endsection
