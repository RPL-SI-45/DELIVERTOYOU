<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Menu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Biryani' rel='stylesheet'>
    
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

        .content-container {
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

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .custom-card {
            flex: 0 0 calc(33.333% - 10px);
            margin: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            border-radius: 5px;
            overflow: hidden;
            background-color: #E7E4DC;
        }

        .custom-card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .custom-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .custom-card .card-body {
            padding: 15px;
            text-align: center;
        }

        .card-title {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1em;
            margin-bottom: 10px;
        }

        .action-button {
            padding: 10px 20px;
            margin: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .btn-dark {
            background-color: #343a40;
            color: white;
        }

        .btn-dark:hover {
            background-color: #23272b;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .custom-card {
                flex: 0 0 calc(50% - 10px);
            }
        }

        @media (max-width: 576px) {
            .custom-card {
                flex: 0 0 calc(100% - 10px);
            }

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
                    <input type="text" placeholder="Search...">
                    <button type="submit">Search</button>
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
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">Selamat Datang di Dashboard Penjual DelivertoYou!</h1>
            <p class="lead">Kelola pesanan Anda dengan mudah, pantau performa penjualan, dan maksimalkan potensi bisnis Anda.</p>
            <hr class="my-4">
            <p>Gunakan alat dan fitur yang tersedia untuk meningkatkan penjualan Anda.</p>
            <a class="btn btn-dark" href="/seller/order" role="button">Lihat Pesanan</a>
            <a class="btn btn-dark" href="/seller/orderhistory" role="button">Riwayat Pesanan</a>
            <div class="text-center my-5">
            <a href="/seller/menu/input" class="btn btn-dark">Tambah Makanan & Minuman Baru</a>
            <a href="/seller/menu" class="btn btn-dark">Kelola Menu</a>
            <a href="/seller/{{ auth()->user()->id }}/edit" class="btn btn-dark">Edit Profil Toko</a>
            </div>
        </div>
    </div>
    <div style="text-align: center;">
    <a href="/seller/dash/1_month" type="button" class="" style="display: inline-block; margin-right: 10px;">1 bulan yang lalu</a>
    <a href="/seller/dash" type="button" class="" style="display: inline-block;">Total Waktu</a>
    </div>
        @foreach($SellerDash as $t)
                <div class="container mt-5">
                 <div class="table-container">
                  <div class="table-column">
                    <img src="{{ asset('img_example/makanan.png') }}" alt="Image 3" class="custom-img-size">
                    <h2>Performa Penjualan</h2>
                    <div class="card-header">    Total Pendapatan Anda</div>
                    <div class="table-cell font-weight-bold"> Rp.{{$t->Total_harga}}</div>
                    <div class="card-header">    Total Pemesanan yang terselesaikan</div>
                    <div class="table-cell font-weight-bold"> {{$t->Total_pemesanan}}</div>
                    <div class="card-header">    Rating</div>
                    <div class="table-cell font-weight-bold">Total Rating : {{$t->Total_rating}}</div>
                   </div>
                  </div>
                </div>   
        @endforeach


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>




            
            