<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Transaksi</th>
            <th>Nama Customer</th>
            <th>Sub Total</th>
            <th>Dibuat pada</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($items as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->transaction_code }}</td>
                <td>{{ $item->customer->name }}</td>
                <td>{{ number_format($item->sub_total, 0,',',',') }}</td>
                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
