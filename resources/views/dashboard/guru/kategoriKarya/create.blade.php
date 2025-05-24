@extends('layouts.masterDashboard')

@section('title', 'Add Kategori Karya')

@section('content')
<form action="{{ route('guru.kategoriKarya.store') }}" method="POST">
    @include('dashboard.guru.kategoriKarya.form')
</form>
@endsection
