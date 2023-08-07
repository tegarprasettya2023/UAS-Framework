@extends('layouts.index')

@section('content')
@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#TransactionTable').DataTable();
        });
    </script>
@endpush
    <div class="card rounded p-2">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="ms-4 mt-4">Manajemen Produk</h4>
            <div class="ms-4 mt-4">
                <ul class="list-inline mx-3 float-end">
                    <li class="list-inline-item">
                        <a href="{{route('transaction.exportexcel')}}" class="btn btn-outline-success">
                            <i class="bi bi-download me-1"></i> to Excel
                        </a>
                    </li>
                    <li class="list-inline-item">|</li>
                    <li class="list-inline-item">
                        <a href={{route('transaction.exportPdf')}} class="btn btn-outline-danger">
                            <i class="bi bi-download me-1"></i> to PDF
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card rounded p-4 mt-3">
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="TransactionTable">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No</th>
                        <th scope="col">Kode Transaksi</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Tanggal</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->transaction_code }}</td>
                        <td>{{ $item->customer->name }}</td>
                        <td>{{ number_format($item->sub_total, 0,',',',') }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                        <td class="text-center">
                            <a href="{{ route('transaction.show', $item->transaction_code) }}" class="btn btn-primary btn-icon icon-left">
                                <i class="fas fa-eye"></i> Lihat
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            Belum ada data transaksi.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="pagination d-flex flex-row justify-content-between">
            </div>
        </div>
    </div>
@endsection
