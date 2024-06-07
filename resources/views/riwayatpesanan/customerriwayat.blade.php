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
            margin-top: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-responsive {
            overflow-x: auto;
        }

        .btn-info {
            background-color: #B49852;
            border-color: #B49852;
        }

        .btn-info:hover {
            background-color: #117a8b;
            border-color: #117a8b;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .container {
                margin-top: 30px;
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
        <h2 class="mb-4">Riwayat Pesanan</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Total Harga</th>
                        <th>Alamat</th>
                        <th>Status Pemesanan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Detail</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemesanan as $key => $pm)
                        @php
                            $menuList = $pm->items->map(function($item) {
                                return $item->menu->nama;
                            })->implode(', ');

                            $totalHarga = $pm->items->sum('total_semua_menu');
                        @endphp
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $menuList }}</td>
                            <td>{{ $totalHarga }}</td>
                            <td>{{ $pm->alamat }}</td>
                            <td>{{ $pm->status_pemesanan }}</td>
                            <td>{{ $pm->created_at }}</td>
                            <td><a href="{{ route('history.detail', $pm->id) }}" class="btn btn-info btn-sm">Detail</a></td>
                            <td><a href="/order/{{$pm->id}}/history/feedback" class="btn btn-info btn-sm">Feedback</a></td>
                            <td> 
                                <div class="table-cell">Rating  : {{ $pm->rating }}</div>
                                <div class="table-cell">Feedback  : {{ $pm->feedback }}</div>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
