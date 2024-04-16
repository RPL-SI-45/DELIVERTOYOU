<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class ="container">
    <h1>Order Berlangsung</h1>
    <table class="table table-hover" border="1">
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Order</th>
            <th>Metode Pembayaran</th>
            <th>Status Pesanan</th>
            <th>Detail Pesanan</th>
        </tr>
        @foreach($pemesanan as $pm)
        <tr>
            <td>{{ $pm->id }}</td>
            <td>{{ $pm->nama_pelanggan }}</td>
            <td>{{ $pm->menu }}</td>
            <td>{{ $pm->payment->metode }}</td>
            <td>{{ $pm->status }}</td>
            <td>
                <a href="{{ route('seller.detail', $pm->id) }}" class="btn btn-primary">Detail</a>
            </td>
        </tr>
        @endforeach
    </table>

    <h1>Menunggu Konfirmasi</h1>
    <table class="table table-hover" border="1">
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Order</th>
            <th>Metode Pembayaran</th>
            <th>Status Pesanan</th>
            <th>Detail Pesanan</th>
        </tr>
        @foreach($pemesanan as $pm)
        <tr>
            <td>{{ $pm->id }}</td>
            <td>{{ $pm->nama_pelanggan }}</td>
            <td>{{ $pm->menu }}</td>
            <td>{{ $pm->payment->metode }}</td>
            <td>
                <form action="{{ route('seller.orders.update', $pm->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </td>
            <td>
                <a href="{{ route('seller.orders.show', $pm->id) }}" class="btn btn-primary">Detail</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>