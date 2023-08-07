@extends('layouts.index')

@section('content')
<div class="row">
    <div class="card rounded p-4 col-lg-7 mx-3">
        <div class="content mt-3 d-flex flex-lg-wrap gap-5 mb-5">
            @foreach ($product as $product )
            <div class="card" style="width:220px">
                <div class="card-header" style="border-radius:5px;">
                    <img src="{{ Storage::url($product->image)}}" alt="{{$product->name}}" style="height:120px ;width: 180px;">
                </div>
                <div class="card-body">
                    <p class="m-0 text-justify">{{$product->product_code}}</p>
                    <p class="m-0">{{$product->name}}</p>
                    <p class="m-0">Stok Produk : {{$product->stock}}</p>
                </div>
                <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                    <p class="m-0" style="font-size: 16px; font-weight:600;">Rp{{$product->selling_price}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="card rounded p-4 col-lg-4 mx-2" style="width:37%">
        <div class="container-fluid pt-2 px-2">
            <div class="col-lg-12">
                <button type="button" style="width: 100%" class="btn btn-success btn-icon icon-left" data-bs-toggle="modal" data-bs-target="#TambahItem">
                    <i class="fas fa-edit"></i> Pilih Barang Disini Untuk Melakukan Transaksi
                </button>
            </div>
        </form>
    </div>
    <hr>
    <div class="mt-1">
        <div class="text-center" style="color: #000000">
            Daftar Pembelian
        </div>
        <hr class="mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="saleTable" >
                    <thead>
                        <tr style="color:black">
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $index => $item)
                        <tr style="color:#000000">
                            <th>{{ $index + 1 }}</th>
                            <th>{{ $item->product->name }}</th>
                            <th>Rp. {{ number_format($item->product_price, 0,',',',') }}</th>
                            <th>{{ $item->quantity }}</th>
                            <th>Rp. {{ number_format($item->total_price, 0,',',',') }}</th>
                            <th class="text-right">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-success btn-icon icon-left" data-bs-toggle="modal" data-bs-target="#editItem-{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{route('sale.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit " class="btn btn-danger btn-icon icon-left btn-delete" data-namaproduk="">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center" style="color: #000000">
                                Belum ada produk yang dibeli.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mt-3">
        <button type="button" style="width: 100%" class="btn btn-success btn-icon icon-left" data-bs-toggle="modal" data-bs-target="#BuatTransaksi">
            <i class="fas fa-edit"></i> Buat Transaksi
        </button>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="TambahItem">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('sale.store') }}" method="POST">
                @csrf
                <input type="hidden" class="form-control bg-dark" value="{{ Auth::user()->name }}" readonly>
                <input type="hidden" class="form-control bg-dark" value="{{ $transactionCode }}" name="transaction_code" readonly>
                <input type="hidden" class="form-control bg-dark" value="{{ date('d/m/Y') }}" readonly>
                <div class="modal-header align-items-center" style="color: #000000;">Isi Form Di Bawah Ini</div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Masukan Kode Produk</label>
                        <input type="text" class="form-control" name="product_code" value="" required />
                    </div>
                    <div class="form-group">
                        <label>Masukan Jumlah Produk Yang di beli</label>
                        <input type="number" name="quantity" class="form-control" value="" required />
                    </div>
                </div>
                <div class="card-footer text-right mx-3" style="margin-bottom: 5px;">
                    <button type="submit" class="btn btn-success" style="width: 100%">Beli</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="BuatTransaksi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header align-items-center" style="color: #000000;">Isi Form Di Bawah Ini</div>
        <form action="{{ route('transaction.store') }}" method="POST">
            @csrf
            <div class="modal-body">
            <input type="hidden" name="transaction_code" value="{{ $transactionCode}}" />
            <div class="form-group col-lg-12">
                <label style="color:rgb(0, 0, 0);">Pilih nama Pelanggan</label><br>
                <select name="customer_id" class="custom-select col-lg-12 mt-3">
                    @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label style="color:rgb(0, 0, 0);">Sub Total</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp.</div>
                    </div>
                    <input type="text" name="sub_total" id="subtotal" class="form-control currency" value="{{ $subTotal }}" readonly />
                </div>
            </div>
            <div class="form-group mt-3">
                <label style="color:rgb(0, 0, 0);">Dibayar</label>
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
            <div class="form-group mt-3">
                <label style="color:rgb(0, 0, 0);">Kembalian</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp.</div>
                    </div>
                    <input type="text" name="change" id="change" class="form-control currency" value="0" readonly />
                </div>
            </div>
            <div class="text-right align-right mt-3">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <button type="submit" class="btn btn-success mt-1" style="width: 100%" id="createTransaction">Buat Transaksi</button>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
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
