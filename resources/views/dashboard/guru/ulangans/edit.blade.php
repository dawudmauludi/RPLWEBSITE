@extends('layouts.masterDashboard')

@section('title', 'Edit Ulangan')

@section('content')
    <form action="{{ route('ulangans.update', $ulangan) }}" method="POST" id="editUlanganForm">
        @include('dashboard.guru.ulangans.form', ['ulangan' => $ulangan])
    </form>
@endsection
