<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container h1 {
            margin-top: 20px;
            margin-bottom: 20px;
            color: #000000;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table-container {
            padding: 20px;
            background-color: #B49852;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .badge-danger {
            background-color: #dc3545;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="table-container">
        <h1>Menunggu Konfirmasi</h1>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Order</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Alamat</th>
                        <th>Status Pesanan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemesanan as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->nama_pelanggan}}</td>
                        <td>{{$p->menu}}</td>
                        <td>{{$p->harga}}</td>
                        <td>{{$p->total_harga}}</td>
                        <td>{{$p->alamat}}</td>
                        <td>
                            @if($p->status_pemesanan == 'Pesanan Ditolak')
                                <span class="badge bg-danger">Pesanan ditolak</span>
                            @else
                                <a href="/seller/status/{{ $p->id }}/update" class="btn btn-primary btn-sm">Konfirmasi Pesanan</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('seller.detail', ['id' => $p->id])}}" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>