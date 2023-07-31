@extends('layouts.index')

@section('content')
    <div class="card rounded-full">
        <div class="card-header bg-transparent d-flex justify-content-between">
            <a href="{{route('Product.create')}}" class="btn btn-info" id="addData">
                <i class="fa fa-plus">
                    <span>Tambah Product</span>
                </i>
            </a>
            <input type="text" wire:model="search" class="form-control w-25" placeholder="Search....">
        </div>
        <div class="card-body">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Foto</td>
                        <td>Date In</td>
                        <td>SKU</td>
                        <td>Product Name</td>
                        <td>Category</td>
                        <td>Price</td>
                        <td>Stock</td>
                        <td>#</td>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($data as $y => $x)
                        <tr class="align-middle">
                            <td>{{ ++$y }}</td>
                            <td>
                                <img src="{{ asset('storage/product/' . $x->foto) }}" style="width:100px;">
                            </td>
                            <td>{{ $x->created_at }}</td>
                            <td>{{ $x->sku }}</td>
                            <td>{{ $x->nama_product }}</td>
                            <td>{{ $x->type . ' ' . $x->kategory }}</td>
                            <td>{{ $x->harga }}</td>
                            <td>{{ $x->quantity }}</td>
                            <td>
                                <input type="hidden" id="sku" value="{{$x->sku}}">
                                <button class="btn btn-info editModal" data-id="{{ $x->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger deleteData" data-id="{{ $x->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
            <div class="pagination d-flex flex-row justify-content-between">
                {{-- <div class="showData">
                    Data ditampilkan {{$data->count()}} dari {{$data->total()}}
                </div>
                <div>
                    {{ $data->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection
