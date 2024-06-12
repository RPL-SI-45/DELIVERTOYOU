<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Menu Input</title>
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

        .navbar-logo img{
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
            flex-direction: row;
            justify-content: center;
            margin-top: 20px;
            flex-wrap: wrap;
            align-items: center;
        }

        .content-img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: -50px; 
            z-index: -1;
        }

        .button-pesan {
            background-color: #E1AB24;
            border-radius: 7px;
        }

        .card .card-img-top {
            height: 50px; 
            object-fit: contain; 
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 30rem;
            margin: 7px;
            padding: 20px;
            text-align: center;
            background-color: #E7E4DC;
            margin: 0 auto; /* Added */
            float: none; /* Added */

        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .card-text {
            margin-top: 10px;
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            .search-container {
                left: 50%;
                transform: translateX(-50%);
            }
        }

        /* Additional Styles */
        .intro-text {
            margin: 20px 0;
            text-align: center;
            font-family: 'Biryani', sans-serif;
            color: #333;
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
            <li><a href="/seller/dash">HOME</a></li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
                </li>
        </div>
    </div>
</div>
 

<div class="card cardstyle">
    <div class="intro-text">
        <h2>Input Menu</h2>
        <p>Anda dapat menambahkan menu yang diinginkan ke Warung anda.</p>
    </div>

    <form action="/post" method='POST' enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="nama_kategori">Kategori</label>
            <select name="nama_kategori" class="form-control" id="nama_kategori">
                @foreach($Kategori_admin as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga">
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi">
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Gambar menu</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/seller/menu" class="btn btn-danger">Cancel</a>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
