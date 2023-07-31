@extends('layouts.index')

@section('content')
    <div class="card rounded p-4">
        <form action="{{ route('Customer.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="name" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Masukan Nama Belakang">
                    @error('name')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Masukan Email">
                    @error('email')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="phone_number" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" placeholder="Masukan Nomor Telepon">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}" placeholder="Masukan Alamat">
                    @error('address')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-md-6 d-grid">
                    <a href="{{route('Customer.index')}}" class="btn btn-danger btn-lg mt-3">Batal Tambahkkan Pelanggan</a>
                </div>
                <div class="col-md-6 d-grid">
                    <button type="submit" class="btn btn-success btn-lg mt-3">Tambahkan Pelanggan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
