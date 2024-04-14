<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <table class="table table-hover" border="1">
        <tr>
            <th>Nama Pelanggan</th>
            <th>Order</th>
            <th>Metode Pembayaran</th>
            <th>Detail Pesanan</th>
            <th>Status Pesanan</th>
        </tr>
        <tr>
            <td>{{$pemesanan->nama_pelanggan}}</td>
            <td>{{$pemesanan->menu}}</td>
            <td>{{$pemesanan->payment->metode}}</td>
            <td>{{$pemesanan->status_pesananmasuk}}</td>
        </tr>
    </table>
    <a href="{{route('seller.order')}}" button type="button" class="btn btn-primary">Kembali</button>
</div>
</body>
</html>