@extends('layouts.masterDashboard')

@section('title', 'Add User')

@section('content')
<form action="{{ route('admin.user.store') }}" method="POST">
    @include('dashboard.admin.user.form')
</form>
@endsection
