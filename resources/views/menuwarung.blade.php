<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Biryani' rel='stylesheet'>
    <title>DeliverToYou</title>
    <style>
        body {
            margin: 0;
            font-family: 'Biryani', sans-serif;
            font-size: 14px;
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

        .content-img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: -150px;
            z-index: -1;
        }

        .content-container {
            position: relative;
            display: inline-block;
        }

        .content-text {
            position: absolute;
            bottom: 0;
            left: 0;
            background-color: white;
            padding: 10px;
            text-align: left;
        }

        .about {
            margin: 0;
        }

        .filter-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            width: 100%;
        }

        .card .card-img-top {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card {
            width: 300px; /* Anda dapat menyesuaikan lebar kartu sesuai kebutuhan */
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-text {
            padding: 15px;
            text-align: center;
        }

        .add-to-cart-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 14px;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .add-to-cart-btn:hover {
            background-color: #218838;
        }


        .card-text p {
            margin: 0;
            font-size: 16px;
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
            <a href="#" class="navbar-logo"><img src="/img_example/logo.png" alt="logo"></a>
            <div class="search-container">
                <form action="{{ route('search.filter') }}" method="GET">
                    <input type="text" name="search" placeholder="Search..." value="{{ request()->search }}">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="home">HOME</a></li>
                <li><a href="menu">MENU</a></li>
                <li><a href="/profil">PROFIL</a></li>
                <li><a href="login">LOGIN</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="content-container">
    <img src="/img_example/makanan.png" class="content-img" alt="Content Image">
    <div class="content-text">
        @foreach($nama_toko as $toko)
        <p class="about">{{$toko->nama_toko}}, {{$toko->alamat_toko}}</p></br>
        @endforeach
    </div>
</div>

<div class="dropdownfilter">
    <h3> Filter </h3>
    <form action="{{ route('menuwarung.filter') }}" method="GET">
        <select name="nama_kategori" class="form-control" onchange="this.form.submit()">
            <option value="">Select Category</option>
            @foreach($Kategori_admin as $key => $value)
                <option value="{{ $value }}" {{ request()->nama_kategori == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </form>
</div>


<div class="card-container">
    @foreach($menu_warungs as $t)
    <div class="card">
        <a href="/customer/menu"><img src="{{ asset('gambar_menu/'.$t->gambar) }}" class="card-img-top" alt="{{ $t->nama }}"></a>
        <div class="card-text">
            <p>{{ $t->nama }}</p>
            <p>Rp. {{ $t->harga }}</p>
            <p>{{ $t->deskripsi}}</p>
            <form class="add-to-cart-form" data-id="{{ $t->id }}" action="{{ route('cart.add', $t->id) }}" method="POST">
                @csrf
                <button type="button" class="add-to-cart-btn">Tambah Keranjang</button>
            </form>
        </div>
    </div>
    @endforeach
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
