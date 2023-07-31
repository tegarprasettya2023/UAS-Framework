@extends('layouts.index')

@section('content')
    <div class="card rounded-full">
        <div class="card-header bg-transparent d-flex justify-content-between">
            <a href="{{route('ProductCategories.create')}}" class="btn btn-info" id="addData">
                <i class="fa fa-plus">
                    <span>Tambah Kategori Produk</span>
                </i>
            </a>
            <input type="text" wire:model="search" class="form-control w-25" placeholder="Search....">
        </div>
        <div class="card-body">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>kategori Produk</td>
                        <td>Keterangan</td>
                        <td>AKSI</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productcategories as $productcategories )
                    <tr>
                        <td>{{ $productcategories->id }}</td>
                        <td>{{ $productcategories->name }}</td>
                        <td>{{ $productcategories->description }}</td>
                        <td>{{$productcategories->created_at}}</td>
                        <td>
                            <form action="{{route('ProductCategories.destroy', $productcategories)}}" method="POST">
                                @csrf
                                @method('delete')
                                <a style="background-color: rgba(53, 142, 224, 1)" class="btn btn-sm btn-dark far fa-edit" href="{{route('ProductCategories.edit', $productcategories)}}"></a>
                                <button type="submit" class="mx-3 btn btn-sm btn-primary btn-delete" data-name="{{ $productcategories->name}}">
                                    <i class="bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination d-flex flex-row justify-content-between">
            </div>
        </div>
    </div>
@endsection
