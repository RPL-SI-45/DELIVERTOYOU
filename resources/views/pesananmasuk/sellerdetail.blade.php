<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Biryani' rel='stylesheet'>
    <title>DeliverToYou</title>
    <style>
        body {
            margin: 0;
            font-family: 'Biryani', sans-serif;
            font-size: 14px;
            background-color: #f5f5f5;
        }

        .navbar {
            background-color: #B49852;
            border: none;
            border-radius: 0;
        }

        .navbar-logo img {
            height: 40px;
            margin-top: 5px;
        }

        .navbar-text {
            color: #fff;
            margin-right: 15px;
            margin-top: 15px;
            font-size: 16px;
        }
        .containerr {
            margin-top: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .container {
            background-color: #ffff;
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
<div class="navbar navbar-default navbar-static-top">
    <div class="containerr">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div>
                @if(auth()->check())
                    @if(auth()->user()->role == 'admin')
                        <p class="navbar-text">Halo Admin</p>
                    @elseif(auth()->user()->role == 'seller')
                        <p class="navbar-text">Halo Seller</p>
                    @elseif(auth()->user()->role == 'customer')
                        <p class="navbar-text">Halo {{ auth()->user()->name }}</p>
                    @endif
                @endif
            </div>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div>
</div>
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

<!-- Include jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>