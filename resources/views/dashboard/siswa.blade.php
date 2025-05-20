@extends('layouts.master')

@section('title', 'Dashboard siswa')

@section('content')
    <h1 class="text-xl font-bold mb-4">Selamat Datang, {{ Auth::user()->nama }}</h1>
    <p>Ini adalah dashboard untuk siswa.</p>
@endsection
