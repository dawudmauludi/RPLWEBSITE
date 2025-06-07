@extends('layouts.masterDashboard')
@section('title', 'Edit Berita')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        @include('dashboard.admin.Jobsheet.form', ['job' => $job])
    </form>
</div>
@endsection
