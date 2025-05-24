@extends('layouts.masterDashboard')

@section('title', 'Edit Guru')

@section('content')
    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @method('PUT')
        @include('dashboard.admin.user.form', ['user' => $user])
    </form>
@endsection
