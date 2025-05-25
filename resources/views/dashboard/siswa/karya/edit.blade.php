@extends('layouts.masterDashboard')
@section('title', 'Edit Karya')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('siswa.karya.update', $karya->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        @include('dashboard.siswa.karya.form', ['karya' => $karya])
    </form>
</div>
@endsection
