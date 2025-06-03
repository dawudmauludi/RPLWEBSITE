@extends('layouts.masterDashboard')

@section('title', 'Add Kategori Karya')

@section('content')
<form action="{{ route('admin.kategoriKarya.store') }}" method="POST">
    @include('dashboard.admin.kategoriKarya.form')
</form>
@endsection
