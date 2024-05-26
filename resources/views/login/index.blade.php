@extends('master.index')
@section('title', 'Login User')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-4 border p-4 rounded">
        <h1 class="h3 mb-3 fw-normal text-center fw-bold">Halaman Login Pengguna</h1>

        <!-- error message -->
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- success message -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('login_user') }}" method="POST">
            @csrf

           <div class="form-group mb-3">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email Kamu" required>
                @error('email')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password Kamu" required>
                @error('password')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <p>Belum punya akun? <a href="{{route('get_register')}}" class="fw-bold text-black">Daftar Sekarang</a></p>
            <button type="submit" class="btn btn-lg btn-success mb-3 w-100">Login</button>
            <p class="text-center">Atau</p>
            <a href="{{ route('login_google') }}" class="w-100 btn btn-lg btn-primary"><i class="bi bi-google mx-1"></i> Login Google</a>
        </form>
    </div>
</div>
@endsection