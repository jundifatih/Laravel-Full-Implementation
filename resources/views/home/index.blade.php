@extends('master.index')
@section('title', 'Home Page')

@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-5 py-1">
        <div class="col-lg-8">
            <h5>Discover. Connect. Thrive.</h5>
            <h1 class="fw-bold">Transform Your Shopping Experience</h1>
            <p>Welcome to Amandemy Shopping, where your desires meet their perfect match. Immerse yourself in a world of 
                endless possibilities, currated just for you. Whether you`re hunting for unique finds, everyday essentials,
                or extraordinary gifts, we`ve got you covered.
            </p>
            <button class="btn btn-primary text-black">
                <a href="{{route('get_products')}}" class="text-black text-decoration-none fw-bold">
                    Buy Now!
                </a>
            </button>
        </div>
        <div class="col-lg-4">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZc1OF6bqm4WR8cJQTqWb7upZuf1phEe8HZWcNY8voxVluvSCJ" alt="shopping" width="350">
        </div>
    </div>
@endsection