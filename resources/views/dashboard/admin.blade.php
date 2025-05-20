@extends('layouts.masterDashboard')

@section('title', 'Dashboard admin')

@section('content')
    <h1 class="text-xl font-bold mb-4">Selamat Datang, {{ Auth::user()->nama }}</h1>
    <p>Ini adalah dashboard untuk admin.</p>
@endsection
