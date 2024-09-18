<table border="1">
    <thead>
        <tr>
            <td>Waktu Pembelian</td>
            <td>Nomor Pesanan</td>
            <td>No.HandPhone</td>
            <td>Harga</td>
            <td>Status</td>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $item)
            <tr>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->ambilJoki->nomor_pesanan }}</td>
                <td>{{ $item->ambilJoki->no_wa }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->status }}</td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>
