@extends('layouts.index')
@section('content')
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#productTable').DataTable();
            $(".datatable").on("click", ".btn-delete", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Are you sure want to delete\n" + name + "?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-primary",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
    <div class="card rounded-full">
        <div class="card-header bg-transparent d-flex justify-content-between">
            <a href="{{route('Product.create')}}" class="btn btn-info" id="addData">
                <i class="fa fa-plus">
                    <span>Tambah Product</span>
                </i>
            </a>
        </div>
        <div class="card-body justify-content-between rounded">
            <div class="justify-content-between rounded p-4">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="productTable">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Foto</td>
                        <td>KODE PRODUK</td>
                        <td>NAMA PRODUK</td>
                        <td>HARGA BELI</td>
                        <td>HARGA JUAL</td>
                        <td>STOK</td>
                        <td>CREATE AT</td>
                        <td>AKSI</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $product )
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img width="60px" height="20px" class="img-thumbnail" src="{{ Storage::url($product->image)}}" alt=""></td>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->selling_price }}</td>
                        <td>{{ $product->purchase_price}}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->created_at}}</td>
                        <td>
                            <form action="{{ route('Product.destroy', $product) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a style="background-color: rgba(53, 142, 224, 1)" class="btn btn-sm btn-dark" href="{{route('Product.edit', $product)}}"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="mx-3 btn btn-sm btn-primary btn-delete" data-name="{{ $product->kodeproduk.' '.$product->name }}">
                                    <i class="fas fa-trash"></i>
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
    </div>
@endsection
