@extends('master.index')
@section('title', 'Dashboard')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-4 border p-4 rounded">
        <h1 class="h3 mb-3 fw-normal text-center fw-bold">Halaman Dashboard User {{ $user->id }}</h1>

        <div class="d-flex justify-content-between">
            <div class="w-50">
                <p class="fw-bold">Nama Akun</p>
                <p class="fw-bold">Email</p>
                <p class="fw-bold">Gender</p>
                <p class="fw-bold">Umur</p>
                <p class="fw-bold">Tanggal Lahir</p>
                <p class="fw-bold">Alamat</p>
            </div>
            <div class="w-50">
                <p>{{ $user->name }}</p>
                <p>{{ $user->email }}</p>
                <p>{{ $user->gender }}</p>
                <p>{{ $user->age }}</p>
                <p>{{ $user->birth }}</p>
                <p>{{ $user->address }}</p>
            </div>
        </div>

        <div class="mt-3 d-flex align-items-center gap-2 justify-content-center">
            <a href="#" class="btn btn-lg btn-primary fw-bold text-black fs-6">Export Data</a>
            <a href="{{ route('logout') }}" class="btn btn-lg btn-danger  fs-6">Logout</a>
        </div>
    </div>
</div>
@endsection