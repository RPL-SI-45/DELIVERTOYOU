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
        /* Responsiveness */
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
        .btn-secondary {
            background-color: #B49852;
            border-color: #B49852;
        }
        .btn-secondary:hover {
            background-color: #8a6d3b;
            border-color: #8a6d3b;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            padding-left: 0;
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
                <td>
                    <ul>
                        @foreach($order->items as $item)
                            <li>{{ $item->menu->nama }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Harga:</th>
                <td>
                    <ul>
                        @foreach($order->items as $item)
                            <li>{{ $item->harga }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Quantity:</th>
                <td>
                    <ul>
                        @foreach($order->items as $item)
                            <li>{{ $item->quantity }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Total Harga:</th>
                <td>{{ $order->items->sum('total_semua_menu') }}</td>
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

<!-- Include jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>



