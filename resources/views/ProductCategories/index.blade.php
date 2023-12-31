@extends('layouts.index')

@section('content')
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#CategoryTable').DataTable();
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
            <a href="{{route('ProductCategories.create')}}" class="btn btn-info" id="addData">
                <i class="fa fa-plus">
                    <span>Tambah Kategori Produk</span>
                </i>
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="CategoryTable">
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
                        <td>
                            <form action="{{route('ProductCategories.destroy', $productcategories)}}" method="POST">
                                @csrf
                                @method('delete')
                                <a style="background-color: rgba(53, 142, 224, 1)" class="btn btn-sm btn-dark" href="{{route('ProductCategories.edit', $productcategories)}}"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="mx-3 btn btn-sm btn-primary btn-delete" data-name="{{ $productcategories->name}}">
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
@endsection
