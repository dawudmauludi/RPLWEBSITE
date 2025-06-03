@extends('layouts.masterDashboard')

@section('title', 'Edit Kategori Karya')

@section('content')
    <form action="{{ route('admin.future.update', $future->id) }}" method="POST">
        @method('PUT')
        @include('dashboard.admin.future.form', ['future' => $future])
    </form>
@endsection
