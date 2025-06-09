@extends('layouts.masterDashboard')
@section('title', 'Edit Assignment')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('assignments.update', $assignment->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        @include('dashboard.guru.assignments.form', ['assignment' => $assignment])
    </form>
</div>
@endsection
