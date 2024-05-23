<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Riwayat Pesanan</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover mt-3">
                <thead>
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
                    @foreach($pemesanan as $pm)
                        <tr>
                            <td>{{ $pm->id }}</td>
                            <td>{{ $pm->menu }}</td>
                            <td>{{ $pm->total_harga }}</td>
                            <td>{{ $pm->alamat }}</td>
                            <td>{{ $pm->status_pemesanan }}</td>
                            <td>{{ $pm->created_at }}</td>
                            <td><a href="{{ route('history.detail', $pm->id) }}" class="btn btn-info">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
