@extends('layouts.masterDashboard')

@section('title', 'Add kaprodi')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('admin.kaprodi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @include('dashboard.admin.kaprodi.form')
    </form>
</div>
@endsection
