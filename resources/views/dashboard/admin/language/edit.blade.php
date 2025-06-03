@extends('layouts.masterDashboard')
@section('title', 'Edit language')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.language.update', $language->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        @include('dashboard.admin.language.form', ['language' => $language])
    </form>
</div>
@endsection
