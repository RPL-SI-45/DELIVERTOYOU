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
    <h1>Menunggu Konfirmasi</h1>
    <table class="table table-hover" border="1">
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Order</th>
            <th>Metode Pembayaran</th>
            <th>Harga</th>
        </tr>
        @foreach($pemesanan as $p)
         <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->nama_pelanggan}}</td>
            <td>{{$p->menu}}</td>
            <td>{{$p->harga}}</td>
            <td>
                <form action="{{ route('seller.orders.update', $p->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </td>
            <td>
                <a href="{{ route('seller.detail', $p->id) }}" class="btn btn-primary">Detail</a>
            </td>
         </tr>
        @endforeach
    </table>
</div>


