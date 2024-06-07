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

        .container h1 {
            margin-top: 20px;
            margin-bottom: 20px;
            color: #000000;
            text-align: center;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-container {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
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

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .btn-sm {
            margin: 0 5px;
        }
        .table thead {
            background-color: #000000;
            color: #ffffff;
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
    <div class="table-container">
        <h1>Menunggu Konfirmasi</h1>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Order</th>
                        <th>Quantity</th>
                        <th>Total Pesanan</th>
                        <th>Alamat</th>
                        <th>Status Pesanan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemesanan as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->nama_pelanggan }}</td>
                            <td>
                                @foreach($order->items as $item)
                                    <div>{{ $item->menu->nama }}</div>
                                @endforeach
                            </td>
                            <td>
                                @foreach($order->items as $item)
                                    <div>{{ $item->quantity }}</div>
                                @endforeach
                            </td>
                            <td>{{ $order->items->sum('total_harga') }}</td>
                            <td>{{ $order->alamat }}</td>
                            <td>
                                @if($order->status_pemesanan == 'Pesanan Ditolak')
                                    <span class="badge badge-danger">Pesanan ditolak</span>
                                @else
                                     <form action="{{ route('seller_status_update', ['id' => $order->id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('seller.detail', ['id' => $order->id]) }}" class="btn btn-primary btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>