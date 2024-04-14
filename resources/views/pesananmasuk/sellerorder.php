<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
<div class ="container">
    <table class="table table-hover" border="1">
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Order</th>
            <th>Metode Pembayaran</th>
            <th>Detail Pesanan</th>
            <th>Status Pesanan</th>
        </tr>
        @foreach($pemesanan as $pm)
        <tr>
            <td>{{ $pm->payment->id }}</td>
            <td>{{ $pm->nama_pelanggan }}</td>
            <td>{{ $pm->menu }}</td>
            <td>{{ $pm->payment->metode }}</td>
            <td>{{ $pm->status_pesananmasuk }}</td>
            <td>
                <a href="{{ route('seller.detail', ['id' => $pm->id]) }}" button type="button" class="btn btn-primary">Detail</button>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>