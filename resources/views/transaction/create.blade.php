@extends('layouts.index')

@section('content')
<div class="card rounded p-4">
    <div class="container-fluid pt-2 px-2">
        <form action="{{ route('sale.store') }}" method="POST">
            @csrf
            <input type="hidden" class="form-control bg-dark" value="{{ Auth::user()->name }}" readonly>
            <input type="hidden" class="form-control bg-dark" value="{{ $transactionCode }}" name="transaction_code" readonly>
            <input type="hidden" class="form-control bg-dark" value="{{ date('d/m/Y') }}" readonly>
            <div class="row">
            <div class="col-lg-3">
                <div class="card" style="background-color: #025464">
                    <div class="card-header" style="color: #ffffff">
                        Produk
                    </div>
                    <div class="card-body" style="height: 170px">
                        <div class="form-group mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="height:40px">
                                        <i class="fas fa-barcode"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control @error('product_code') is-invalid @enderror" name="product_code" placeholder="Kode Produk" value="{{ old('product_code') }}" required>
                            </div>
                            @error('product_code')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="height:40px">
                                        <i class="fas fa-file-signature"></i>
                                    </div>
                                </div>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" placeholder="Quantity" value="{{ old('quantity') }}" required>
                            </div>
                            @error('quantity')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right" style="margin-bottom: 5px;">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card card-block d-flex" style="height: 270px;background-color: #025464">
                    <div class="card-header" style="color: #ffffff">
                        Rp.
                    </div>
                    <div class="card-body text-center align-items-center d-flex justify-content-center">
                        <h1 class="display-1 priceDisplay" style="color: #ffffff">{{ number_format($subTotal, 0,',',',') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="card mt-3" style="background-color: #025464">
        <div class="card-header" style="color: #ffffff">
            Sales
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="saleTable" >
                    <thead>
                        <tr>
                            <th scope="col" style="color: #ffffff">#</th>
                            <th scope="col" style="color: #ffffff"></th>
                            <th scope="col" style="color: #ffffff">Nama</th>
                            <th scope="col" style="color: #ffffff">Harga</th>
                            <th scope="col" style="color: #ffffff">Qty</th>
                            <th scope="col" style="color: #ffffff">Total</th>
                            <th scope="col" style="color: #ffffff">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $index => $item)
                        <tr style="color:#ffffff">
                            <th>{{ $index + 1 }}</th>
                            <th>
                                <img src="{{ Storage::url($item->image)}}" alt="Foto Produk" class="img-fluid rounded mt-1 mb-1" height="10px" width="80px" />
                            </th>
                            <th>{{ $item->product->name }}</th>
                            <th>Rp. {{ number_format($item->product_price, 0,',',',') }}</th>
                            <th>{{ $item->quantity }}</th>
                            <th>Rp. {{ number_format($item->total_price, 0,',',',') }}</th>
                            <th class="text-right">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-success btn-icon icon-left" data-toggle="modal" data-target="#editItem-{{ $item->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{route('sale.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit " class="btn btn-danger btn-icon icon-left btn-delete" data-namaproduk="">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center" style="color: #ffffff">
                                Belum ada produk yang dibeli.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-3">
            <form action="{{route('transaction.store')}}" method="post">
                @csrf
                <input type="hidden" name="transaction_code" value="{{ $transactionCode}}" />
                <div class="card" style="height: 200px;background-color: #025464">
                    <div class="card-header" style="color:white;">Pelanggan</div>
                        <div class="card-body">
                            <div class="form-group col-lg-12">
                                <label style="color:white;">Pilih nama Pelanggan</label><br>
                                <select name="customer_id" class="custom-select col-lg-12 mt-3">
                                    @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="col-lg">
            <div class="card" style="height: 200px;background-color: #025464">
                <div class="card-header" style="color:white;">Pembayaran</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label style="color:white;">Sub Total</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="text" name="sub_total" id="subtotal" class="form-control currency" value="{{ $subTotal }}" readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label style="color:white;">Dibayar</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="text" name="paid" id="paid" class="form-control currency @error('paid') is-invalid @enderror" oninput="calculateChange()" />
                                    </div>
                                    @error('paid')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label style="color:white;">Kembalian</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="text" name="change" id="change" class="form-control currency" value="0" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="text-right align-right mt-2">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <button type="submit" class="btn btn-primary" id="createTransaction">Buat Transaksi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </form>
    </div>
    </div>
</div>
@foreach ($items as $item)
<div class="modal fade" tabindex="-1" role="dialog" id="editItem-{{ $item->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('sale.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="transaction_code" value="{{ $item->transaction_code }}">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $item->product->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Produk</label>
                        <input type="text" class="form-control" value="{{ $item->product->product_code }}" readonly />
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="{{ $item->quantity }}" required />
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endforeach
@push('scripts')
<script>
    function calculateChange() {
        const subtotal = parseFloat(document.getElementById('subtotal').value);
        const paid = parseFloat(document.getElementById('paid').value);
        const changes = paid - subtotal;
        const change = document.getElementById('change');

        if (changes >= 0) {
            change.value = `${changes}`;
        } else {
            change.value = 'Pembayaran Kurang!';
        }
    }
</script>

@endpush
@endsection
