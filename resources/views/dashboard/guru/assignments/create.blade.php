@extends('layouts.masterDashboard')

@section('title', 'Tambah Tugas')

@section('content')
    <form action="{{ route('assignments.store') }}" method="POST" enctype="multipart/form-data">
        @include('dashboard.guru.assignments.form')
    </form>
@endsection
