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
            background-color: #B49852;
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
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-danger {
            margin-top: 20px;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .img-thumbnail {
            max-width: 200px;
            border: 1px solid #dee2e6;
            border-radius: .25rem;
            padding: .25rem;
        }

        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mb-4">Detail Pesanan</h1>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
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
            </thead>
            <tbody>
                @foreach($pemesanan->items as $index => $item)
                <tr>
                    @if($index == 0)
                        <td rowspan="{{ count($pemesanan->items) }}">{{ $pemesanan->id }}</td>
                        <td rowspan="{{ count($pemesanan->items) }}">{{ $pemesanan->nama_pelanggan }}</td>
                    @endif
                    <td>{{ $item->menu->nama }}</td>
                    <td>{{ $item->quantity }}</td>
                    @if($index == 0)
                        <td rowspan="{{ count($pemesanan->items) }}">
                            @if($pemesanan->payment)
                                {{ $pemesanan->payment->metode }}
                            @endif
                        </td>
                        <td rowspan="{{ count($pemesanan->items) }}">
                            @if($pemesanan->payment && $pemesanan->payment->metode == 'QRIS' && $pemesanan->payment->bukti)
                                <img src="{{ asset('bukti/bayar/' . $pemesanan->payment->bukti) }}" alt="Bukti Pembayaran QRIS" class="img-thumbnail">
                            @else
                                Tidak ada
                            @endif
                        </td>
                        <td rowspan="{{ count($pemesanan->items) }}">{{ $pemesanan->items->sum('total_semua_menu') }}</td>
                        <td rowspan="{{ count($pemesanan->items) }}">{{ $pemesanan->status_pemesanan }}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('seller.order') }}" class="btn btn-primary">Kembali</a>
        <a href="{{ route('seller.reject', ['id' => $pemesanan->id]) }}" class="btn btn-danger">Tolak</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>