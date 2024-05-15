<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
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
            left: 50%;
            top: 0;
            transform: translateX(-50%);
        }

        .search-container input[type=text] {
            padding: 5px;
            margin-top: 10px;
            font-size: 12px;
            border: none;
            border-radius: 5px;
            width: 130px;
        }

        .search-container button {
            padding: 5px;
            margin-top: 10px;
            margin-left: 3px;
            background: #ddd;
            font-size: 12px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .search-container button:hover {
            background: #ccc;
        }

        .card-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            margin-top: 20px;
            flex-wrap: wrap;
            align-items: center;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 15rem;
            margin: 7px;
            padding: 20px;
            text-align: center;
            background-color: #E7E4DC;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .card-text {
            margin-top: 10px;
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
            <a href="#" class="navbar-logo"><img src="img_example/logo.png" alt="logo"></a>
            <div class="search-container">
                <input type="text" placeholder="Search...">
                <button type="submit">Search</button>
            </div>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="home">HOME</a></li>
                <li><a href="menu">MENU</a></li>
                <li><a href="categories">CATEGORIES</a></li>
                <li><a href="about">ABOUT</a></li>
                <li><a href="login">LOGIN</a></li>
            </ul>
        </div>
    </div>
</div>

<div class ="container">
    <h1>Menunggu Konfirmasi</h1>
    <table class="table table-hover" border="1">
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Order</th>
            <th>Harga</th>
            <th>Total Harga</th>
            <th>Alamat</th>
            <th>Status Pesanan</th>
        </tr>
        @foreach($pemesanan as $p)
         <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->nama_pelanggan}}</td>
            <td>{{$p->menu}}</td>
            <td>{{$p->harga}}</td>
            <td>{{$p->total_harga}}</td>
            <td>{{$p->alamat}}</td>
            <td>
                @if($p->status_pemesanan == 'Pesanan Ditolak')
                    <span class="badge bg-danger">Pesanan ditolak</span>
                @else
                    <a href="/seller/status/{{ $p->id }}/update" type="button" class="btn btn-primary">Konfirmasi Pesanan</a>
                @endif
            </td>
            <td>
                <a href="{{route('seller.detail', ['id' => $p->id])}}" class="btn btn-primary">Detail</a>
            </td>
         </tr>
        @endforeach
    </table>
</div>
</body>
</html>