@extends('master.index')
@section('title', 'Profile')

@section('content')
<div class="my-5 mx-4 border p-4">
    <h3 class="fw-bold text-center">Detail Produk</h3>
    <div class="d-flex flex-wrap align-items-center gap-5 mt-4">
        <div class="col-lg-5">
            <img src="{{$products->image}}" alt="image" width="500" height="400">
        </div>
        <div class="col-lg-6">
            <h4 class="fw-bold">{{$products->name}}</h4>
            <div class="d-flex justify-content-between gap-5">
                <div>
                    <p>Stok : {{$products->stock}}</p>
                    <p>Kondisi : {{$products->condition}}</p>
                </div>
                <div>
                    <p class="my-auto rounded py-1 bg-info px-2 fw-semibold mb-2">Rp.
                    {{ number_format($products->price, 0, ',', '.') }}
                    </p>
                    <p class="my-auto rounded py-1 bg-secondary text-white fw-semibold text-center">{{$products->weight}}gr</p>
                </div>
            </div>
            <p style="text-align: justify">{{$products->description}}</p>
            <a href="">
                <button class="btn btn-dark ms-auto">Checkout</button>
            </a>
        </div>
    </div>
</div>
@endsection