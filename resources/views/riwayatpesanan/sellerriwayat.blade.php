<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
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
            <button class="btn btn-primary" type="submit">Filter</button>
            @if(request()->has('status') || request()->has('from_date') || request()->has('to_date'))
                <a href="{{ route('order.history') }}" class="btn btn-secondary ml-2">Hapus Filter</a>
            @endif
        </form>
        <table class="table table-bordered mt-3">
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
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>