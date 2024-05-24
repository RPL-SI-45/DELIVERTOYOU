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
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-responsive {
            overflow-x: auto;
        }

        .btn-info {
            background-color: #B49852;
            border-color: #B49852;
        }

        .btn-info:hover {
            background-color: #117a8b;
            border-color: #117a8b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Riwayat Pesanan</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Total Harga</th>
                        <th>Alamat</th>
                        <th>Status Pemesanan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemesanan as $key => $pm)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $pm->menu }}</td>
                            <td>{{ $pm->total_harga }}</td>
                            <td>{{ $pm->alamat }}</td>
                            <td>{{ $pm->status_pemesanan }}</td>
                            <td>{{ $pm->created_at }}</td>
                            <td><a href="{{ route('history.detail', $pm->id) }}" class="btn btn-info btn-sm">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>