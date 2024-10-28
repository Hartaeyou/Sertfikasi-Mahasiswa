@extends('User.layout.main')
@section('title', 'Dashboard')
@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-center" style="flex-direction: column">
        <div class="greetings">
            <h1 class="text-center">Selamat Datang <span class="text-primary">{{ Auth::user()->name }}!</span></h1>
            <h3 class="text-center">Di Halaman Dashboard</h3>
            <h5 class="text-center">Silahkan Daftar</h5>
        </div>
    </div>
</div>


@endsection
