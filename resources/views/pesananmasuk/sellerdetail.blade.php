<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .btn-primary {
            margin-top: 20px;
            margin-right: 10px;
        }

        .btn-secondary {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <table class="table table-hover" border="1">
        <tr>
            <th>ID Pesanan</th>
            <th>Nama Pelanggan</th>
            <th>Pesanan</th>
            <th>Quantity</th>
            <th>Metode Pembayaran</th>
            <th>Bukti Bayar</th>
            <th>Total Harga</th>
            <th>Status Pesanan</th>
        </tr>
        <tr>
            <td>{{ $pemesanan->id }}</td>
            <td>{{ $pemesanan->nama_pelanggan }}</td>
            <td>{{ $pemesanan->menu }}</td>
            <td>{{ $pemesanan->quantity }}</td>
            <td>@if($pemesanan->payment)
                    {{ $pemesanan->payment->metode }}
                @endif
            </td>
            <td>
                @if($pemesanan->payment && $pemesanan->payment->metode == 'QRIS' && $pemesanan->payment->bukti)
                    <img src="{{ asset('bukti/bayar/' . $pemesanan->payment->bukti) }}" alt="Bukti Pembayaran QRIS" style="max-width: 200px;">
                @else
                    Tidak ada
                @endif
            </td>
            <td>{{ $pemesanan->total_harga }}</td>
            <td>{{ $pemesanan->status_pemesanan }}</td>
        </tr>
    </table>
    <a href="{{route('seller.order')}}" class="btn btn-primary">Kembali</a>
    <a href="{{ route('seller.reject', ['id' => $pemesanan->id]) }}" class="btn btn-secondary">Tolak</a>
</div>
</body>
</html>