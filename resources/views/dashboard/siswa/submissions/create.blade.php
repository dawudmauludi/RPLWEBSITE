@extends('layouts.masterDashboard')

@section('title', 'Tambah Tugas')

@section('content')
   <form action="{{ route('submissions.store', $assignments->id) }}" method="POST" enctype="multipart/form-data">
        @include('dashboard.siswa.submissions.form')
    </form>
@endsection
