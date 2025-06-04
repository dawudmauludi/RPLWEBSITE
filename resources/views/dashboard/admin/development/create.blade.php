@extends('layouts.masterDashboard')

@section('title', 'add Developmetn')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.development.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @include('dashboard.admin.development.form')
    </form>
</div>
@endsection
