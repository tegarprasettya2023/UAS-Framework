@extends('layouts.index')

@section('content')
    <div class="card rounded p-4">
        <form action="{{route('Product.update', $product)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="product_code" class="form-label">Kode Produk</label>
                    <input type="text" class="form-control  @error('product_code') is-invalid @enderror" name="product_code" id="product_code" value="{{ old('product_code', $product->product_code) }}" placeholder="Masukan Kode Produk">
                    @error('product_code')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $product->name) }}" placeholder="Masukan Nama Produk">
                    @error('name')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="kategori" class="form-label">Kategori Produk <br/>
                    @if ($categories->isEmpty())
                    <code>Belum ada kategori klik <a href="{{ route('ProductCategories.index') }}">disini</a> untuk menambah kategori.</code>
                    @endif
                </label>
                <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="stock" class="form-label">Stok Produk</label>
                    <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" placeholder="Masukan Stok Produk">
                    @error('stock')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="purchase_price" class="form-label">Harga Beli Produk</label>
                    <input type="text" class="form-control @error('purchase_price') is-invalid @enderror" name="purchase_price" id="purchase_price" value="{{ old('purchase_price', $product->purchase_price) }}" placeholder="Masukan harga Beli Produk">
                    @error('purchase_price')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="selling_price" class="form-label">Harga Jual Produk</label>
                    <input type="text" class="form-control @error('selling_price') is-invalid @enderror" name="selling_price" id="selling_price" value="{{ old('selling_price', $product->selling_price) }}" placeholder="Masukan harga Jual Produk">
                    @error('selling_price')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="image" class="form-label">Gambar Produk</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="col-md-6 d-grid">
                    <a href="{{route('Product.index')}}" class="btn btn-danger btn-lg mt-3">Batal Edit Produk</a>
                </div>
                <div class="col-md-6 d-grid">
                    <button type="submit" class="btn btn-success btn-lg mt-3">Edit Produk</button>
                </div>
            </div>
        </form>
    </div>
@endsection
