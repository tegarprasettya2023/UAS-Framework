@extends('layouts.index')

@section('content')
    <div class="card rounded p-4">
        <form action="{{route('ProductCategories.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="name" class="form-label">Kategori Produk</label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="product_code" value="{{ old('name') }}" placeholder="Masukan Kategori Produk">
                    @error('name')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ old('description') }}" placeholder="Masukan Nama Produk"></textarea>
                    @error('description')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                @enderror
                </div>
                <div class="col-md-6 d-grid">
                    <a href="{{route('ProductCategories.index')}}" class="btn btn-danger btn-lg mt-3">Batal Tambahkkan Kategori Produk</a>
                </div>
                <div class="col-md-6 d-grid">
                    <button type="submit" class="btn btn-success btn-lg mt-3">Tambahkan Kategori Produk</button>
                </div>
            </div>
        </form>
    </div>
@endsection
