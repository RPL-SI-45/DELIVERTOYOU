
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Biryani' rel='stylesheet'>
    <title>DeliverToYou</title>
    <style>
        .font-style {
            margin: 0;
            font-family: Arial, sans-serif;
            font-weight: bold;
            color: black;
        }

        .navbar {
            overflow: hidden;
            background-color: #B49852;
        }

        .navbar-logo img {
            height: 40px;
            margin-top: 10px;
            margin-right: 15px;
        }

        .search-container {
            display: inline-block;
            position: absolute;
            left: 45%;
            top: 0;
            transform: translateX(-45%);
        }

        .search-container input[type=text] {
            padding: 5px;
            margin-top: 16px;
            font-size: 10px;
            border: none;
            border-radius: 5px;
            width: 130px;
        }

        .search-container button {
            padding: 5px;
            margin-top: 16px;
            margin-left: 3px;
            background: #ddd;
            font-size: 9.5px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .search-container button:hover {
            background: #ccc;
        }

        content-container {
            position: relative;
            display: inline-block;
        }

        .content-text {
            position: absolute;
            bottom: 0;
            left: 150px;
            background-color: white;
            padding: 10px;
            text-align: center;
        }

        .about {
            margin: 0;
        }

        .containerr {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            font-weight: bold;
            color: #343a40;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-row {
            margin-bottom: 20px;
        }
        .form-control, .btn {
            border-radius: 30px;
        }
        .table {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .table th {
            background-color: #B49852;
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        @media (max-width: 768px) {
            .containerr {
                padding: 20px;
                margin-top: 30px;
            }
            .form-row {
                display: flex;
                flex-direction: column;
            }
            .form-row .col-md-4 {
                width: 100%;
                margin-bottom: 10px;
            }
            .form-group {
                text-align: center;
            }
            .table-responsive {
                margin-top: 10px;
            }
            .table th, .table td {
                font-size: 14px;
                padding: 10px;
            }
        }
        @media (max-width: 576px) {

            .search-container {
                left: 50%;
                transform: translateX(-50%);
            }
        }
    </style>
</head>
<body>
<div class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-logo"><img src="{{ asset('img_example/logo.png') }}" alt="logo"></a>
            <div class="search-container">
            </div>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/seller/dash">HOME</a></li>
                <li><a href="/seller/menu">MENU</a></li>
                <li><a href="/seller/order">PESANAN</a></li>
                <li><a href="/seller/status">STATUS</a></li>
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
<div class="containerr">
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
            <div class="form-group">
                <div class="mt-5">
                    <button class="btn btn-primary " type="submit">Filter</button>
                </div>
                @if(request()->has('status') || request()->has('from_date') || request()->has('to_date'))
                    <a href="{{ route('order.history') }}" class="btn btn-secondary ml-2">Hapus Filter</a>
                @endif
            </div>
        </form>
        <div class="table-responsive">
            @if($pemesanan->isEmpty())
                <p class="text-center">Tidak ada pesanan yang ditemukan.</p>
            @else
                <table class="table table-bordered table-hover mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Pelanggan</th>
                            <th>Menu</th>
                            <th>Quantity</th>
                            <th>Total Pesanan</th>
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
                                <td>
                                    @foreach($pm->items as $item)
                                        <div>{{ $item->menu->nama }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($pm->items as $item)
                                        <div>{{ $item->quantity }}</div>
                                    @endforeach
                                </td>
                                <td>{{ $pm->items->sum('total_semua_menu') }}</td>
                                <td>{{ $pm->alamat }}</td>
                                <td>{{ $pm->status_pemesanan }}</td>
                                <td>{{ $pm->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>



