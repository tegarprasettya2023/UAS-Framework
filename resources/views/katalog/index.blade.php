@extends('layouts.index')
@section('content')
    <div class="content mt-3 d-flex flex-lg-wrap gap-5 mb-5">
        @foreach ($product as $product )
        <div class="card" style="width:220px">
            <div class="card-header" style="border-radius:5px;">
                <img src="{{ Storage::url($product->image)}}" alt="baju 1" style="height:120px ;width: 180px;">
            </div>
            <div class="card-body">
                <p class="m-0 text-justify">{{$product->product_code}}</p>
                <p class="m-0">{{$product->name}}</p>
            </div>
            <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                <p class="m-0" style="font-size: 16px; font-weight:600;">Rp{{$product->selling_price}}</p>
                <button class="btn btn-outline-primary" style="font-size:24px">
                    <i class="fa-solid fa-cart-plus"></i>
                </button>
            </div>
        </div>
        @endforeach
    </div>
@endsection
