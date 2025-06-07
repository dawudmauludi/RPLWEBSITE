@extends('layouts.masterDashboard')

@section('title', 'Add Job')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.jobs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @include('dashboard.admin.Jobsheet.form')
    </form>
</div>
@endsection
