@extends('layouts.masterDashboard')

@section('title', 'Tambah Ulangan')

@section('content')
    <form action="{{ route('ulangans.store') }}" method="POST">
        @include('dashboard.guru.ulangans.form')
    </form>
@endsection
