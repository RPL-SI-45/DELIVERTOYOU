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

<div class="container">
    @foreach($menu_warungs as $t)
    <div class="card-container">
        <div class="custom-card">
            <img class="card-img-top" src="{{ asset('gambar_menu/'.$t->gambar) }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$t->nama}}</h5>
                <p class="card-text">Kategori: {{$t->kategori}} <br> Harga: Rp.{{$t->harga}} <br> Deskripsi: {{$t->deskripsi}}</p>
                <a href="/seller/{{$t->id}}/menu/edit" class="btn btn-dark action-button">Ubah data menu kamu</a>
                <form action="/menu/{{$t->id}}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary action-button">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <div class="text-center" style="margin-top: 20px;">
        <a href="/seller/menu/input" class="btn btn-primary">Tambah Menu Baru</a>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
