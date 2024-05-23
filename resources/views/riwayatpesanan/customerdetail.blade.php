<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eef2f7;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            font-weight: bold;
            color: #495057;
            text-align: center;
            margin-bottom: 40px;
        }
        .order-detail {
            font-size: 18px;
            color: #495057;
        }
        .order-detail th {
            text-align: left;
            width: 200px;
        }
        .order-detail td {
            text-align: right;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin-top: 30px;
            }
            .order-detail th, .order-detail td {
                font-size: 16px;
                text-align: left;
            }
            .order-detail td {
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Detail Pesanan</h2>
        <table class="table table-borderless order-detail">
            <tr>
                <th>ID Pesanan:</th>
                <td>{{ $order->id }}</td>
            </tr>
            <tr>
                <th>Nama Pelanggan:</th>
                <td>{{ $order->nama_pelanggan }}</td>
            </tr>
            <tr>
                <th>Menu:</th>
                <td>{{ $order->menu }}</td>
            </tr>
            <tr>
                <th>Harga:</th>
                <td>{{ $order->harga }}</td>
            </tr>
            <tr>
                <th>Quantity:</th>
                <td>{{ $order->quantity }}</td>
            </tr>
            <tr>
                <th>Total Harga:</th>
                <td>{{ $order->total_harga }}</td>
            </tr>
            <tr>
                <th>Alamat:</th>
                <td>{{ $order->alamat }}</td>
            </tr>
            <tr>
                <th>Status Pemesanan:</th>
                <td>{{ $order->status_pemesanan }}</td>
            </tr>
            <tr>
                <th>Tanggal Pemesanan:</th>
                <td>{{ $order->created_at }}</td>
            </tr>
        </table>
        <div class="text-center mt-4">
            <a href="{{ route('cust.history') }}" class="btn btn-secondary">Kembali ke Riwayat Pesanan</a>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>