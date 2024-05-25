<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-2" style="background-color: rgb(241, 243, 245)">
            <div class="container-fluid">
                {{-- <a class="navbar-brand fw-bold" href="#">AMANDEMY MARKET</a> --}}
                <img src="https://amandemy.co.id/images/amandemy-logo.png" alt="logo" width="130">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        {{-- @auth --}}
                            {{-- @if (Auth::user()->roles[0]->name == 'superadmin') --}}
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" href="{{ route('get_home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" href="{{route('get_products')}}">Products</a>
                                </li>
                            {{-- @else
                                <li class="nav-item">
                                    <a class="nav-link fw-bold" href="{{ route('dashboard.products') }}">Manage Product</a>
                                </li>
                            @endif --}}
                            @auth
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('get_profile')}}">Profile</a></li>
                                        <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link fw-bold bg-primary rounded-1 text-center px-3 " href="{{route('get_login')}}">Login</a>
                                </li>
                            @endauth
                        {{-- @else --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="{{ route('register') }}">Register</a>
                            </li> --}}
                        {{-- @endauth --}}
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>