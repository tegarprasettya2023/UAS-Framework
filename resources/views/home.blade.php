@extends('layouts.index')

@section('content')
    <div class="d-flex flex-wrap gap-5">
        <div class="card" style="width: 250px;">
            <div class="card-body m-auto">
                <div class="d-flex gap-4 align-item-center m-auto">
                    <span class="material-icons p-0 m-0" style="font-size:52px; color:lightgray;">
                        inventory
                    </span>
                    <span class="fs-1 p-0 m-0">{{$product_count}}</span>
                </div>
            </div>
            <div class="card-footer text-center bg-transparent">
                <h5>Total Produk</h5>
            </div>
        </div>
        <div class="card" style="width: 250px;">
            <div class="card-body m-auto">
                <div class="d-flex gap-4 align-item-center m-auto">
                    <span class="material-icons p-0 m-0" style="font-size:52px; color:lightgray;">
                        shopping_cart
                    </span>
                    <span class="fs-1 p-0 m-0">{{$transaction_count}}</span>
                </div>
            </div>
            <div class="card-footer text-center bg-transparent">
                <h5>Total Transaksi</h5>
            </div>
        </div>
        <div class="card" style="width: 250px;">
            <div class="card-body m-auto">
                <div class="d-flex gap-4 align-item-center m-auto">
                    <span class="material-icons p-0 m-0" style="font-size:52px; color:lightgray;">
                        people
                    </span>
                    <span class="fs-1 p-0 m-0">{{$customer_count}}</span>
                </div>
            </div>
            <div class="card-footer text-center bg-transparent">
                <h5>Total Pelanggan</h5>
            </div>
        </div>
        <div class="card" style="width: 250px;">
            <div class="card-body m-auto">
                <div class="d-flex gap-4 align-item-center m-auto">
                    <span class="material-icons p-0 m-0" style="font-size:52px; color:lightgray;">
                        account_balance_wallet
                    </span>
                    <span class="fs-1 p-0 m-0">{{$profit}}</span>
                </div>
            </div>
            <div class="card-footer text-center bg-transparent">
                <h5>Total Profit</h5>
            </div>
        </div>


    </div>
@endsection
