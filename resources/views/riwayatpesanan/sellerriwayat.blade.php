<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            font-weight: bold;
            color: #343a40;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-row {
            margin-bottom: 20px;
        }
        .form-control, .btn {
            border-radius: 30px;
        }
        .table {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .table th {
            background-color: #B49852;
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin-top: 30px;
            }
            .form-row {
                display: flex;
                flex-direction: column;
            }
            .form-row .col-md-4 {
                width: 100%;
                margin-bottom: 10px;
            }
            .form-group {
                text-align: center;
            }
            .table-responsive {
                margin-top: 10px;
            }
            .table th, .table td {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Riwayat Pesanan</h2>
        <form action="{{ route('order.history') }}" method="GET">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="status">Status Pesanan:</label>
                    <select class="form-control" id="status" name="status">
                        <option value="Pesanan Diterima dan selesai">Selesai</option>
                        <option value="Pesanan Ditolak">Ditolak</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="from_date">Dari Tanggal:</label>
                    <input type="date" class="form-control" id="from_date" name="from_date">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="to_date">Hingga Tanggal:</label>
                    <input type="date" class="form-control" id="to_date" name="to_date">
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Filter</button>
                @if(request()->has('status') || request()->has('from_date') || request()->has('to_date'))
                    <a href="{{ route('order.history') }}" class="btn btn-secondary ml-2">Hapus Filter</a>
                @endif
            </div>
        </form>
        <div class="table-responsive">
            @if($pemesanan->isEmpty())
                <p class="text-center">Tidak ada pesanan yang ditemukan.</p>
            @else
                <table class="table table-bordered table-hover mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Pelanggan</th>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            <th>Total Harga</th>
                            <th>Alamat</th>
                            <th>Status Pemesanan</th>
                            <th>Tanggal Pemesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pemesanan as $pm)
                            <tr>
                                <td>{{ $pm->id }}</td>
                                <td>{{ $pm->nama_pelanggan }}</td>
                                <td>{{ $pm->menu }}</td>
                                <td>{{ $pm->harga }}</td>
                                <td>{{ $pm->quantity }}</td>
                                <td>{{ $pm->total_harga }}</td>
                                <td>{{ $pm->alamat }}</td>
                                <td>{{ $pm->status_pemesanan }}</td>
                                <td>{{ $pm->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>