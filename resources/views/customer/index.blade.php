@extends('layouts.index')

@section('content')
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#CustomerTable').DataTable();
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
            <a href="{{route('Customer.create')}}" class="btn btn-info" id="addData">
                <i class="fa fa-plus">
                    <span>Tambah Pelanggan</span>
                </i>
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="CustomerTable">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>NAMA</td>
                        <td>ALAMAT</td>
                        <td>EMAIL</td>
                        <td>NO. HP</td>
                        <td>CREATE AT</td>
                        <td>AKSI</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer as $customer)
                                    <tr>
                                        <td>{{$customer->id}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->phone_number}}</td>
                                        <td>{{$customer->created_at}}</td>
                                        <td>
                                            <form action="{{ route('Customer.destroy', $customer) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a style="background-color: rgba(53, 142, 224, 1)" class="btn btn-sm btn-dark" href="{{route('Customer.edit', $customer)}}"><i class="fas fa-edit"></i></a>
                                                <button type="submit" class="mx-3 btn btn-sm btn-primary btn-delete" data-name="{{ $customer->name}}">
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
