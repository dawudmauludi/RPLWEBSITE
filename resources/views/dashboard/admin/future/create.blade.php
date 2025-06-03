@extends('layouts.masterDashboard')

@section('title', 'Tambah Future')

@section('content')
<form action="{{ route('admin.future.store') }}" method="POST">
    @include('dashboard.admin.future.form')
</form>
@endsection
