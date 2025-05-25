@extends('layouts.masterDashboard')
@section('title', 'Edit Karya')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('guru.karya.update', $karya->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        @include('dashboard.guru.karya.form', ['karya' => $karya])
    </form>
</div>
@endsection
