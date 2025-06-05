@extends('layouts.masterDashboard')
@section('title', 'Edit kaprodi')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.kaprodi.update', $kaprodi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        @include('dashboard.admin.kaprodi.form', ['kaprodi' => $kaprodi])
    </form>
</div>
@endsection
